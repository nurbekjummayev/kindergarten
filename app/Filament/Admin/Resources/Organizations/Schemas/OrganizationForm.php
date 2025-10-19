<?php

namespace App\Filament\Admin\Resources\Organizations\Schemas;

use App\Enums\UserRole;
use App\Models\SocialNetwork;
use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class OrganizationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')
                    ->label('Tashkilot nomi')
                    ->columnSpanFull()
                    ->required()
                    ->maxLength(255),

                TextInput::make('tin')
                    ->label('INN (STIR)')
                    ->required()
                    ->numeric()
                    ->length(9)
                    ->unique(ignoreRecord: true),

                Select::make('user_id')
                    ->label('Tashkilot admini')
                    ->searchable()
                    ->getSearchResultsUsing(function (string $search) {
                        return User::query()
                            ->where('role', UserRole::ORGANIZATION)
                            ->where(function ($query) use ($search) {
                                $query->where('first_name', 'like', "%{$search}%")
                                    ->orWhere('last_name', 'like', "%{$search}%")
                                    ->orWhere('phone_number', 'like', "%{$search}%");
                            })
                            ->limit(15)
                            ->get()
                            ->mapWithKeys(fn ($user) => [$user->id => $user->name.' ('.$user->phone_number.')']);
                    })
                    ->getOptionLabelUsing(fn ($value): ?string => User::find($value)?->name.' ('.User::find($value)?->phone_number.')')
                    ->required()
                    ->helperText('Userlarni qidirish uchun ism, familiya yoki telefon raqam kiriting'),

                TextInput::make('website')
                    ->label('Veb-sayt')
                    ->url()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->maxLength(255),

                Textarea::make('address')
                    ->label('Manzil')
                    ->columnSpanFull()
                    ->rows(3),

                Textarea::make('description')
                    ->label('Tavsif')
                    ->rows(4)
                    ->columnSpanFull(),

                FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->disk('public')
                    ->directory('organizations/logos')
                    ->maxSize(2048),

                FileUpload::make('galleries')
                    ->label('Rasmlar galereyasi')
                    ->image()
                    ->disk('public')
                    ->directory('organizations/galleries')
                    ->multiple()
                    ->maxFiles(10)
                    ->maxSize(2048)
                    ->reorderable()
                    ->columnSpanFull(),

                Repeater::make('phones')
                    ->relationship()
                    ->schema([
                        TextInput::make('phone_number')
                            ->label('Telefon raqam')
                            ->tel()
                            ->required()
                            ->placeholder('+998 90 123 45 67'),

                        Toggle::make('is_primary')
                            ->label('Asosiy raqam')
                            ->default(false),

                        Hidden::make('order')
                            ->default(0),
                    ])
                    ->columns(2)
                    ->addActionLabel('Telefon raqam qo\'shish')
                    ->reorderable('order')
                    ->collapsible()
                    ->columnSpanFull()
                    ->defaultItems(1),

                Repeater::make('socialNetworks')
                    ->relationship()
                    ->schema([
                        Select::make('social_network_id')
                            ->label('Ijtimoiy tarmoq')
                            ->options(SocialNetwork::active()->pluck('name', 'id'))
                            ->required()
                            ->searchable(),

                        TextInput::make('url')
                            ->label('URL/Username')
                            ->required()
                            ->placeholder('https://... yoki username'),

                        Toggle::make('is_active')
                            ->label('Faol')
                            ->default(true),

                        Hidden::make('order')
                            ->default(0),
                    ])
                    ->columns(3)
                    ->addActionLabel('Ijtimoiy tarmoq qo\'shish')
                    ->reorderable('order')
                    ->collapsible()
                    ->columnSpanFull()
                    ->defaultItems(0),

                Toggle::make('is_active')
                    ->label('Faol')
                    ->default(true)
                    ->required(),
            ]);
    }
}

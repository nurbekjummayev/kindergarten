<?php

namespace App\Filament\Organization\Resources\Kindergartens\Schemas;

use App\Enums\KindergartenStatus;
use App\Enums\KindergartenType;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class KindergartenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Hidden::make('organization_id')
                ->default(fn () => auth()->user()->organization->id),

            Hidden::make('status')
                ->default(fn () => KindergartenStatus::DRAFT),

            TextInput::make('name')
                ->columnSpanFull()
                ->label('Bog\'cha nomi')
                ->required()
                ->maxLength(255),

            TextInput::make('age_start')
                ->label('Yosh (dan)')
                ->numeric()
                ->minValue(1)
                ->maxValue(7)
                ->suffix('yosh')
                ->required(),

            TextInput::make('age_end')
                ->label('Yosh (gacha)')
                ->numeric()
                ->minValue(1)
                ->maxValue(7)
                ->suffix('yosh')
                ->required(),

            TextInput::make('monthly_fee_start')
                ->label('Oylik to\'lov (dan)')
                ->numeric()
                ->prefix('UZS')
                ->minValue(0)
                ->required(),

            TextInput::make('monthly_fee_end')
                ->label('Oylik to\'lov (gacha)')
                ->numeric()
                ->prefix('UZS')
                ->minValue(0)
                ->required(),

            TextInput::make('latitude')
                ->label('Kenglik (Latitude)')
                ->numeric()
                ->step(0.000001)
                ->required(),

            TextInput::make('longitude')
                ->label('Uzunlik (Longitude)')
                ->numeric()
                ->step(0.000001)
                ->required(),

            TextInput::make('website')
                ->label('Veb-sayt')
                ->url()
                ->maxLength(255),

            TextInput::make('email')
                ->label('Email')
                ->email()
                ->maxLength(255),

            TextInput::make('capacity')
                ->label('Sig\'im')
                ->numeric()
                ->minValue(1)
                ->suffix('bolalar')
                ->required(),

            TextInput::make('address')
                ->label('Manzil')
                ->required(),

            Select::make('type')
                ->options(KindergartenType::class)
                ->label('Turi')
                ->required(),

            RichEditor::make('description')
                ->label('Tavsif')
                ->columnSpanFull(),

            FileUpload::make('logo')
                ->label('Logo')
                ->image()
                ->disk('public')
                ->directory('kindergartens/logos')
                ->maxSize(2048),

            FileUpload::make('galleries')
                ->label('Rasmlar galereyasi')
                ->image()
                ->disk('public')
                ->directory('kindergartens/galleries')
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

            Repeater::make('workingHours')
                ->relationship()
                ->schema([
                    Select::make('day_of_week')
                        ->label('Hafta kuni')
                        ->options([
                            'monday' => 'Dushanba',
                            'tuesday' => 'Seshanba',
                            'wednesday' => 'Chorshanba',
                            'thursday' => 'Payshanba',
                            'friday' => 'Juma',
                            'saturday' => 'Shanba',
                            'sunday' => 'Yakshanba',
                        ])
                        ->required()
                        ->disableOptionsWhenSelectedInSiblingRepeaterItems(),

                    Toggle::make('is_open')
                        ->label('Ochiq')
                        ->default(true)
                        ->live(),

                    TimePicker::make('opening_time')
                        ->label('Boshlanish vaqti')
                        ->seconds(false)
                        ->default('08:00')
                        ->required(fn (Get $get) => $get('is_open'))
                        ->disabled(fn (Get $get) => ! $get('is_open')),

                    TimePicker::make('closing_time')
                        ->label('Tugash vaqti')
                        ->seconds(false)
                        ->default('18:00')
                        ->required(fn (Get $get) => $get('is_open'))
                        ->disabled(fn (Get $get) => ! $get('is_open'))
                        ->after('opening_time'),
                ])
                ->columns(4)
                ->default([
                    ['day_of_week' => 'monday', 'is_open' => true, 'opening_time' => '08:00', 'closing_time' => '18:00'],
                    ['day_of_week' => 'tuesday', 'is_open' => true, 'opening_time' => '08:00', 'closing_time' => '18:00'],
                    ['day_of_week' => 'wednesday', 'is_open' => true, 'opening_time' => '08:00', 'closing_time' => '18:00'],
                    ['day_of_week' => 'thursday', 'is_open' => true, 'opening_time' => '08:00', 'closing_time' => '18:00'],
                    ['day_of_week' => 'friday', 'is_open' => true, 'opening_time' => '08:00', 'closing_time' => '18:00'],
                    ['day_of_week' => 'saturday', 'is_open' => true, 'opening_time' => '08:00', 'closing_time' => '18:00'],
                    ['day_of_week' => 'sunday', 'is_open' => false, 'opening_time' => null, 'closing_time' => null],
                ])
                ->minItems(7)
                ->maxItems(7)
                ->addable(false)
                ->deletable(false)
                ->reorderable(false)
                ->collapsible()
                ->columnSpanFull(),

            Repeater::make('kindergartenSocialNetworks')
                ->relationship()
                ->schema([
                    Select::make('social_network_id')
                        ->label('Ijtimoiy tarmoq')
                        ->relationship('socialNetwork', 'name')
                        ->required()
                        ->searchable()
                        ->preload(),

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
        ]);
    }
}

<?php

namespace App\Filament\Admin\Resources\Blogs\Schemas;

use App\Enums\BlogCategory;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Asosiy ma\'lumotlar')
                    ->schema([
                        TextInput::make('title')
                            ->label('Sarlavha')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('URL manzili uchun ishlatiladi'),

                        Select::make('category')
                            ->label('Kategoriya')
                            ->options(BlogCategory::class)
                            ->required()
                            ->native(false),

                        Select::make('author_id')
                            ->label('Muallif')
                            ->relationship('author', 'name')
                            ->searchable()
                            ->required()
                            ->default(fn() => auth()->id()),

                        Textarea::make('excerpt')
                            ->label('Qisqacha matn')
                            ->required()
                            ->rows(3)
                            ->maxLength(500)
                            ->columnSpanFull()
                            ->helperText('Blog kartochkasida ko\'rsatiladigan qisqacha matn'),
                    ])
                    ->columns(2),

                Section::make('Kontent')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Asosiy matn')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Section::make('Rasm')
                    ->schema([
                        FileUpload::make('featured_image')
                            ->label('Asosiy rasm')
                            ->image()
                            ->imageEditor()
                            ->maxSize(2048)
                            ->directory('blogs')
                            ->disk('public')
                            ->columnSpanFull(),
                    ]),

                Section::make('Nashr sozlamalari')
                    ->schema([
                        Toggle::make('is_published')
                            ->label('Nashr qilinganmi?')
                            ->default(false)
                            ->live(),

                        DateTimePicker::make('published_at')
                            ->label('Nashr sanasi')
                            ->native(false)
                            ->default(now())
                            ->required(fn($get) => $get('is_published')),

                        TextInput::make('views')
                            ->label('Ko\'rishlar soni')
                            ->numeric()
                            ->default(0)
                            ->disabled()
                            ->dehydrated(true),
                    ])
                    ->columns(3),
            ]);
    }
}

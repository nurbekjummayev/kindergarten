<?php

namespace App\Filament\Client\Resources\Applications\Schemas;

use App\Enums\ChildGender;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(auth()->id()),

                Hidden::make('kindergarten_id')
                    ->default(fn () => request()->get('kindergarten_id')),

                Select::make('kindergarten_display')
                    ->relationship('kindergarten', 'name', fn ($query) => $query->where('id', request()->get('kindergarten_id')))
                    ->label('Bog\'cha')
                    ->default(fn () => request()->get('kindergarten_id'))
                    ->disabled()
                    ->dehydrated(false),

                TextInput::make('child_first_name')
                    ->label('Farzandning ismi')
                    ->required()
                    ->maxLength(255),

                TextInput::make('child_last_name')
                    ->label('Farzandning familiyasi')
                    ->required()
                    ->maxLength(255),

                TextInput::make('child_father_name')
                    ->label('Otasining ismi')
                    ->required()
                    ->maxLength(255),

                DatePicker::make('child_birth_date')
                    ->label('Tug\'ilgan sanasi')
                    ->required()
                    ->maxDate(now()),

                TextInput::make('child_birth_certificate_number')
                    ->label('Tug\'ilganlik haqidagi guvohnoma raqami')
                    ->required()
                    ->maxLength(255),

                Select::make('child_gender')
                    ->label('Jinsi')
                    ->options(ChildGender::class)
                    ->required(),
            ]);
    }
}

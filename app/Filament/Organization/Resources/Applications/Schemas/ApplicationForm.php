<?php

namespace App\Filament\Organization\Resources\Applications\Schemas;

use App\Enums\ApplicationStatus;
use App\Enums\ChildGender;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'id')
                    ->required(),
                Select::make('kindergarten_id')
                    ->relationship('kindergarten', 'name')
                    ->required(),
                TextInput::make('child_first_name')
                    ->required(),
                TextInput::make('child_last_name')
                    ->required(),
                TextInput::make('child_father_name')
                    ->required(),
                DatePicker::make('child_birth_date')
                    ->required(),
                TextInput::make('child_birth_certificate_number')
                    ->required(),
                Select::make('child_gender')
                    ->options(ChildGender::class)
                    ->required(),
                Select::make('status')
                    ->options(ApplicationStatus::class)
                    ->default('pending')
                    ->required(),
                Textarea::make('rejection_reason')
                    ->columnSpanFull(),
            ]);
    }
}

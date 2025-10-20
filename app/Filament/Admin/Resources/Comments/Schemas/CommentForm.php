<?php

namespace App\Filament\Admin\Resources\Comments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CommentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Comment Details')
                    ->schema([
                        Select::make('kindergarten_id')
                            ->label('Kindergarten')
                            ->relationship('kindergarten', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Select::make('user_id')
                            ->label('User')
                            ->relationship('user', 'first_name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->first_name} {$record->last_name}"),

                        Textarea::make('content')
                            ->label('Comment')
                            ->required()
                            ->rows(4)
                            ->maxLength(65535),

                        Toggle::make('is_approved')
                            ->label('Approved')
                            ->default(false)
                            ->helperText('Approve this comment to make it visible to users'),
                    ]),
            ]);
    }
}

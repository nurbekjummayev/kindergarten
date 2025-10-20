<?php

namespace App\Filament\Organization\Resources\Comments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CommentForm
{
    public static function configure(Schema $schema): Schema
    {
        $user = auth()->user();
        $organizationId = $user->organization?->id;

        return $schema->schema([
            Select::make('parent_id')
                ->label('Qaysi fikrga javob')
                ->relationship(
                    'parent',
                    'content',
                    fn ($query) => $query->whereHas('kindergarten', fn ($q) => $q->where('organization_id', $organizationId))
                        ->whereNull('parent_id')
                )
                ->getOptionLabelFromRecordUsing(fn ($record) => substr($record->content, 0, 100).'...')
                ->searchable()
                ->preload()
                ->nullable()
                ->helperText('Agar javob yozmoqchi bo\'lsangiz, asosiy fikrni tanlang'),

            Select::make('kindergarten_id')
                ->label('Bog\'cha')
                ->relationship('kindergarten', 'name', fn ($query) => $query->where('organization_id', $organizationId))
                ->required()
                ->searchable()
                ->preload()
                ->disabled(fn ($record) => $record?->parent_id),

            Textarea::make('content')
                ->label('Javob matni')
                ->required()
                ->rows(4)
                ->maxLength(65535),

            Toggle::make('is_approved')
                ->label('Tasdiqlangan')
                ->default(true)
                ->helperText('Javobingiz darhol ko\'rinadi'),
        ]);
    }
}

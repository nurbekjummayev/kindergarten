<?php

namespace App\Filament\Admin\Resources\Comments\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class CommentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable(['first_name', 'last_name'])
                    ->sortable(),

                TextColumn::make('kindergarten.name')
                    ->label('Kindergarten')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('content')
                    ->label('Comment')
                    ->limit(50)
                    ->wrap()
                    ->searchable(),

                IconColumn::make('is_approved')
                    ->label('Approved')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('reactions_count')
                    ->label('Reactions')
                    ->counts('reactions')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                TernaryFilter::make('is_approved')
                    ->label('Approval Status')
                    ->placeholder('All comments')
                    ->trueLabel('Approved only')
                    ->falseLabel('Pending only'),

                SelectFilter::make('kindergarten_id')
                    ->label('Kindergarten')
                    ->relationship('kindergarten', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('user_id')
                    ->label('User')
                    ->relationship('user', 'first_name')
                    ->searchable()
                    ->preload()
                    ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->first_name} {$record->last_name}"),
            ])
            ->recordActions([
                Action::make('approve')
                    ->icon(Heroicon::OutlinedCheckCircle)
                    ->color('success')
                    ->visible(fn ($record) => ! $record->is_approved)
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update(['is_approved' => true])),

                Action::make('unapprove')
                    ->icon(Heroicon::OutlinedXCircle)
                    ->color('warning')
                    ->visible(fn ($record) => $record->is_approved)
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update(['is_approved' => false])),

                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

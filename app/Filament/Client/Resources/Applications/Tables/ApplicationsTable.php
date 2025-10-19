<?php

namespace App\Filament\Client\Resources\Applications\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kindergarten.name')
                    ->label('Bog\'cha')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('child_first_name')
                    ->label('Farzandning ismi')
                    ->searchable(),

                TextColumn::make('child_last_name')
                    ->label('Farzandning familiyasi')
                    ->searchable(),

                TextColumn::make('child_birth_date')
                    ->label('Tug\'ilgan sanasi')
                    ->date('d.m.Y')
                    ->sortable(),

                TextColumn::make('child_gender')
                    ->label('Jinsi')
                    ->badge(),

                TextColumn::make('status')
                    ->label('Holat')
                    ->badge()
                    ->tooltip(fn ($record) => $record->status->value === 'rejected' ? $record->rejection_reason : null),

                TextColumn::make('created_at')
                    ->label('Yuborilgan sana')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}

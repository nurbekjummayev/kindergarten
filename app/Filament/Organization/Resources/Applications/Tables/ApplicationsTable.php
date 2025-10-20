<?php

namespace App\Filament\Organization\Resources\Applications\Tables;

use App\Filament\Organization\Actions\ApproveApplicationAction;
use App\Filament\Organization\Actions\RejectApplicationAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.first_name')
                    ->label('Ota-ona')
                    ->formatStateUsing(fn ($record) => $record->user->first_name.' '.$record->user->last_name)
                    ->searchable(['first_name', 'last_name']),

                TextColumn::make('user.phone_number')
                    ->label('Telefon')
                    ->searchable(),

                TextColumn::make('kindergarten.name')
                    ->label('Bog\'cha')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('child_first_name')
                    ->label('Farzand')
                    ->formatStateUsing(fn ($record) => $record->child_first_name.' '.$record->child_last_name)
                    ->searchable(['child_first_name', 'child_last_name']),

                TextColumn::make('child_birth_date')
                    ->label('Tug\'ilgan sana')
                    ->date('d.m.Y')
                    ->sortable(),

                TextColumn::make('child_gender')
                    ->label('Jinsi')
                    ->badge(),

                TextColumn::make('status')
                    ->label('Holat')
                    ->badge(),

                TextColumn::make('created_at')
                    ->label('Yuborilgan sana')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Holat')
                    ->options([
                        'pending' => 'Kutilmoqda',
                        'approved' => 'Tasdiqlangan',
                        'rejected' => 'Rad etilgan',
                    ]),
                SelectFilter::make('kindergarten_id')
                    ->label('Bog\'cha')
                    ->relationship('kindergarten', 'name'),
            ])
            ->recordActions([
                ViewAction::make(),
                ApproveApplicationAction::make(),
                RejectApplicationAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}

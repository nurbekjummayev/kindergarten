<?php

namespace App\Filament\Admin\Resources\Kindergartens\Tables;

use App\Enums\KindergartenStatus;
use App\Filament\Admin\Actions\ApproveKindergartenAction;
use App\Filament\Admin\Actions\RejectKindergartenAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class KindergartensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('organization.name')
                    ->label('Tashkilot')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('logo')
                    ->label('Logo')
                    ->circular(),

                TextColumn::make('name')
                    ->label('Nomi')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('address')
                    ->label('Manzil')
                    ->searchable()
                    ->limit(30)
                    ->toggleable(),

                TextColumn::make('capacity')
                    ->label('Sig\'im')
                    ->numeric()
                    ->sortable()
                    ->suffix(' bolalar'),

                TextColumn::make('age_start')
                    ->label('Yosh')
                    ->formatStateUsing(fn($record) => $record->age_start . '-' . $record->age_end . ' yosh')
                    ->sortable(),

                TextColumn::make('monthly_fee_start')
                    ->label('Oylik to\'lov')
                    ->formatStateUsing(fn($record) => number_format($record->monthly_fee_start) . ' - ' . number_format($record->monthly_fee_end) . ' UZS')
                    ->sortable(),

                TextColumn::make('published_at')
                    ->label('Nashr qilingan')
                    ->icon(fn(Model $record) => $record->is_published ? "heroicon-o-check-circle" : "heroicon-o-x-circle")
                    ->color(fn(Model $record): string => $record->is_published ? 'success' : 'gray')
                    ->default("Nashr qilinmagan")
                    ->badge(),

                TextColumn::make('created_at')
                    ->label('Yaratilgan')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('Ko\'rish'),
                ApproveKindergartenAction::make(),
                RejectKindergartenAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}

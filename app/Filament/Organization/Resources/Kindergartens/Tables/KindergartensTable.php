<?php

namespace App\Filament\Organization\Resources\Kindergartens\Tables;

use App\Enums\KindergartenStatus;
use App\Filament\Organization\Actions\PublishKindergartenAction;
use App\Filament\Organization\Actions\ResubmitForApprovalAction;
use App\Filament\Organization\Actions\SubmitForApprovalAction;
use App\Filament\Organization\Actions\UnpublishKindergartenAction;
use Filament\Actions\EditAction;
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
                ImageColumn::make('logo')
                    ->label('Logo')
                    ->circular(),
                TextColumn::make('name')
                    ->label('Nomi')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('capacity')
                    ->label('Sig\'im')
                    ->numeric()
                    ->sortable()
                    ->suffix(' bolalar'),
                TextColumn::make('age_start')
                    ->label('Yosh')
                    ->formatStateUsing(fn ($record) => $record->age_start.'-'.$record->age_end.' yosh')
                    ->sortable(),
                TextColumn::make('monthly_fee_start')
                    ->label('Oylik to\'lov')
                    ->formatStateUsing(fn ($record) => number_format($record->monthly_fee_start).' - '.number_format($record->monthly_fee_end).' UZS')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Holat')
                    ->badge()
                    ->sortable()
                    ->tooltip(fn (Model $record): ?string => $record->status === KindergartenStatus::REJECTED
                        ? 'Rad etish sababi: '.($record->rejection_reason ?? 'Sabab ko\'rsatilmagan')
                        : null
                    ),
                TextColumn::make('published_at')
                    ->label('Nashr qilingan')
                    ->icon(fn (Model $record) => $record->is_published ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')
                    ->color(fn (Model $record): string => $record->is_published ? 'success' : 'gray')
                    ->default('Nashr qilinmagan')
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
                EditAction::make()
                    ->label('Tahrirlash')
                    ->visible(fn (Model $record) => $record->status === KindergartenStatus::DRAFT || $record->status === KindergartenStatus::REJECTED),
                SubmitForApprovalAction::make(),
                ResubmitForApprovalAction::make(),
                PublishKindergartenAction::make(),
                UnpublishKindergartenAction::make(),
            ]);
    }
}

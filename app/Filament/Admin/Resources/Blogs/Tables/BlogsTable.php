<?php

namespace App\Filament\Admin\Resources\Blogs\Tables;

use App\Enums\BlogCategory;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class BlogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('featured_image')
                    ->label('Rasm')
                    ->circular()
                    ->defaultImageUrl(url('/images/no-image.png')),

                TextColumn::make('title')
                    ->label('Sarlavha')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->description(fn ($record) => \Illuminate\Support\Str::limit($record->excerpt, 60)),

                TextColumn::make('category')
                    ->label('Kategoriya')
                    ->badge()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('author.name')
                    ->label('Muallif')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                IconColumn::make('is_published')
                    ->label('Nashr')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('published_at')
                    ->label('Nashr sanasi')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('views')
                    ->label('Ko\'rishlar')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Yaratilgan')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Yangilangan')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('category')
                    ->label('Kategoriya')
                    ->options(BlogCategory::class)
                    ->native(false),

                TernaryFilter::make('is_published')
                    ->label('Nashr holati')
                    ->placeholder('Barchasi')
                    ->trueLabel('Nashr qilingan')
                    ->falseLabel('Nashr qilinmagan'),

                SelectFilter::make('author')
                    ->label('Muallif')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->native(false),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

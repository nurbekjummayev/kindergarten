<?php

namespace App\Filament\Organization\Resources\Comments\Tables;

use App\Models\Comment;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
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

                TextColumn::make('kindergarten.name')
                    ->label('Bog\'cha')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('user.name')
                    ->label('Foydalanuvchi')
                    ->searchable(['first_name', 'last_name'])
                    ->sortable(),

                TextColumn::make('content')
                    ->label('Fikr')
                    ->limit(50)
                    ->wrap()
                    ->searchable(),

                TextColumn::make('child.content')
                    ->label('Javob')
                    ->limit(30)
                    ->placeholder('Asosiy fikr')
                    ->wrap(),

                IconColumn::make('is_approved')
                    ->label('Tasdiqlangan')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Sana')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                TernaryFilter::make('is_approved')
                    ->label('Holat')
                    ->placeholder('Barchasi')
                    ->trueLabel('Tasdiqlangan')
                    ->falseLabel('Tasdiqlanmagan'),

                SelectFilter::make('kindergarten_id')
                    ->label('Bog\'cha')
                    ->relationship('kindergarten', 'name')
                    ->searchable()
                    ->preload(),

                TernaryFilter::make('parent_id')
                    ->label('Turi')
                    ->placeholder('Barchasi')
                    ->trueLabel('Javoblar')
                    ->falseLabel('Asosiy fikrlar')
                    ->queries(
                        true: fn ($query) => $query->whereNotNull('parent_id'),
                        false: fn ($query) => $query->whereNull('parent_id'),
                    ),
            ])
            ->recordActions([
                Action::make('reply')
                    ->label('Javob yozish')
                    ->icon(Heroicon::OutlinedChatBubbleLeftRight)
                    ->color('info')
                    ->visible(fn ($record) => $record->parent_id === null)
                    ->modalHeading(fn ($record) => 'Javob yozish')
                    ->modalDescription(fn ($record) => substr($record->content, 0, 100).'...')
                    ->schema([
                        Textarea::make('reply_content')
                            ->label('Javob matni')
                            ->required()
                            ->rows(4)
                            ->maxLength(65535),
                    ])
                    ->action(function ($record, array $data) {
                        Comment::create([
                            'parent_id' => $record->id,
                            'kindergarten_id' => $record->kindergarten_id,
                            'user_id' => auth()->id(),
                            'content' => $data['reply_content'],
                            'is_approved' => true,
                        ]);
                    })
                    ->successNotificationTitle('Javob muvaffaqiyatli yuborildi'),

                Action::make('approve')
                    ->icon(Heroicon::OutlinedCheckCircle)
                    ->color('success')
                    ->visible(fn ($record) => ! $record->is_approved)
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update(['is_approved' => true])),

                Action::make('unapprove')
                    ->label('Bekor qilish')
                    ->icon(Heroicon::OutlinedXCircle)
                    ->color('warning')
                    ->visible(fn ($record) => $record->is_approved)
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update(['is_approved' => false])),
            ])
            ->toolbarActions([
            ]);
    }
}

<?php

namespace App\Filament\Organization\Resources\Comments;

use App\Filament\Organization\Resources\Comments\Pages\ListComments;
use App\Filament\Organization\Resources\Comments\Schemas\CommentForm;
use App\Filament\Organization\Resources\Comments\Tables\CommentsTable;
use App\Models\Comment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static ?string $navigationLabel = 'Fikrlar';

    protected static ?string $modelLabel = 'Fikr';

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();
        $organizationId = $user->organization?->id;

        return parent::getEloquentQuery()
            ->whereNull('parent_id')
            ->whereHas('kindergarten', fn ($query) => $query->where('organization_id', $organizationId))
            ->with(['kindergarten', 'user', 'parent']);
    }

    public static function form(Schema $schema): Schema
    {
        return CommentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CommentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListComments::route('/'),
            //            'create' => CreateComment::route('/create'),
            //            'edit' => EditComment::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }
}

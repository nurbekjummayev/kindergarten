<?php

namespace App\Filament\Organization\Resources\Applications;

use App\Filament\Organization\Resources\Applications\Pages\ListApplications;
use App\Filament\Organization\Resources\Applications\Pages\ViewApplication;
use App\Filament\Organization\Resources\Applications\Schemas\ApplicationForm;
use App\Filament\Organization\Resources\Applications\Tables\ApplicationsTable;
use App\Models\Application;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Arizalar';

    protected static ?string $modelLabel = 'Ariza';

    protected static ?string $pluralModelLabel = 'Arizalar';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereHas('kindergarten', function ($query) {
                $query->where('organization_id', auth()->user()->organization->id);
            });
    }

    public static function form(Schema $schema): Schema
    {
        return ApplicationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ApplicationsTable::configure($table);
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
            'index' => ListApplications::route('/'),
            'view' => ViewApplication::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }
}

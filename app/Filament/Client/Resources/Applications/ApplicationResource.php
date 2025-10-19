<?php

namespace App\Filament\Client\Resources\Applications;

use App\Filament\Client\Resources\Applications\Pages\CreateApplication;
use App\Filament\Client\Resources\Applications\Pages\EditApplication;
use App\Filament\Client\Resources\Applications\Pages\ListApplications;
use App\Filament\Client\Resources\Applications\Schemas\ApplicationForm;
use App\Filament\Client\Resources\Applications\Tables\ApplicationsTable;
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

    protected static ?string $navigationLabel = 'Arizalarim';

    protected static ?string $modelLabel = 'Ariza';

    protected static ?string $pluralModelLabel = 'Arizalar';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', auth()->id());
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
            'create' => CreateApplication::route('/create'),
        ];
    }

    public static function canEdit($record): bool
    {
        return false;
    }
}

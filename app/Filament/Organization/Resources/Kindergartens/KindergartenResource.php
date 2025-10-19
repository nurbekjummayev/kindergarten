<?php

namespace App\Filament\Organization\Resources\Kindergartens;

use App\Filament\Organization\Resources\Kindergartens\Pages\CreateKindergarten;
use App\Filament\Organization\Resources\Kindergartens\Pages\EditKindergarten;
use App\Filament\Organization\Resources\Kindergartens\Pages\ListKindergartens;
use App\Filament\Organization\Resources\Kindergartens\Schemas\KindergartenForm;
use App\Filament\Organization\Resources\Kindergartens\Tables\KindergartensTable;
use App\Models\Kindergarten;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class KindergartenResource extends Resource
{
    protected static ?string $model = Kindergarten::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return KindergartenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KindergartensTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('organization_id', auth()->user()->organization->id);
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
            'index' => ListKindergartens::route('/'),
            'create' => CreateKindergarten::route('/create'),
            'edit' => EditKindergarten::route('/{record}/edit'),
        ];
    }
}

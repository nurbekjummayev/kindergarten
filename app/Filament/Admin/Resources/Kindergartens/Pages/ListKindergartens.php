<?php

namespace App\Filament\Admin\Resources\Kindergartens\Pages;

use App\Filament\Admin\Resources\Kindergartens\KindergartenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKindergartens extends ListRecords
{
    protected static string $resource = KindergartenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

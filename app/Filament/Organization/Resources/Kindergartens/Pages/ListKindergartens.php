<?php

namespace App\Filament\Organization\Resources\Kindergartens\Pages;

use App\Filament\Organization\Resources\Kindergartens\KindergartenResource;
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

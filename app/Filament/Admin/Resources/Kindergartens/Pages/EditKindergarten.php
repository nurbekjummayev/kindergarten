<?php

namespace App\Filament\Admin\Resources\Kindergartens\Pages;

use App\Filament\Admin\Resources\Kindergartens\KindergartenResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKindergarten extends EditRecord
{
    protected static string $resource = KindergartenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Organization\Resources\Applications\Pages;

use App\Filament\Organization\Actions\ApproveApplicationAction;
use App\Filament\Organization\Actions\RejectApplicationAction;
use App\Filament\Organization\Resources\Applications\ApplicationResource;
use App\Filament\Organization\Resources\Applications\Infolists\ApplicationInfolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;

class ViewApplication extends ViewRecord
{
    protected static string $resource = ApplicationResource::class;

    public function infolist(Schema $schema): Schema
    {
        return ApplicationInfolist::configure($schema);
    }

    protected function getHeaderActions(): array
    {
        return [
            ApproveApplicationAction::make(),
            RejectApplicationAction::make(),
        ];
    }
}

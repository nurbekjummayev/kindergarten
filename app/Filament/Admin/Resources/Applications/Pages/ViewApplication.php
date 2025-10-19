<?php

namespace App\Filament\Admin\Resources\Applications\Pages;

use App\Filament\Admin\Resources\Applications\ApplicationResource;
use App\Filament\Admin\Resources\Applications\Infolists\ApplicationInfolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;

class ViewApplication extends ViewRecord
{
    protected static string $resource = ApplicationResource::class;

    public function infolist(Schema $schema): Schema
    {
        return ApplicationInfolist::configure($schema);
    }
}

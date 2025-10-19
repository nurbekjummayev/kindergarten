<?php

namespace App\Filament\Organization\Resources\Kindergartens\Pages;

use App\Enums\KindergartenStatus;
use App\Filament\Organization\Resources\Kindergartens\KindergartenResource;
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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Agar status APPROVED bo'lsa va tahrir qilinayotgan bo'lsa, statusni PENDING ga o'zgartirish
        if ($this->record->status === KindergartenStatus::APPROVED) {
            $data['status'] = KindergartenStatus::PENDING;
            $data['is_published'] = false;
            $data['published_at'] = null;
        }

        return $data;
    }
}

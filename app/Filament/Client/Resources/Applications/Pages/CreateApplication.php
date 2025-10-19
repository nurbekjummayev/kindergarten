<?php

namespace App\Filament\Client\Resources\Applications\Pages;

use App\Filament\Client\Resources\Applications\ApplicationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateApplication extends CreateRecord
{
    protected static string $resource = ApplicationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        $data['status'] = 'pending';

        // Get kindergarten_id from URL if not set
        if (!isset($data['kindergarten_id']) && request()->has('kindergarten_id')) {
            $data['kindergarten_id'] = request()->get('kindergarten_id');
        }

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

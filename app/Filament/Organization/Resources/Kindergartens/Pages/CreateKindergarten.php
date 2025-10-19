<?php

namespace App\Filament\Organization\Resources\Kindergartens\Pages;

use App\Enums\DayOfWeek;
use App\Filament\Organization\Resources\Kindergartens\KindergartenResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKindergarten extends CreateRecord
{
    protected static string $resource = KindergartenResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Agar working hours bo'lmasa, default qiymatlarni qo'shamiz
        if (empty($data['workingHours'])) {
            $data['workingHours'] = [];
            foreach (DayOfWeek::all() as $day) {
                $data['workingHours'][] = [
                    'day_of_week' => $day->value,
                    'is_open' => in_array($day, [DayOfWeek::MONDAY, DayOfWeek::TUESDAY, DayOfWeek::WEDNESDAY, DayOfWeek::THURSDAY, DayOfWeek::FRIDAY]),
                    'opening_time' => '08:00',
                    'closing_time' => '18:00',
                ];
            }
        }

        return $data;
    }
}

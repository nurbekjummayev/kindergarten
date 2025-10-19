<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum DayOfWeek: string implements HasLabel
{
    case MONDAY = 'monday';
    case TUESDAY = 'tuesday';
    case WEDNESDAY = 'wednesday';
    case THURSDAY = 'thursday';
    case FRIDAY = 'friday';
    case SATURDAY = 'saturday';
    case SUNDAY = 'sunday';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::MONDAY => 'Dushanba',
            self::TUESDAY => 'Seshanba',
            self::WEDNESDAY => 'Chorshanba',
            self::THURSDAY => 'Payshanba',
            self::FRIDAY => 'Juma',
            self::SATURDAY => 'Shanba',
            self::SUNDAY => 'Yakshanba',
        };
    }

    public static function all(): array
    {
        return [
            self::MONDAY,
            self::TUESDAY,
            self::WEDNESDAY,
            self::THURSDAY,
            self::FRIDAY,
            self::SATURDAY,
            self::SUNDAY,
        ];
    }
}

<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum KindergartenType: string implements HasColor, HasIcon, HasLabel
{
    case STATE = 'state';
    case PRIVATE = 'private';
    case MONTESSORI = 'montessori';
    case LANGUAGE = 'language';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::STATE => 'Davlat bog\'chasi',
            self::PRIVATE => 'Xususiy bog\'cha',
            self::MONTESSORI => 'Montessori bog\'chasi',
            self::LANGUAGE => 'Til o\'rgatadigan bog\'cha',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::STATE => 'info',
            self::PRIVATE => 'success',
            self::MONTESSORI => 'warning',
            self::LANGUAGE => 'primary',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::STATE => 'heroicon-o-building-office-2',
            self::PRIVATE => 'heroicon-o-building-storefront',
            self::MONTESSORI => 'heroicon-o-academic-cap',
            self::LANGUAGE => 'heroicon-o-language',
        };
    }

    public function getDescription(): string
    {
        return match ($this) {
            self::STATE => 'Davlat tomonidan moliyalashtiriladigan bog\'chalar',
            self::PRIVATE => 'Xususiy tadbirkorlar tomonidan boshqariladigan bog\'chalar',
            self::MONTESSORI => 'Montessori metodikasi asosida ishlaydigan bog\'chalar',
            self::LANGUAGE => 'Ingliz, rus yoki boshqa tillarni o\'rgatadigan bog\'chalar',
        };
    }
}

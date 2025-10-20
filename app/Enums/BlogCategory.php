<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum BlogCategory: string implements HasColor, HasIcon, HasLabel
{
    case EDUCATION = 'education';
    case NEWS = 'news';
    case TIPS = 'tips';
    case HEALTH = 'health';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::EDUCATION => 'Tarbiya va ta\'lim',
            self::NEWS => 'Yangiliklar',
            self::TIPS => 'Maslahatlar',
            self::HEALTH => 'Salomatlik',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::EDUCATION => 'info',
            self::NEWS => 'success',
            self::TIPS => 'warning',
            self::HEALTH => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::EDUCATION => 'heroicon-o-academic-cap',
            self::NEWS => 'heroicon-o-newspaper',
            self::TIPS => 'heroicon-o-light-bulb',
            self::HEALTH => 'heroicon-o-heart',
        };
    }
}

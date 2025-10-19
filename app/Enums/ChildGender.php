<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ChildGender: string implements HasLabel
{
    case MALE = 'male';
    case FEMALE = 'female';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::MALE => 'O\'g\'il bola',
            self::FEMALE => 'Qiz bola',
        };
    }
}

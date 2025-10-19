<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum UserRole: string implements HasColor, HasIcon, HasLabel
{
    case SUPER_ADMIN = 'super_admin';
    case ORGANIZATION = 'organization';
    case CLIENT = 'client';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'Super Admin',
            self::ORGANIZATION => 'Organization Admin',
            self::CLIENT => 'Client',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::SUPER_ADMIN => 'danger',
            self::ORGANIZATION => 'warning',
            self::CLIENT => 'success',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'heroicon-o-shield-check',
            self::ORGANIZATION => 'heroicon-o-building-office',
            self::CLIENT => 'heroicon-o-user',
        };
    }

    public function isSuperAdmin(): bool
    {
        return $this === self::SUPER_ADMIN;
    }

    public function isOrganization(): bool
    {
        return $this === self::ORGANIZATION;
    }

    public function isClient(): bool
    {
        return $this === self::CLIENT;
    }
}

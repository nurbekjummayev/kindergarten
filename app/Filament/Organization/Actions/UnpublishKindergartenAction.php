<?php

namespace App\Filament\Organization\Actions;

use App\Enums\KindergartenStatus;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;

class UnpublishKindergartenAction
{
    public static function make(): Action
    {
        return Action::make('unpublish')
            ->label('Nashrdan olib tashlash')
            ->icon('heroicon-o-eye-slash')
            ->color('danger')
            ->visible(fn (Model $record) => $record->status === KindergartenStatus::APPROVED && $record->is_published)
            ->requiresConfirmation()
            ->modalHeading('Nashrdan olib tashlash')
            ->modalDescription('Bog\'cha nashrdan olib tashlanadi va foydalanuvchilar uni ko\'ra olmaydi.')
            ->action(fn (Model $record) => $record->update([
                'is_published' => false,
                'published_at' => null,
            ]));
    }
}

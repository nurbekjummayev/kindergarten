<?php

namespace App\Filament\Admin\Actions;

use App\Enums\KindergartenStatus;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;

class ApproveKindergartenAction
{
    public static function make(): Action
    {
        return Action::make('approve')
            ->label('Tasdiqlash')
            ->icon('heroicon-o-check-circle')
            ->color('success')
            ->visible(fn (Model $record) => $record->status === KindergartenStatus::PENDING)
            ->requiresConfirmation()
            ->modalHeading('Bog\'chani tasdiqlamoqchimisiz?')
            ->modalDescription('Tasdiqlangandan so\'ng bog\'cha saytda nashr qilinadi.')
            ->action(function (Model $record) {
                $record->update([
                    'status' => KindergartenStatus::APPROVED,
                    'is_published' => true,
                ]);
                Notification::make()
                    ->title('Bog\'cha tasdiqlandi')
                    ->success()
                    ->send();
            });
    }
}

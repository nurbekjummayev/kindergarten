<?php

namespace App\Filament\Organization\Actions;

use App\Enums\ApplicationStatus;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;

class ApproveApplicationAction
{
    public static function make(): Action
    {
        return Action::make('approve')
            ->label('Tasdiqlash')
            ->icon(Heroicon::OutlinedCheckCircle)
            ->color('success')
            ->requiresConfirmation()
            ->modalHeading('Arizani tasdiqlash')
            ->modalDescription('Ushbu arizani tasdiqlashga ishonchingiz komilmi?')
            ->modalSubmitActionLabel('Ha, tasdiqlash')
            ->visible(fn ($record) => $record->status === ApplicationStatus::PENDING)
            ->action(function ($record) {
                $record->update([
                    'status' => ApplicationStatus::APPROVED,
                    'rejection_reason' => null,
                ]);

                Notification::make()
                    ->title('Ariza tasdiqlandi')
                    ->success()
                    ->send();
            });
    }
}

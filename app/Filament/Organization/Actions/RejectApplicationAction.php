<?php

namespace App\Filament\Organization\Actions;

use App\Enums\ApplicationStatus;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;

class RejectApplicationAction
{
    public static function make(): Action
    {
        return Action::make('reject')
            ->label('Rad etish')
            ->icon(Heroicon::OutlinedXCircle)
            ->color('danger')
            ->form([
                Textarea::make('rejection_reason')
                    ->label('Rad etish sababi')
                    ->required()
                    ->rows(4)
                    ->placeholder('Arizani rad etish sababini kiriting...'),
            ])
            ->modalHeading('Arizani rad etish')
            ->modalDescription('Iltimos, arizani rad etish sababini ko\'rsating.')
            ->modalSubmitActionLabel('Rad etish')
            ->visible(fn ($record) => $record->status === ApplicationStatus::PENDING)
            ->action(function ($record, array $data) {
                $record->update([
                    'status' => ApplicationStatus::REJECTED,
                    'rejection_reason' => $data['rejection_reason'],
                ]);

                Notification::make()
                    ->title('Ariza rad etildi')
                    ->danger()
                    ->send();
            });
    }
}

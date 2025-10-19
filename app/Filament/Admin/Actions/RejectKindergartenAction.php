<?php

namespace App\Filament\Admin\Actions;

use App\Enums\KindergartenStatus;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;

class RejectKindergartenAction
{
    public static function make(): Action
    {
        return Action::make('reject')
            ->label('Rad etish')
            ->icon('heroicon-o-x-circle')
            ->color('danger')
            ->visible(fn (Model $record) => $record->status === KindergartenStatus::PENDING)
            ->form([
                Textarea::make('rejection_reason')
                    ->label('Rad etish sababi')
                    ->required()
                    ->rows(3)
                    ->placeholder('Nima uchun rad etilayotganini tushuntiring...'),
            ])
            ->action(function (Model $record, array $data) {
                $record->update([
                    'status' => KindergartenStatus::REJECTED,
                    'rejection_reason' => $data['rejection_reason'],
                ]);
                Notification::make()
                    ->title('Bog\'cha rad etildi')
                    ->danger()
                    ->send();
            });
    }
}

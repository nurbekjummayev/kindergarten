<?php

namespace App\Filament\Organization\Actions;

use App\Enums\KindergartenStatus;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;

class SubmitForApprovalAction
{
    public static function make(): Action
    {
        return Action::make('submit_for_approval')
            ->label('Tasdiqlashga yuborish')
            ->icon('heroicon-o-paper-airplane')
            ->color('warning')
            ->visible(fn (Model $record) => $record->status === KindergartenStatus::DRAFT)
            ->requiresConfirmation()
            ->modalHeading('Tasdiqlashga yuborasizmi?')
            ->modalDescription('Bog\'chani tasdiqlashga yuborganingizdan so\'ng, uni o\'zgartira olmaysiz.')
            ->action(fn (Model $record) => $record->update(['status' => KindergartenStatus::PENDING]));
    }
}

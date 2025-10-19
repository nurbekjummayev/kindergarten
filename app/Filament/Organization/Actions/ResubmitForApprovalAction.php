<?php

namespace App\Filament\Organization\Actions;

use App\Enums\KindergartenStatus;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;

class ResubmitForApprovalAction
{
    public static function make(): Action
    {
        return Action::make('resubmit_for_approval')
            ->label('Qayta tasdiqlashga yuborish')
            ->icon('heroicon-o-arrow-path')
            ->color('success')
            ->visible(fn (Model $record) => $record->status === KindergartenStatus::REJECTED)
            ->requiresConfirmation()
            ->modalHeading('Qayta tasdiqlashga yuborasizmi?')
            ->modalDescription('Bog\'chani qayta tasdiqlashga yuborish uchun avval kerakli o\'zgarishlarni amalga oshiring.')
            ->action(fn (Model $record) => $record->update(['status' => KindergartenStatus::PENDING]));
    }
}

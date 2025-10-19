<?php

namespace App\Filament\Organization\Actions;

use App\Enums\KindergartenStatus;
use Filament\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\Model;

class PublishKindergartenAction
{
    public static function make(): Action
    {
        return Action::make('publish')
            ->label('Nashr qilish')
            ->icon('heroicon-o-globe-alt')
            ->color('success')
            ->visible(fn (Model $record) => $record->status === KindergartenStatus::APPROVED && ! $record->is_published)
            ->form([
                DateTimePicker::make('published_at')
                    ->label('Nashr qilish sanasi')
                    ->default(now())
                    ->required()
                    ->native(false)
                    ->seconds(false),
            ])
            ->modalHeading('Bog\'chani nashr qilish')
            ->modalDescription('Bog\'cha nashr qilingandan so\'ng foydalanuvchilar uni ko\'ra oladi.')
            ->modalSubmitActionLabel('Nashr qilish')
            ->action(function (Model $record, array $data): void {
                $record->update([
                    'is_published' => true,
                    'published_at' => $data['published_at'],
                ]);
            });
    }
}

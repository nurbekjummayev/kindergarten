<?php

namespace App\Filament\Client\Widgets;

use App\Enums\ApplicationStatus;
use App\Models\Application;
use App\Models\Kindergarten;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ClientStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $userId = auth()->id();

        // Arizalar statistikasi
        $totalApplications = Application::where('user_id', $userId)->count();
        $pendingApplications = Application::where('user_id', $userId)
            ->where('status', ApplicationStatus::PENDING)->count();
        $approvedApplications = Application::where('user_id', $userId)
            ->where('status', ApplicationStatus::APPROVED)->count();
        $rejectedApplications = Application::where('user_id', $userId)
            ->where('status', ApplicationStatus::REJECTED)->count();

        // Tizim statistikasi (qiziqarli ma'lumotlar)
        $totalKindergartens = Kindergarten::where('is_published', true)->count();
        $totalActiveApplications = Application::where('status', ApplicationStatus::PENDING)->count();

        return [
            Stat::make('Jami arizalarim', $totalApplications)
                ->description($totalApplications > 0
                    ? "Tasdiqlangan: {$approvedApplications}, Jarayonda: {$pendingApplications}"
                    : "Hozircha ariza yo'q")
                ->icon('heroicon-o-rectangle-stack')
                ->color('primary')
                ->chart([
                    $pendingApplications,
                    $approvedApplications,
                    $rejectedApplications,
                ]),

            Stat::make('Jarayondagi arizalar', $pendingApplications)
                ->description('Tasdiq kutayotgan arizalarim')
                ->icon('heroicon-o-clock')
                ->color('warning'),

            Stat::make('Tasdiqlangan', $approvedApplications)
                ->description('Qabul qilingan arizalarim')
                ->icon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Rad etilgan', $rejectedApplications)
                ->description($rejectedApplications > 0
                    ? 'Qayta ariza topshirishingiz mumkin'
                    : 'Rad etilgan arizalar yo\'q')
                ->icon('heroicon-o-x-circle')
                ->color($rejectedApplications > 0 ? 'danger' : 'gray'),

            Stat::make('Mavjud bog\'chalar', $totalKindergartens)
                ->description('Saytda nashr qilingan bog\'chalar')
                ->icon('heroicon-o-home-modern')
                ->color('info')
                ->url(url('/')),
        ];
    }

    protected function getColumns(): int
    {
        return 3;
    }
}

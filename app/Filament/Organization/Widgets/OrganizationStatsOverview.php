<?php

namespace App\Filament\Organization\Widgets;

use App\Enums\ApplicationStatus;
use App\Enums\KindergartenStatus;
use App\Models\Application;
use App\Models\Kindergarten;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrganizationStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $organizationId = auth()->user()->organization->id;

        // Bog'chalar statistikasi
        $totalKindergartens = Kindergarten::where('organization_id', $organizationId)->count();
        $draftKindergartens = Kindergarten::where('organization_id', $organizationId)
            ->where('status', KindergartenStatus::DRAFT)->count();
        $pendingKindergartens = Kindergarten::where('organization_id', $organizationId)
            ->where('status', KindergartenStatus::PENDING)->count();
        $approvedKindergartens = Kindergarten::where('organization_id', $organizationId)
            ->where('status', KindergartenStatus::APPROVED)->count();
        $rejectedKindergartens = Kindergarten::where('organization_id', $organizationId)
            ->where('status', KindergartenStatus::REJECTED)->count();
        $publishedKindergartens = Kindergarten::where('organization_id', $organizationId)
            ->where('is_published', true)->count();

        // Arizalar statistikasi
        $totalApplications = Application::whereHas('kindergarten', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })->count();

        $pendingApplications = Application::whereHas('kindergarten', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })->where('status', ApplicationStatus::PENDING)->count();

        $approvedApplications = Application::whereHas('kindergarten', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })->where('status', ApplicationStatus::APPROVED)->count();

        $rejectedApplications = Application::whereHas('kindergarten', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })->where('status', ApplicationStatus::REJECTED)->count();

        return [
            Stat::make('Jami bog\'chalar', $totalKindergartens)
                ->description("Tasdiqlangan: {$approvedKindergartens}, Nashr: {$publishedKindergartens}")
                ->icon('heroicon-o-home-modern')
                ->color('primary')
                ->chart([
                    $draftKindergartens,
                    $pendingKindergartens,
                    $approvedKindergartens,
                    $rejectedKindergartens,
                ]),

            Stat::make('Qoralama', $draftKindergartens)
                ->description('Qoralama holatidagi bog\'chalar')
                ->icon('heroicon-o-document')
                ->color('gray'),

            Stat::make('Kutilmoqda', $pendingKindergartens)
                ->description('Tasdiq kutayotgan bog\'chalar')
                ->icon('heroicon-o-clock')
                ->color('warning'),

            Stat::make('Tasdiqlangan', $approvedKindergartens)
                ->description('Tasdiqlangan bog\'chalar')
                ->icon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Rad etilgan', $rejectedKindergartens)
                ->description('Rad etilgan bog\'chalar')
                ->icon('heroicon-o-x-circle')
                ->color('danger'),

            Stat::make('Nashr qilingan', $publishedKindergartens)
                ->description('Saytda ko\'rsatilayotgan bog\'chalar')
                ->icon('heroicon-o-globe-alt')
                ->color('info'),

            Stat::make('Jami arizalar', $totalApplications)
                ->description("Tasdiqlangan: {$approvedApplications}, Rad: {$rejectedApplications}")
                ->icon('heroicon-o-rectangle-stack')
                ->color('primary')
                ->chart([
                    $pendingApplications,
                    $approvedApplications,
                    $rejectedApplications,
                ]),

            Stat::make('Kutilmoqda (Arizalar)', $pendingApplications)
                ->description('Tasdiq kutayotgan arizalar')
                ->icon('heroicon-o-clock')
                ->color('warning'),

            Stat::make('Tasdiqlangan arizalar', $approvedApplications)
                ->description('Qabul qilingan arizalar')
                ->icon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }

    protected function getColumns(): int
    {
        return 3;
    }
}

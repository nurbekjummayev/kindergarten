<?php

namespace App\Filament\Widgets;

use App\Enums\ApplicationStatus;
use App\Enums\KindergartenStatus;
use App\Enums\UserRole;
use App\Models\Application;
use App\Models\Kindergarten;
use App\Models\Organization;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalUsers = User::query()->where("role", "<>", UserRole::SUPER_ADMIN)->count();
        $totalClients = User::where('role', UserRole::CLIENT)->count();
        $totalOrganizations = Organization::count();

        $totalKindergartens = Kindergarten::count();
        $draftKindergartens = Kindergarten::where('status', KindergartenStatus::DRAFT)->count();
        $pendingKindergartens = Kindergarten::where('status', KindergartenStatus::PENDING)->count();
        $approvedKindergartens = Kindergarten::where('status', KindergartenStatus::APPROVED)->count();
        $rejectedKindergartens = Kindergarten::where('status', KindergartenStatus::REJECTED)->count();
        $publishedKindergartens = Kindergarten::where('is_published', true)->count();

        $totalApplications = Application::count();
        $pendingApplications = Application::where('status', ApplicationStatus::PENDING)->count();
        $approvedApplications = Application::where('status', ApplicationStatus::APPROVED)->count();
        $rejectedApplications = Application::where('status', ApplicationStatus::REJECTED)->count();

        return [
            Stat::make('Jami foydalanuvchilar', $totalUsers)
                ->description('Barcha tizim foydalanuvchilari')
                ->icon('heroicon-o-users')
                ->color('primary'),

            Stat::make('Ota-onalar', $totalClients)
                ->description('Ro\'yxatdan o\'tgan mijozlar')
                ->icon('heroicon-o-user-group')
                ->color('success'),

            Stat::make('Tashkilotlar', $totalOrganizations)
                ->description('Faol tashkilotlar soni')
                ->icon('heroicon-o-building-office')
                ->color('info'),

            Stat::make('Jami bog\'chalar', $totalKindergartens)
                ->description("Tasdiqlangan: {$approvedKindergartens}, Nashr: {$publishedKindergartens}")
                ->icon('heroicon-o-home-modern')
                ->color('warning')
                ->chart([
                    $draftKindergartens,
                    $pendingKindergartens,
                    $approvedKindergartens,
                    $rejectedKindergartens,
                ]),

            Stat::make('Kutilmoqda', $pendingKindergartens)
                ->description('Tasdiq kutayotgan bog\'chalar')
                ->icon('heroicon-o-clock')
                ->color('warning'),

            Stat::make('Rad etilgan', $rejectedKindergartens)
                ->description('Rad etilgan bog\'chalar')
                ->icon('heroicon-o-x-circle')
                ->color('danger'),

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

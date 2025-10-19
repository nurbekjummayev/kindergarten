<?php

namespace App\Providers\Filament;

use App\Filament\Organization\Pages\Auth\Login;
use App\Filament\Organization\Pages\Auth\Register;
use App\Filament\Organization\Widgets\OrganizationApplicationsChart;
use App\Filament\Organization\Widgets\OrganizationKindergartensChart;
use App\Filament\Organization\Widgets\OrganizationStatsOverview;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Width;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class OrganizationPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('organization')
            ->path('organization')
            ->login(Login::class)
            ->registration(Register::class)
            ->colors([
                'primary' => Color::Blue,
            ])
            ->discoverResources(in: app_path('Filament/Organization/Resources'), for: 'App\Filament\Organization\Resources')
            ->discoverPages(in: app_path('Filament/Organization/Pages'), for: 'App\Filament\Organization\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Organization/Widgets'), for: 'App\Filament\Organization\Widgets')
            ->widgets([
                OrganizationStatsOverview::class,
                OrganizationKindergartensChart::class,
                OrganizationApplicationsChart::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->maxContentWidth(Width::ScreenTwoExtraLarge);
    }
}

<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Pages\Dashboard;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Auth\MultiFactor\App\AppAuthentication;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class ProductionPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('production')
            ->path('production')
            ->brandName('Production') 
            ->login()
            ->colors([ 'primary' => Color::Cyan 
            ])
            ->multiFactorAuthentication([
                AppAuthentication::make()
                    ->recoverable()
                    ->recoveryCodeCount(8)
                    ->regenerableRecoveryCodes(true)
                    ->codeWindow(8)
            ], isRequired: false)
            ->discoverResources(in: app_path('Filament/Production/Resources'), for: 'App\Filament\Production\Resources')
            ->pages([ Dashboard::class ])
            ->discoverWidgets(in: app_path('Filament/Production/Widgets'), for: 'App\Filament\Production\Widgets')
            ->widgets([ AccountWidget::class, FilamentInfoWidget::class ])
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
            ->authMiddleware([ Authenticate::class ]);
    }
}

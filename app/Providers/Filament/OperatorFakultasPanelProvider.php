<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Actions\Action;
use App\Filament\Resources\ChangePasswords\ChangePasswordResource;
use Filament\Facades\Filament;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Resources\TracerStudies\TracerStudyResource;

class OperatorFakultasPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('operatorFakultas')
            ->path('operatorFakultas')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/OperatorFakultas/Resources'), for: 'App\Filament\OperatorFakultas\Resources')
            ->discoverPages(in: app_path('Filament/OperatorFakultas/Pages'), for: 'App\Filament\OperatorFakultas\Pages')
            ->pages([])
            ->resources([
                TracerStudyResource::class,
                ChangePasswordResource::class
            ])
            ->discoverWidgets(in: app_path('Filament/OperatorFakultas/Widgets'), for: 'App\Filament\OperatorFakultas\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->userMenuItems([
                Action::make('changePassword')
                    ->label('Ubah Password')
                    ->icon('heroicon-o-key')
                    ->url(fn() => ChangePasswordResource::getUrl(panel: Filament::getCurrentPanel()->getId())),
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
            ]);
    }
}

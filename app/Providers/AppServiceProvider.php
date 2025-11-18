<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Auth\Http\Responses\Contracts\LoginResponse as LoginResponseContract;
use App\Http\Responses\LoginResponse as CustomLoginResponse;
use Filament\Support\Facades\FilamentAsset;
use App\Http\Responses\LogoutResponse as CustomLogoutResponse;
use Filament\Auth\Http\Responses\Contracts\LogoutResponse as LogoutResponseContract;
use Filament\Support\Assets\Js;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            LoginResponseContract::class,
            CustomLoginResponse::class
        );

        $this->app->bind(
            LogoutResponseContract::class,
            CustomLogoutResponse::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentAsset::register([
            Js::make('custom-script', __DIR__ . '/../../public/js/reload.js'),
        ]);
    }
}

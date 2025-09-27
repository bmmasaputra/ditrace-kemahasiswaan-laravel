<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Auth\Http\Responses\Contracts\LoginResponse as LoginResponseContract;
use App\Http\Responses\LoginResponse as CustomLoginResponse;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LoginResponseContract::class, CustomLoginResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

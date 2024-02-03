<?php

namespace App\Providers;

use App\Contracts\AuthContract;
use App\Contracts\LoginContract;
use App\Contracts\OtpContract;
use App\Contracts\TokenContract;
use App\Services\AuthService;
use App\Services\LoginService;
use App\Services\OtpService;
use App\Services\TokenService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OtpContract::class, OtpService::class);
        $this->app->bind(AuthContract::class, AuthService::class);
        $this->app->bind(LoginContract::class, LoginService::class);
        $this->app->bind(TokenContract::class, TokenService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

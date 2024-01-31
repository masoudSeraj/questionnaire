<?php

namespace App\Providers;

use App\Contracts\AuthContract;
use App\Contracts\OtpContract;
use App\Http\Controllers\AuthController;
use App\Services\OtpService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OtpContract::class, OtpService::class);
        $this->app->bind(AuthContract::class, OtpService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

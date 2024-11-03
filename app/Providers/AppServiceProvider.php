<?php

namespace App\Providers;

use App\Contracts\Services\ApiVisitorCreationServiceContract;
use App\Contracts\Services\ApiVisitorRemoverServiceContract;
use App\Contracts\Services\ApiVisitorUpdateServiceContract;
use App\Services\ApiVisitorService;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ApiVisitorCreationServiceContract::class, ApiVisitorService::class);
        $this->app->singleton(ApiVisitorRemoverServiceContract::class, ApiVisitorService::class);
        $this->app->singleton(ApiVisitorUpdateServiceContract::class, ApiVisitorService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });
    }
}

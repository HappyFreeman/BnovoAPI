<?php

namespace App\Providers;

use App\Contracts\Repositories\ApiVisitorRepositoryContract;
use App\Repositories\ApiVisitorRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ApiVisitorRepositoryContract::class, ApiVisitorRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

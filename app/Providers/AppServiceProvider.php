<?php

namespace App\Providers;

use App\Interfaces\CoreManagementInterfaces;
use App\Interfaces\RegisterCaInterfaces;
use App\Repositories\CoreManagementRepositories;
use App\Repositories\RegisterCaRepositories;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CoreManagementInterfaces::class, CoreManagementRepositories::class);
        $this->app->bind(RegisterCaInterfaces::class, RegisterCaRepositories::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Services\DemoService;
use App\Services\IDemoService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);

        // Bind interfaces and implements below
        $this->app->bind(IDemoService::class, DemoService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

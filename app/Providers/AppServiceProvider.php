<?php

namespace App\Providers;

use App\View\Composers\TaskComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // No services are currently being registered
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(
            ['tasks.edit', 'tasks.create'],
            TaskComposer::class
        );
    }
}

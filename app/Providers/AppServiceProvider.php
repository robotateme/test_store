<?php

namespace App\Providers;

use App\Http\Controllers\HomeController;
use App\View\Pages\Contracts\HomePageInterface;
use App\View\Pages\HomePage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(HomeController::class)
            ->needs(HomePageInterface::class)
            ->give(HomePage::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

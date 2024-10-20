<?php

namespace App\Providers;

use App\Http\Controllers\BasketController;
use App\Http\Controllers\HomeController;
use App\View\Pages\BasketPage;
use App\View\Pages\Contracts\BasketPageInterface;
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

        $this->app->when(BasketController::class)
            ->needs(BasketPageInterface::class)
            ->give(BasketPage::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

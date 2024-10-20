<?php

namespace App\Providers;

use App\View\Pages\BasketPage;
use App\View\Pages\Contracts\BasketPageInterface;
use App\View\Pages\Contracts\HomePageInterface;
use App\View\Pages\HomePage;
use Illuminate\Support\ServiceProvider;

class PagesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(HomePageInterface::class, HomePage::class);
        $this->app->bind(BasketPageInterface::class, BasketPage::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

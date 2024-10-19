<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Application\Actions\Contracts\ActionInterface;
use Src\Application\Actions\Product\ProductGetListAction;
use Src\Application\Actions\Product\ProductGetOneAction;

class ActionsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ActionInterface::class, ProductGetListAction::class);
        $this->app->bind(ActionInterface::class, ProductGetOneAction::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

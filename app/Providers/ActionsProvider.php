<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Source\Domain\Actions\Contracts\ActionInterface;
use Source\Domain\Actions\Product\ProductGetListAction;
use Source\Domain\Actions\Product\ProductGetOneAction;
use Source\Domain\Actions\User\Contracts\UserLoginActionInterface;
use Source\Domain\Actions\User\UserLoginAction;

class ActionsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ActionInterface::class, ProductGetListAction::class);
        $this->app->bind(ActionInterface::class, ProductGetOneAction::class);
        $this->app->bind(UserLoginActionInterface::class, UserLoginAction::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

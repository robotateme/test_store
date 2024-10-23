<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Source\Domain\Actions\Basket\BasketAddProductAction;
use Source\Domain\Actions\Basket\BasketGetPositionsAction;
use Source\Domain\Actions\Basket\Contracts\BasketAddProductActionInterface;
use Source\Domain\Actions\Basket\Contracts\BasketGetPositionsActionInterface;
use Source\Domain\Actions\Order\Contracts\OrderCreateActionInterface;
use Source\Domain\Actions\Order\Input\OrderCreateAction;
use Source\Domain\Actions\Product\Contracts\ProductGetOneActionInterface;
use Source\Domain\Actions\Product\Contracts\ProductsGetListActionInterface;
use Source\Domain\Actions\Product\Output\ProductGetListAction;
use Source\Domain\Actions\Product\Output\ProductGetOneAction;
use Source\Domain\Actions\User\Contracts\UserLoginActionInterface;
use Source\Domain\Actions\User\Input\UserLoginAction;

class ActionsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductsGetListActionInterface::class, ProductGetListAction::class);
        $this->app->bind(ProductGetOneActionInterface::class, ProductGetOneAction::class);
        $this->app->bind(UserLoginActionInterface::class, UserLoginAction::class);
        $this->app->bind(BasketAddProductActionInterface::class, BasketAddProductAction::class);
        $this->app->bind(BasketGetPositionsActionInterface::class, BasketGetPositionsAction::class);
        $this->app->bind(OrderCreateActionInterface::class, OrderCreateAction::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

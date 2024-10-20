<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Source\Infrastructure\Repositories\Product\Contracts\ProductsRepositoryInterface;
use Source\Infrastructure\Repositories\Product\ProductsDbRepository;
use Source\Infrastructure\Repositories\User\Contracts\UserRepositoryInterface;
use Source\Infrastructure\Repositories\User\UsersDbRepository;

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductsRepositoryInterface::class, ProductsDbRepository::class);
        $this->app->when(ProductsDbRepository::class)
            ->needs(Model::class)
            ->give(Product::class);
        $this->app->bind(UserRepositoryInterface::class, UsersDbRepository::class);
        $this->app->when(UsersDbRepository::class)
            ->needs(Model::class)
            ->give(User::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

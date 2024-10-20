<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Src\Infrastructure\Repositories\Product\Contracts\ProductsRepositoryInterface;
use Src\Infrastructure\Repositories\Product\ProductsDbRepository;
use Src\Infrastructure\Repositories\User\Contracts\UserRepositoryInterface;
use Src\Infrastructure\Repositories\User\UsersDbRepository;

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

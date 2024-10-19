<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Src\Infrastructure\Repositories\Product\Contracts\ProductsRepositoryInterface;
use Src\Infrastructure\Repositories\Product\ProductsDbRepository;

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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

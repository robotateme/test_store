<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Infrastructure\Assemblers\Contracts\AssemblerInterface;
use Src\Infrastructure\Assemblers\Product\ProductDtoAssembler;

class AssemblersProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AssemblerInterface::class,ProductDtoAssembler::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

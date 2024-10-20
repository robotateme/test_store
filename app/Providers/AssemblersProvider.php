<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Source\Infrastructure\Assemblers\Contracts\AssemblerInterface;
use Source\Infrastructure\Assemblers\Product\ProductDtoAssembler;

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

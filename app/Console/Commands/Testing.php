<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Src\Domain\Actions\Product\ProductGetOneAction;

class Testing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:testing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(ProductGetOneAction $action): void
    {
        dd($action->handle(2));
    }
}

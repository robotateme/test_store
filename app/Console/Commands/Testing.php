<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use JetBrains\PhpStorm\NoReturn;
use Source\Domain\Actions\Basket\BasketAddProductAction;
use Source\Domain\Dto\Basket\Request\BasketAddProductDto;
use Source\Domain\ValueObjects\AccountNumberValue;

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
    #[NoReturn] public function handle(): void
    {
        dd((new AccountNumberValue(3))->getValue());
    }
}

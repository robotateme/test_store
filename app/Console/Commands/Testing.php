<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use JetBrains\PhpStorm\NoReturn;
use Source\Domain\Actions\Basket\BasketAddProductAction;
use Source\Domain\Dto\Basket\Request\BasketAddProductDto;

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
    #[NoReturn] public function handle(BasketAddProductAction $action): void
    {
        $dto = new BasketAddProductDto(2, 2, null, 'testID777');
        dd($action->handle($dto));
    }
}

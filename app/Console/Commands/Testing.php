<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\View\Components\Pagination;
use Illuminate\Console\Command;
use JetBrains\PhpStorm\NoReturn;
use Source\Domain\Actions\Basket\BasketAddProductAction;
use Source\Domain\Actions\Product\ProductGetListAction;
use Source\Domain\Actions\User\UserLoginAction;
use Source\Domain\Dto\Basket\Request\BasketAddProductDto;
use Source\Domain\Dto\Pagination\Request\PaginationDto;
use Source\Infrastructure\Assemblers\User\UserLoginDtoAssembler;

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
        $dto = new BasketAddProductDto(1, 2, null, 'testID555');
        dd($action->handle($dto));
//        dd((new \DateTime('2017-02-06T22:25:12Z'))->format('Y-m-d H:i:s'));
    }
}

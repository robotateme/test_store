<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\View\Components\Pagination;
use Illuminate\Console\Command;
use JetBrains\PhpStorm\NoReturn;
use Source\Domain\Actions\Product\ProductGetListAction;
use Source\Domain\Actions\User\UserLoginAction;
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
    #[NoReturn] public function handle(ProductGetListAction $action): void
    {
        dd(Product::factory(10)->make()->toArray());
    }
}

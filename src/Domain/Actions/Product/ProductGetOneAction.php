<?php

namespace Src\Domain\Actions\Product;

use App\Dto\Contracts\BaseDto;
use Src\Domain\Actions\Product\Contracts\ProductGetOneActionInterface;
use Src\Infrastructure\Repositories\Product\Contracts\ProductsRepositoryInterface;

readonly class ProductGetOneAction implements ProductGetOneActionInterface
{

    public function __construct(private ProductsRepositoryInterface $products)
    {
    }

    public function handle(int $id): BaseDto
    {
        return $this->products->getOne($id);
    }
}
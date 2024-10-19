<?php

namespace Src\Application\Actions\Product;

use Src\Application\Actions\Product\Contracts\ProductGetOneActionInterface;
use Src\Application\Dto\Contracts\BaseDto;
use Src\Application\Dto\Product\Response\ProductDto;
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
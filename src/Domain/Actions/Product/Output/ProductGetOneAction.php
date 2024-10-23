<?php

namespace Source\Domain\Actions\Product\Output;

use Source\Domain\Actions\Product\Contracts\ProductGetOneActionInterface;
use Source\Domain\Dto\Contracts\BaseDto;
use Source\Infrastructure\Repositories\Product\Contracts\ProductsRepositoryInterface;

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
<?php

namespace Source\Domain\Actions\Product;


use Source\Domain\Actions\Product\Contracts\ProductsGetListActionInterface;
use Source\Domain\Dto\Contracts\BaseDtoCollection;
use Source\Domain\Dto\Pagination\Request\PaginationDto;
use Source\Infrastructure\Repositories\Product\Contracts\ProductsRepositoryInterface;

readonly class ProductGetListAction implements ProductsGetListActionInterface
{
    public function __construct(private ProductsRepositoryInterface $products)
    {}

    /**
     * @param  PaginationDto  $paginationDto
     * @return BaseDtoCollection
     */
    public function handle(PaginationDto $paginationDto): BaseDtoCollection
    {
        return $this->products->getList($paginationDto);
    }
}
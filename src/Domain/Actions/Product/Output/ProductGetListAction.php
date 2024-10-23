<?php

namespace Source\Domain\Actions\Product\Output;


use Source\Domain\Actions\Product\Contracts\ProductsGetListActionInterface;
use Source\Domain\Dto\Contracts\BaseDtoCollection;
use Source\Domain\Dto\Pagination\Contracts\BasePaginationDto;
use Source\Domain\Dto\Pagination\Input\PaginationDto;
use Source\Infrastructure\Repositories\Product\Contracts\ProductsRepositoryInterface;

readonly class ProductGetListAction implements ProductsGetListActionInterface
{
    public function __construct(private ProductsRepositoryInterface $products)
    {}

    /**
     * @param  BasePaginationDto|PaginationDto  $paginationDto
     * @return BaseDtoCollection
     */
    public function handle(BasePaginationDto|PaginationDto $paginationDto): BaseDtoCollection
    {
        return $this->products->getList($paginationDto);
    }
}
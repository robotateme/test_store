<?php

namespace Src\Application\Actions\Product;


use Src\Application\Actions\Product\Contracts\ProductsGetListActionInterface;
use Src\Application\Dto\Contracts\BaseDtoCollection;
use Src\Application\Dto\Pagination\Request\PaginationDto;
use Src\Infrastructure\Repositories\Product\Contracts\ProductsRepositoryInterface;

readonly class ProductGetListAction implements ProductsGetListActionInterface
{
    public function __construct(private ProductsRepositoryInterface $products)
    {}

    /**
     * @param  int  $page
     * @param  int  $perPage
     * @return BaseDtoCollection
     */
    public function handle(int $page, int $perPage): BaseDtoCollection
    {
        return $this->products->getList(new PaginationDto($page, $perPage));
    }
}
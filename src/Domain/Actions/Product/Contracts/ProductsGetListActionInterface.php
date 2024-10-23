<?php

namespace Source\Domain\Actions\Product\Contracts;

use Source\Domain\Actions\Contracts\ActionInterface;
use Source\Domain\Dto\Pagination\Contracts\BasePaginationDto;
use Source\Domain\Dto\Pagination\Contracts\PaginationDtoInterface;
use Source\Domain\Dto\Pagination\Input\PaginationDto;

interface ProductsGetListActionInterface extends ActionInterface
{
    public function handle(BasePaginationDto $paginationDto);
}
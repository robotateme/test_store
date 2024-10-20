<?php

namespace Source\Domain\Actions\Product\Contracts;

use Source\Domain\Actions\Contracts\ActionInterface;
use Source\Domain\Dto\Pagination\Request\PaginationDto;

interface ProductsGetListActionInterface extends ActionInterface
{
    public function handle(PaginationDto $paginationDto);
}
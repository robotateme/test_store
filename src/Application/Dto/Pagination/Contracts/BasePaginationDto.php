<?php

namespace Src\Application\Dto\Pagination\Contracts;

abstract readonly class BasePaginationDto implements PaginationDtoInterface
{
    public function __construct(int $page, int $perPage)
    {

    }
}
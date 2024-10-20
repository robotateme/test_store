<?php

namespace App\Dto\Contracts;

use App\Dto\Pagination\Contracts\BasePaginationDto;

abstract readonly class BaseDtoCollection implements DtoCollectionInterface
{
    public function __construct(public array $items, public BasePaginationDto $paginationDto)
    {

    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [];
    }
}
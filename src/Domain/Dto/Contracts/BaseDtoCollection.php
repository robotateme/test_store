<?php

namespace Source\Domain\Dto\Contracts;

use Source\Domain\Dto\Pagination\Contracts\BasePaginationDto;

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
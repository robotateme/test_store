<?php

namespace Source\Domain\Dto\Basket\Output;

use Source\Domain\Dto\Contracts\BaseDtoCollection;
use Source\Domain\Dto\Pagination\Contracts\BasePaginationDto;

readonly class BasketPositionsDto extends BaseDtoCollection
{

    /**
     * @param  array  $items
     * @param  float  $total
     * @param  int  $totalQuantity
     * @param  BasePaginationDto|null  $paginationDto
     */
    public function __construct(
        array $items,
        public float $total,
        public int $totalQuantity,
        ?BasePaginationDto $paginationDto = null
    ) {
        parent::__construct($items, $paginationDto);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [];
    }
}
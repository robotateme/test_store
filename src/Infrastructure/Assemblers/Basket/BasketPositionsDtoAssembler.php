<?php

namespace Source\Infrastructure\Assemblers\Basket;


use Source\Domain\Dto\Basket\Response\BasketPositionsDto;
use Source\Domain\Dto\Contracts\BaseDtoCollection;
use Source\Domain\Dto\Pagination\Contracts\BasePaginationDto;
use Source\Domain\ValueObjects\BasketPositionsTotalValue;
use Source\Domain\ValueObjects\BasketTotalProductsQuantityValue;

class BasketPositionsDtoAssembler extends BasketPositionDtoAssembler
{
    /**
     * @param  string  $dtoClass
     * @param  array  $items
     * @param  BasePaginationDto|null  $pagination
     * @return BasketPositionsDto
     */
    protected static function instantiate(
        string $dtoClass,
        array $items,
        BasePaginationDto|null $pagination
    ): BaseDtoCollection {
        return new $dtoClass($items,
            (new BasketPositionsTotalValue($items))->getValue(),
            (new BasketTotalProductsQuantityValue($items))->getValue(),
            $pagination
        );
    }
}
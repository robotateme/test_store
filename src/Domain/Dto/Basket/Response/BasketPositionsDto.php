<?php

namespace Source\Domain\Dto\Basket\Response;

use Source\Domain\Dto\Contracts\BaseDtoCollection;

readonly class BasketPositionsDto extends BaseDtoCollection
{

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [];
    }
}
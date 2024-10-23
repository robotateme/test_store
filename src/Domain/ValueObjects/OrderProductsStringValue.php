<?php

namespace Source\Domain\ValueObjects;

use Source\Domain\Contracts\ValueObjectInterface;
use Source\Domain\Dto\Basket\Output\BasketPositionsDto;
use Source\Domain\Dto\Contracts\BaseDto;
use Source\Domain\Dto\Product\Output\ProductDto;

class OrderProductsStringValue implements ValueObjectInterface
{
    private string $value;

    /**
     * @param  BaseDto|BasketPositionsDto  $basketPositions
     */
    public function __construct(BaseDto|BasketPositionsDto $basketPositions)
    {
        $titles = [];
        /** @var ProductDto $product */
        foreach ($basketPositions->items as $product) {
            $titles[] = $product->title;
        }

        $this->value = implode(', ', $titles);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
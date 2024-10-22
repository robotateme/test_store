<?php

namespace Source\Domain\ValueObjects;

use Source\Domain\Contracts\ValueObjectInterface;
use Source\Domain\Dto\Basket\Response\BasketPositionDto;

class BasketPositionsTotalValue implements ValueObjectInterface
{
    private float $value;
    public function __construct(array $items)
    {
        $this->value = array_reduce($items, function ($result, $item) {
            /** @var BasketPositionDto $item */
            $result += $item->price;
            return $result;
        }) ?? 0.0;
    }

    public function getValue(): float
    {
        return (new MoneyValue($this->value))->getValue();
    }

    public function __toString(): string
    {
        return (new MoneyValue($this->value))->getValue();
    }
}
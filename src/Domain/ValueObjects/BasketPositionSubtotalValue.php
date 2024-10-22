<?php

namespace Source\Domain\ValueObjects;

use Source\Domain\Contracts\ValueObjectInterface;

class BasketPositionSubtotalValue implements ValueObjectInterface
{
    private float $value;

    public function __construct(float $price, int $quantity)
    {
        $this->value = $price * $quantity;
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
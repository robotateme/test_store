<?php

namespace Source\Domain\ValueObjects;

use Source\Domain\Contracts\ValueObjectInterface;

class BasketPositionPriceValue implements ValueObjectInterface
{
    private float $value;

    public function __construct(float $price, int $quantity)
    {
        $this->value = $price * $quantity;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
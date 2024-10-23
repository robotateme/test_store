<?php

namespace Source\Domain\ValueObjects;

use Source\Domain\Contracts\ValueObjectInterface;

class BasketPositionSubtotalValue implements ValueObjectInterface
{
    private float $value;

    /**
     * @param  float  $price
     * @param  int  $quantity
     */
    public function __construct(float $price, int $quantity)
    {
        $this->value = $price * $quantity;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return (new MoneyValue($this->value))->getValue();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (new MoneyValue($this->value))->getValue();
    }
}
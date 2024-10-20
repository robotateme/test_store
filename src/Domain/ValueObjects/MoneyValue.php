<?php

namespace Source\Domain\ValueObjects;

use Source\Domain\Contracts\ValueObjectInterface;

class MoneyValue implements ValueObjectInterface
{

    public function __construct(private float $value)
    {
        $this->value = round($this->value, 2);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }
}
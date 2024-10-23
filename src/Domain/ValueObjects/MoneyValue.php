<?php

namespace Source\Domain\ValueObjects;

use Source\Domain\Contracts\ValueObjectInterface;

class MoneyValue implements ValueObjectInterface
{

    /**
     * @param  float|null  $value
     */
    public function __construct(private ?float $value)
    {
        $this->value = round($this->value, 2);
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
        return $this->getValue();
    }
}
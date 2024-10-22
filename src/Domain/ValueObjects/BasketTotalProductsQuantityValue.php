<?php

namespace Source\Domain\ValueObjects;

use Source\Domain\Contracts\ValueObjectInterface;

class BasketTotalProductsQuantityValue implements ValueObjectInterface
{
    private int $value;

    public function __construct(array $items)
    {
        $result = array_reduce($items, function ($result, $item) {
            $result += $item->quantity;
            return $result;
        });

        $this->value = $result ?? 0;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}
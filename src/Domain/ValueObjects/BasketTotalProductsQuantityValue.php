<?php

namespace Source\Domain\ValueObjects;

use Source\Domain\Contracts\ValueObjectInterface;

class BasketTotalProductsQuantityValue implements ValueObjectInterface
{
    private int $value;

    /**
     * @param  array  $items
     */
    public function __construct(array $items)
    {
        $result = array_reduce($items, function ($result, $item) {
            $result += $item->quantity;
            return $result;
        });

        $this->value = $result ?? 0;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}
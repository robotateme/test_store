<?php

namespace Src\Domain\ValueObjects;

use Src\Domain\Contracts\ValueObjectInterface;

class ProductAliasValue implements  ValueObjectInterface
{
    private string $value;
    public function __construct(int $productId)
    {
        $this->value = "Product #$productId";
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
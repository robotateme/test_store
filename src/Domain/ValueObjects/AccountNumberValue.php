<?php

namespace Source\Domain\ValueObjects;

use Source\Core\Utils\Numbers;
use Source\Domain\Contracts\ValueObjectInterface;

class AccountNumberValue implements ValueObjectInterface
{
    private float $divisor = 1e9;

    private string $value;
    public function __construct(int $dividend)
    {
        $quotient = Numbers::numberToString($dividend / $this->divisor);
        $this->value = str_replace('.', '', $quotient);
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
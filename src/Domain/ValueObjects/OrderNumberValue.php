<?php

namespace Source\Domain\ValueObjects;

use Source\Core\Utils\Numbers;
use Source\Domain\Contracts\ValueObjectInterface;

class OrderNumberValue implements ValueObjectInterface
{
    private string $value;
    public function __construct()
    {
        $this->value = ('0000'.date('YmdHis'). mt_rand(100, 999));
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
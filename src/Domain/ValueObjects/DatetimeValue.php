<?php

namespace Src\Domain\ValueObjects;

use DateTime;
use Src\Domain\Contracts\ValueObjectInterface;

class DatetimeValue implements ValueObjectInterface
{
    private string $format = 'Y-m-d H:i:s';
    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value->format($this->format);
    }

    public function __construct(private readonly DateTime $value)
    {
    }
}
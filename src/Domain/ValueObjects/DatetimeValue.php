<?php

namespace Source\Domain\ValueObjects;

use Carbon\Carbon;
use DateTime;
use Dflydev\DotAccessData\Data;
use Source\Domain\Contracts\ValueObjectInterface;

class DatetimeValue implements ValueObjectInterface
{
    private string $format = 'Y-m-d H:i:s';

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function __construct(private readonly DateTime|string $value)
    {
    }
}
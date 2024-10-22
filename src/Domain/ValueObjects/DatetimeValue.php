<?php

namespace Source\Domain\ValueObjects;

use DateTime;
use Exception;
use Source\Domain\Contracts\ValueObjectInterface;
use Source\Domain\ValueObjects\Exception\ValueException;

class DatetimeValue implements ValueObjectInterface
{
    private string $format = 'Y-m-d H:i:s';

    public function getValue(): string
    {
        return $this->value->format($this->format);
    }

    public function __toString(): string
    {
        return $this->value->format($this->format);
    }

    /**
     * @throws ValueException
     */
    public function __construct(private DateTime|string $value)
    {
        try {
            if (is_string($this->value)) {
                $this->value = (new DateTime($this->value));
            }
        } catch (Exception $e) {
            throw new ValueException($e);
        }
    }
}
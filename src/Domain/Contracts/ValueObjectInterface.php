<?php

namespace Source\Domain\Contracts;

interface ValueObjectInterface
{
    public function getValue(): mixed;

    public function __toString(): string;
}
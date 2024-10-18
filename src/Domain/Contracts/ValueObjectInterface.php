<?php

namespace Src\Domain\Contracts;

interface ValueObjectInterface
{
    public function getValue(): mixed;

    public function __toString(): string;
}
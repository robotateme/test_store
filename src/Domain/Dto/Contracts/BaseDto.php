<?php

namespace Source\Domain\Dto\Contracts;

abstract readonly class BaseDto implements DtoInterface
{
    /**
     * @return array
     */
    abstract public function toArray(): array;
}
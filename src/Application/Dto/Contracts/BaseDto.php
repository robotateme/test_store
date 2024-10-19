<?php

namespace Src\Application\Dto\Contracts;

use Str;

abstract readonly class BaseDto implements DtoInterface
{
    /**
     * @return array
     */
    abstract public function toArray(): array;
}
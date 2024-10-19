<?php

namespace Src\Application\Dto\Contracts;

use Src\Application\Dto\Exceptions\DtoException;
use Src\Core\Hydrator\Exceptions\HydratorException;
use Src\Core\Hydrator\Hydrator;

abstract readonly class BaseDto implements DtoInterface
{

    public function toArray(array $properties = []): array
    {
        return Hydrator::extract($this);
    }

    /**
     * @throws DtoException
     */
    public static function from(array $data): static
    {
        try {
            return Hydrator::hydrate(static::class, $data);
        } catch (HydratorException $e) {
            throw new DtoException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
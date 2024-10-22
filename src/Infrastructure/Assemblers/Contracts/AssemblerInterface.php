<?php

namespace Source\Infrastructure\Assemblers\Contracts;

use Closure;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;
use Source\Domain\Dto\Contracts\DtoCollectionInterface;
use Source\Domain\Dto\Contracts\DtoInterface;
use Source\Domain\Dto\Pagination\Contracts\BasePaginationDto;

interface AssemblerInterface
{
    /**
     * @param  array  $data
     * @return DtoInterface
     */
    public static function fromArray(array $data): DtoInterface;

    /**
     * @param  Model  $model
     * @return DtoInterface
     */
    public static function fromModel(Model $model): DtoInterface;

    /**
     * @param  array|Arrayable  $models
     * @return array
     */
    public static function toArrayOfDto(array|Arrayable $models): array;

    public static function toCollectionOfDto(
        array|Arrayable $models,
        string $dtoClass,
        BasePaginationDto|null $pagination = null
    ): DtoCollectionInterface;
}
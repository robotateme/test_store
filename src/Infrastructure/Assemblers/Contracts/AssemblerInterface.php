<?php

namespace Src\Infrastructure\Assemblers\Contracts;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;
use Src\Application\Dto\Contracts\BaseDtoCollection;
use Src\Application\Dto\Contracts\DtoCollectionInterface;
use Src\Application\Dto\Contracts\DtoInterface;
use Src\Application\Dto\Pagination\Contracts\BasePaginationDto;

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
        string|BaseDtoCollection $dtoCollection,
        BasePaginationDto|null $pagination = null
    ): DtoCollectionInterface;
}
<?php

namespace Source\Infrastructure\Assemblers\Contracts;

use Exception;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Source\Domain\Dto\Contracts\BaseDtoCollection;
use Source\Domain\Dto\Contracts\DtoCollectionInterface;
use Source\Domain\Dto\Contracts\DtoInterface;
use Source\Domain\Dto\Pagination\Contracts\BasePaginationDto;
use Source\Infrastructure\Assemblers\Exceptions\AssemblerException;

abstract class BaseDtoAssembler implements AssemblerInterface
{
    /**
     * @param  array  $data
     * @return DtoInterface
     */
    abstract public static function fromArray(array $data): DtoInterface;

    /**
     * @param  Model  $model
     * @return DtoInterface
     */
    abstract public static function fromModel(Model $model): DtoInterface;

    /**
     * @param  array|Collection  $models
     * @return array
     * @throws AssemblerException
     */
    public static function toArrayOfDto(array|Arrayable $models): array
    {
        $models = ($models instanceof Arrayable) ? $models->toArray() : $models;
        return array_map(function (Model|array $data) {
            if (is_array($data)) {
                return static::fromArray($data);
            } elseif ($data instanceof Model) {
                return static::fromModel($data);
            } elseif ($data instanceof Arrayable) {
                return static::fromArray($data->toArray());
            }
            throw new AssemblerException("Wrong array item type");
        }, $models);
    }

    /**
     * @param  array|Arrayable  $models
     * @param  string|DtoCollectionInterface  $dtoItem
     * @param  BasePaginationDto|null  $pagination
     * @return BaseDtoCollection
     * @throws AssemblerException
     */
    public static function toCollectionOfDto(
        array|Arrayable $models,
        string|DtoCollectionInterface $dtoItem,
        BasePaginationDto|null $pagination = null,
    ): DtoCollectionInterface {

        if (is_string($dtoItem) && !class_exists($dtoItem)) {
            throw new AssemblerException("Class $dtoItem does not exist");
        }

        $models = ($models instanceof Arrayable) ? $models->toArray() : $models;
        try {
            $items = array_map(function ($data) {
                if (is_array($data)) {
                    return static::fromArray($data);
                } elseif ($data instanceof Arrayable) {
                    return static::fromArray($data->toArray());
                }
                throw new AssemblerException("Wrong array item type");
            }, $models);

            return new $dtoItem($items, $pagination ?? null);
        } catch (Exception $e) {
            throw new AssemblerException($e->getMessage());
        }
    }

}
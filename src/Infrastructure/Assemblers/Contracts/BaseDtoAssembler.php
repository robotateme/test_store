<?php

namespace Source\Infrastructure\Assemblers\Contracts;

use Closure;
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
     * @param  string  $dtoClass
     * @param  BasePaginationDto|null  $pagination
     * @return BaseDtoCollection
     * @throws AssemblerException
     */
    public static function toCollectionOfDto(
        array|Arrayable $models,
        string $dtoClass,
        BasePaginationDto|null $pagination = null,
    ): DtoCollectionInterface {
        if (!class_exists($dtoClass)) {
            throw new AssemblerException("Class $dtoClass does not exist");
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

            return static::instantiate($dtoClass, $items, $pagination);
        } catch (Exception $e) {
            throw new AssemblerException($e->getMessage());
        }
    }

    protected static function instantiate(string $dtoClass, array $items, ?BasePaginationDto $pagination)
    {
        return new $dtoClass($items, $pagination);
    }
}
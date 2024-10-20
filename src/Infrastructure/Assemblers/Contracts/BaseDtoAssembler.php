<?php

namespace Src\Infrastructure\Assemblers\Contracts;

use Exception;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Dto\Contracts\BaseDtoCollection;
use App\Dto\Contracts\DtoCollectionInterface;
use App\Dto\Contracts\DtoInterface;
use App\Dto\Pagination\Contracts\BasePaginationDto;
use Src\Infrastructure\Assemblers\Exceptions\AssemblerException;

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
            } elseif ($data instanceof Arrayable) {
                return static::fromArray($data->toArray());
            }
            throw new AssemblerException("Wrong array item type");
        }, $models);
    }

    /**
     * @param  array|Arrayable  $models
     * @param  string|BaseDtoCollection  $dtoCollection
     * @param  BasePaginationDto|null  $pagination
     * @return BaseDtoCollection
     * @throws AssemblerException
     */
    public static function toCollectionOfDto(
        array|Arrayable $models,
        string|BaseDtoCollection $dtoCollection,
        BasePaginationDto|null $pagination = null,
    ): BaseDtoCollection {

        if (is_string($dtoCollection) && !class_exists($dtoCollection)) {
            throw new AssemblerException("Class $dtoCollection does not exist");
        }

        $models = ($models instanceof Arrayable) ? $models->toArray() : $models;

        try {
            $items = array_map(function ($data) {
                if (is_array($data)) {
                    return static::fromArray($data);
                } elseif ($data instanceof Arrayable) {
                    return static::fromModel($data->toArray());
                }
                throw new AssemblerException("Wrong array item type");
            }, $models);

            return new $dtoCollection($items, $pagination);
        } catch (Exception $e) {
            throw new AssemblerException($e->getMessage());
        }
    }

}
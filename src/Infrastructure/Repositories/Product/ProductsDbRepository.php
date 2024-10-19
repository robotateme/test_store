<?php

namespace Src\Infrastructure\Repositories\Product;

use Src\Application\Dto\Contracts\BaseDto;
use Src\Application\Dto\Contracts\BaseDtoCollection;
use Src\Application\Dto\Contracts\DtoCollectionInterface;
use Src\Application\Dto\Pagination\Contracts\BasePaginationDto;
use Src\Application\Dto\Pagination\Response\PaginationResultDto;
use Src\Application\Dto\Product\Response\ProductListDto;
use Src\Infrastructure\Assemblers\Exceptions\AssemblerException;
use Src\Infrastructure\Assemblers\Product\ProductDtoAssembler;
use Src\Infrastructure\Assemblers\Product\ProductsListDtoAssembler;
use Src\Infrastructure\Repositories\Contracts\BaseDbRepository;
use Src\Infrastructure\Repositories\Exceptions\ResourceNotFoundException;
use Src\Infrastructure\Repositories\Product\Contracts\ProductsRepositoryInterface;

class ProductsDbRepository extends BaseDbRepository implements ProductsRepositoryInterface
{
    /**
     * @param  BasePaginationDto  $pagination
     * @return DtoCollectionInterface
     * @throws AssemblerException
     */
    public function getList(BasePaginationDto $pagination): BaseDtoCollection
    {
        $models = $this->query(pagination: $pagination)->get();
        return ProductsListDtoAssembler::toCollectionOfDto(
            $models,
            ProductListDto::class,
            new PaginationResultDto($pagination->page, $pagination->perPage, $this->totalCount()));
    }

    /**
     * @param  int  $id
     * @return BaseDto
     * @throws ResourceNotFoundException
     */
    public function getOne(int $id): BaseDto
    {
        $model = $this->query()->find($id);
        if (is_null($model)) {
            throw new ResourceNotFoundException();
        }
        return ProductDtoAssembler::fromModel($model);
    }

    /**
     * @return int
     */
    public function totalCount(): int
    {
        return $this->query()->count();
    }
}
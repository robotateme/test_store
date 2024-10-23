<?php

namespace Source\Infrastructure\Repositories\Product;

use Source\Domain\Dto\Contracts\BaseDto;
use Source\Domain\Dto\Contracts\BaseDtoCollection;
use Source\Domain\Dto\Contracts\DtoCollectionInterface;
use Source\Domain\Dto\Pagination\Contracts\BasePaginationDto;
use Source\Domain\Dto\Pagination\Input\PaginationDto;
use Source\Domain\Dto\Pagination\Output\PaginationResultDto;
use Source\Domain\Dto\Product\Output\ProductListDto;
use Source\Infrastructure\Assemblers\Exceptions\AssemblerException;
use Source\Infrastructure\Assemblers\Product\ProductDtoAssembler;
use Source\Infrastructure\Assemblers\Product\ProductsListDtoAssembler;
use Source\Infrastructure\Repositories\Contracts\BaseDbRepository;
use Source\Infrastructure\Repositories\Exceptions\ResourceNotFoundException;
use Source\Infrastructure\Repositories\Product\Contracts\ProductsRepositoryInterface;

class ProductsDbRepository extends BaseDbRepository implements ProductsRepositoryInterface
{
    /**
     * @param  BasePaginationDto|PaginationDto  $pagination
     * @return BaseDtoCollection
     * @throws AssemblerException
     */
    public function getList(BasePaginationDto|PaginationDto $pagination): BaseDtoCollection
    {
        $models = $this->getBuilder()->forPage($pagination->page, $pagination->perPage)->get();
        return ProductsListDtoAssembler::toCollectionOfDto(
            $models,
            ProductListDto::class,
            new PaginationResultDto($pagination->page, $pagination->perPage, $this->totalCount()));
    }

    /**
     * @param  int  $id
     * @return BaseDto
     * @throws ResourceNotFoundException|AssemblerException
     */
    public function getOne(int $id): BaseDto
    {
        $model = $this->getBuilder()->find($id);
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
        return $this->getBuilder()->count();
    }
}
<?php

namespace Source\Infrastructure\Repositories\Product\Contracts;

use Source\Domain\Dto\Contracts\BaseDto;
use Source\Domain\Dto\Contracts\BaseDtoCollection;
use Source\Domain\Dto\Pagination\Contracts\BasePaginationDto;
use Source\Infrastructure\Repositories\Contracts\RepositoryInterface;

interface ProductsRepositoryInterface extends RepositoryInterface
{
    /**
     * @param  BasePaginationDto  $pagination
     * @return BaseDtoCollection
     */
    public function getList(BasePaginationDto $pagination): BaseDtoCollection;

    /**
     * @param  int  $id
     * @return BaseDto
     */
    public function getOne(int $id): BaseDto;

    /**
     * @return int
     */
    public function totalCount(): int;
}
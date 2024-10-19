<?php

namespace Src\Infrastructure\Repositories\Product\Contracts;

use Src\Application\Dto\Contracts\BaseDto;
use Src\Application\Dto\Contracts\BaseDtoCollection;
use Src\Application\Dto\Pagination\Contracts\BasePaginationDto;
use Src\Infrastructure\Repositories\Contracts\RepositoryInterface;

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
<?php

namespace Src\Infrastructure\Repositories\Product\Contracts;

use App\Dto\Contracts\BaseDto;
use App\Dto\Contracts\BaseDtoCollection;
use App\Dto\Pagination\Contracts\BasePaginationDto;
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
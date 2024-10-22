<?php

namespace Source\Infrastructure\Repositories\Basket\Contracts;

use Source\Domain\Dto\Basket\Request\BasketAddProductDto;
use Source\Domain\Dto\Contracts\BaseDto;
use Source\Domain\Dto\Contracts\DtoInterface;
use Source\Infrastructure\Repositories\Contracts\RepositoryInterface;

interface BasketsRepositoryInterface extends RepositoryInterface
{
    /**
     * @param  BasketAddProductDto  $addProductDto
     * @return BaseDto
     */
    public function create(BasketAddProductDto $addProductDto): DtoInterface;
}
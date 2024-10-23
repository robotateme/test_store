<?php

namespace Source\Infrastructure\Repositories\Basket\Contracts;

use Source\Domain\Dto\Basket\Input\BasketAddProductDto;
use Source\Domain\Dto\Basket\Input\BasketRemovePositionDto;
use Source\Domain\Dto\Contracts\BaseDto;
use Source\Domain\Dto\Contracts\BaseDtoCollection;
use Source\Domain\Dto\Contracts\DtoInterface;
use Source\Infrastructure\Repositories\Contracts\RepositoryInterface;
use Source\Infrastructure\Repositories\Exceptions\ResourceNotFoundException;

interface BasketsRepositoryInterface extends RepositoryInterface
{
    /**
     * @param  BasketAddProductDto  $addProductDto
     * @return BaseDto
     */
    public function create(BasketAddProductDto $addProductDto): DtoInterface;

    /**
     * @param  string  $sessionId
     * @param  int|null  $userId
     * @return BaseDtoCollection
     */
    public function getPositions(string $sessionId, int $userId = null): BaseDtoCollection;

    /**
     * @param  BasketAddProductDto  $addProductDto
     * @return bool
     */
    public function updatePositionIncrementQuantity(BasketAddProductDto $addProductDto): bool;

    /**
     * @param  BasketRemovePositionDto  $removePositionDto
     * @return bool|null
     * @throws ResourceNotFoundException
     */
    public function removePosition(BasketRemovePositionDto $removePositionDto) : ?bool;
}
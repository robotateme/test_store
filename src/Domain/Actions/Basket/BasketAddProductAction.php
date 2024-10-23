<?php

namespace Source\Domain\Actions\Basket;

use Source\Domain\Actions\Basket\Contracts\BasketAddProductActionInterface;
use Source\Domain\Actions\Exceptions\ActionException;
use Source\Domain\Dto\Basket\Input\BasketAddProductDto;
use Source\Domain\Dto\Contracts\BaseDto;
use Source\Domain\Dto\Contracts\BaseDtoCollection;
use Source\Infrastructure\Assemblers\Exceptions\AssemblerException;
use Source\Infrastructure\Repositories\Basket\BasketsDbRepository;
use Source\Infrastructure\Repositories\Basket\Contracts\BasketsRepositoryInterface;
use Source\Infrastructure\Repositories\Exceptions\RepositoryException;

readonly class BasketAddProductAction implements BasketAddProductActionInterface
{

    /**
     * @param  BasketsDbRepository  $basketsRepository
     */
    public function __construct(private BasketsRepositoryInterface $basketsRepository)
    {
    }

    /**
     * @param  BaseDto|BasketAddProductDto  $dto
     * @return BaseDtoCollection
     * @throws ActionException
     */
    public function handle(BaseDto|BasketAddProductDto $dto): BaseDtoCollection
    {
        try {
            if (!$this->basketsRepository->updatePositionIncrementQuantity($dto)) {
                $this->basketsRepository->create($dto);
            }
            return $this->basketsRepository->getPositions(
                $dto->sessionId,
                $dto->userId
            );
        } catch (AssemblerException|RepositoryException $e) {
            throw new ActionException($e->getMessage());
        }
    }
}
<?php

namespace Source\Domain\Actions\Basket;

use Source\Domain\Actions\Basket\Contracts\BasketAddProductActionInterface;
use Source\Domain\Actions\Exceptions\ActionException;
use Source\Domain\Dto\Basket\Request\BasketAddProductDto;
use Source\Domain\Dto\Contracts\BaseDto;
use Source\Domain\Dto\Contracts\BaseDtoCollection;
use Source\Infrastructure\Assemblers\Exceptions\AssemblerException;
use Source\Infrastructure\Repositories\Basket\BasketsDbRepository;
use Source\Infrastructure\Repositories\Basket\Contracts\BasketsRepositoryInterface;

readonly class BasketAddProductAction implements BasketAddProductActionInterface
{

    /**
     * @param  BasketsDbRepository  $basketsRepository
     */
    public function __construct(private BasketsRepositoryInterface $basketsRepository)
    {
    }

    /**
     * @throws AssemblerException
     * @throws ActionException
     */
    public function handle(BasketAddProductDto $dto): BaseDtoCollection
    {
        if (!$this->basketsRepository->updatePositionIncrementQuantity($dto)) {
            $this->basketsRepository->create($dto);
        }

        try {
            return $this->basketsRepository->getPositions(
                $dto->sessionId,
                $dto->userId
            );
        } catch (AssemblerException $e) {
            throw new ActionException($e->getMessage());
        }
    }
}
<?php

namespace Source\Domain\Actions\Basket;

use Source\Domain\Actions\Basket\Contracts\BasketGetPositionsActionInterface;
use Source\Domain\Dto\Contracts\BaseDtoCollection;
use Source\Infrastructure\Assemblers\Exceptions\AssemblerException;
use Source\Infrastructure\Repositories\Basket\BasketsDbRepository;
use Source\Infrastructure\Repositories\Basket\Contracts\BasketsRepositoryInterface;

readonly class BasketGetPositionsAction implements BasketGetPositionsActionInterface
{
    /**
     * @param  BasketsRepositoryInterface|BasketsDbRepository  $basketsRepository
     */
    public function __construct(private BasketsRepositoryInterface|BasketsDbRepository $basketsRepository)
    {}

    /**
     * @param  string  $sessionId
     * @param  int|null  $userId
     * @return BaseDtoCollection
     * @throws AssemblerException
     */
    public function handle(string $sessionId, ?int $userId = null): BaseDtoCollection
    {
        return $this->basketsRepository->getPositions($sessionId, $userId);
    }
}
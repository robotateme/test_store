<?php

namespace Source\Domain\Actions\Basket;

use Source\Domain\Actions\Basket\Contracts\BasketGetPositionsActionInterface;
use Source\Domain\Dto\Contracts\BaseDtoCollection;
use Source\Infrastructure\Repositories\Basket\Contracts\BasketsRepositoryInterface;

readonly class BasketGetPositionsAction implements BasketGetPositionsActionInterface
{
    public function __construct(private BasketsRepositoryInterface $basketsRepository)
    {

    }

    public function handle(string $sessionId, string $userId): BaseDtoCollection
    {
        return $this->basketsRepository->getPositions($sessionId, $userId);
    }
}
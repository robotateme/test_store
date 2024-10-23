<?php

namespace Source\Domain\Actions\Basket;

use Source\Domain\Actions\Basket\Contracts\BasketRemovePositionActionInterface;
use Source\Domain\Actions\Exceptions\ActionException;
use Source\Domain\Dto\Basket\Request\BasketRemovePositionDto;
use Source\Infrastructure\Repositories\Basket\Contracts\BasketsRepositoryInterface;
use Source\Infrastructure\Repositories\Exceptions\ResourceNotFoundException;

readonly class BasketRemovePositionAction implements BasketRemovePositionActionInterface
{
    public function __construct(private BasketsRepositoryInterface $basketsRepository)
    {
    }

    /**
     * @param  int  $id
     * @param  string  $sessionId
     * @param  int|null  $userId
     * @return bool
     * @throws ActionException
     */
    public function handle(int $id, string $sessionId, ?int $userId): bool
    {
        try {
            return $this->basketsRepository->removePosition(new BasketRemovePositionDto($id, $sessionId, $userId));
        } catch (ResourceNotFoundException $e) {
            throw new ActionException($e->getMessage());
        }
    }
}
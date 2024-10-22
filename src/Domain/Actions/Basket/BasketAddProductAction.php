<?php

namespace Source\Domain\Actions\Basket;

use Source\Domain\Actions\Basket\Contracts\BasketAddProductActionInterface;
use Source\Domain\Dto\Basket\Request\BasketAddProductDto;
use Source\Domain\Dto\Contracts\BaseDto;
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

    public function handle(BasketAddProductDto $dto): BaseDto
    {
        $basketPosition = $this->basketsRepository->create($dto);
        dd($this->basketsRepository->getPositions(
            $basketPosition->productId,
            $dto->sessionId,
            $dto->userId
        ));
    }
}
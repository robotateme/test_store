<?php

namespace Source\Domain\Dto\Basket\Response;

use Source\Domain\Dto\Contracts\BaseDto;
use Source\Domain\Dto\Product\Response\ProductDto;

readonly class BasketPositionDto extends BaseDto
{
    public function __construct(
        public int $id,
        public ?int $userId,
        public string $sessionId,
        public int $productId,
        public int $quantity,
        public float $price,
        public string $createdAt,
        public null|ProductDto|BaseDto $product = null
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [];
    }
}


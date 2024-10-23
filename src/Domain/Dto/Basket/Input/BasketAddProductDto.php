<?php

namespace Source\Domain\Dto\Basket\Input;

use Source\Domain\Dto\Contracts\BaseDto;

readonly class BasketAddProductDto extends BaseDto
{
    public function __construct(
        public int $productId,
        public int $quantity,
        public ?int $userId = null,
        public ?string $sessionId = null,
    ) {}

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'product_id' => $this->productId,
            'quantity' => $this->quantity,
            'user_id' => $this->userId,
            'session_id' => $this->sessionId,
        ];
    }
}
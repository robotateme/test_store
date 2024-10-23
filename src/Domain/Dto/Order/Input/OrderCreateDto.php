<?php

namespace Source\Domain\Dto\Order\Input;

use Source\Domain\Dto\Contracts\BaseDto;

readonly class OrderCreateDto extends BaseDto
{
    public function __construct(
        public string $orderNumber,
        public string $products,
        public string $totalPrice,
        public string $userId,
    )
    {
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'order_number' => $this->orderNumber,
            'products' => $this->products,
            'total_price' => $this->totalPrice,
            'user_id' => $this->userId,
        ];
    }
}
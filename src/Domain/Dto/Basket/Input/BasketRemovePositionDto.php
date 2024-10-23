<?php

namespace Source\Domain\Dto\Basket\Input;

use Source\Domain\Dto\Contracts\BaseDto;

readonly class BasketRemovePositionDto extends BaseDto
{
    public function __construct(
        public int $id,
        public string $sessionId,
        public ?int $userId = null,
    ) {}

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'user_id' => $this->userId,
            'id' => $this->id,
            'session_id' => $this->sessionId,
        ];
    }
}
<?php

namespace Source\Domain\Dto\User\Output;

use Source\Domain\Dto\Contracts\BaseDto;

readonly class UserLoginResultDto extends BaseDto
{
    public function __construct(
        public int $userId,
        public string $email,
        public string $name,
        public bool $success
    ) {

    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return (array) $this;
    }
}
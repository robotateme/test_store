<?php

namespace App\Dto\User\Response;

use App\Dto\Contracts\BaseDto;

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
<?php

namespace Source\Domain\Dto\User\Response;

use Source\Domain\Dto\Contracts\BaseDto;

readonly class UserDto extends BaseDto
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public string $emailVerifiedAt,
        public string $passwordHash,
        public string $createdAt,
        public string $updatedAt,
        public string $rememberToken,
    )
    {
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return (array) $this;
    }
}
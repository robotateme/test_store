<?php

namespace Source\Domain\Dto\User\Input;

use RuntimeException;
use Source\Domain\Dto\Contracts\BaseDto;

readonly class UserLoginDto extends BaseDto
{
    public function __construct(public string $email, public string $password)
    {
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        throw new RuntimeException('Unimplemented');
    }
}
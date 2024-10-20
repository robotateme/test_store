<?php

namespace App\Dto\User\Request;

use App\Dto\Contracts\BaseDto;

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
        return [];
    }
}
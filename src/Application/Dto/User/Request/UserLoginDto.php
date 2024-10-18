<?php

namespace Src\Application\Dto\User\Request;

use Src\Application\Dto\Contracts\BaseDto;

readonly class UserLoginDto extends BaseDto
{
    public function __construct(public string $email, public string $password)
    {
    }
}
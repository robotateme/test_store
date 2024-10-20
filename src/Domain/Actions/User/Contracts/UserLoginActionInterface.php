<?php

namespace Source\Domain\Actions\User\Contracts;

use Source\Domain\Actions\Contracts\ActionInterface;
use Source\Domain\Dto\Contracts\BaseDto;

interface UserLoginActionInterface extends ActionInterface
{
    public function handle(BaseDto $userLoginDto): BaseDto;
}
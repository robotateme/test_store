<?php

namespace Src\Domain\Actions\User\Contracts;

use App\Dto\Contracts\BaseDto;
use Src\Domain\Actions\Contracts\ActionInterface;

interface UserLoginActionInterface extends ActionInterface
{
    public function handle(BaseDto $userLoginDto): BaseDto;
}
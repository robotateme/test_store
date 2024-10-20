<?php

namespace Src\Domain\Actions\User;

use App\Dto\Contracts\BaseDto;
use App\Dto\User\Request\UserLoginDto;
use App\Dto\User\Response\UserDto;
use Src\Core\Utils\PasswordHash;
use Src\Infrastructure\Repositories\User\Contracts\UserRepositoryInterface;

readonly class UserLoginAction
{
    public function __construct(private UserRepositoryInterface $users)
    {

    }

    public function handle(BaseDto|UserLoginDto $userLoginDto): bool
    {
        /** @var UserDto $userDto */
        $userDto = $this->users->findByEmail($userLoginDto->email);
        return PasswordHash::passwordHashVerify($userLoginDto->password, $userDto->passwordHash);
    }
}
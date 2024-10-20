<?php

namespace Src\Domain\Actions\User;

use App\Dto\Contracts\BaseDto;
use App\Dto\User\Request\UserLoginDto;
use App\Dto\User\Response\UserDto;
use App\Dto\User\Response\UserLoginResultDto;
use Src\Core\Utils\PasswordHash;
use Src\Domain\Actions\Exceptions\NotFoundException;
use Src\Domain\Actions\User\Contracts\UserLoginActionInterface;
use Src\Infrastructure\Repositories\Exceptions\ResourceNotFoundException;
use Src\Infrastructure\Repositories\User\Contracts\UserRepositoryInterface;
use Src\Infrastructure\Repositories\User\UsersDbRepository;

readonly class UserLoginAction implements UserLoginActionInterface
{
    /**
     * @param UsersDbRepository  $users
     */
    public function __construct(private UserRepositoryInterface $users)
    {

    }

    /**
     * @param  BaseDto|UserLoginDto  $userLoginDto
     * @return BaseDto
     * @throws NotFoundException
     */
    public function handle(BaseDto|UserLoginDto $userLoginDto): BaseDto
    {
        /** @var UserDto $userDto */
        try {
            $userDto = $this->users->findByEmail($userLoginDto->email);
        } catch (ResourceNotFoundException $e) {
            throw new NotFoundException();
        }
        return new UserLoginResultDto(
            $userDto->id,
            $userLoginDto->email,
            $userDto->name,
            PasswordHash::passwordHashVerify($userLoginDto->password, $userDto->passwordHash)
        );
    }
}
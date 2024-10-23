<?php

namespace Source\Domain\Actions\User\Input;

use Source\Core\Utils\PasswordHash;
use Source\Domain\Actions\Exceptions\NotFoundException;
use Source\Domain\Actions\User\Contracts\UserLoginActionInterface;
use Source\Domain\Dto\Contracts\BaseDto;
use Source\Domain\Dto\User\Input\UserLoginDto;
use Source\Domain\Dto\User\Output\UserDto;
use Source\Domain\Dto\User\Output\UserLoginResultDto;
use Source\Infrastructure\Repositories\Exceptions\ResourceNotFoundException;
use Source\Infrastructure\Repositories\User\Contracts\UserRepositoryInterface;
use Source\Infrastructure\Repositories\User\UsersDbRepository;

readonly class UserLoginAction implements UserLoginActionInterface
{
    /**
     * @param  UserRepositoryInterface|UsersDbRepository  $users
     */
    public function __construct(private UserRepositoryInterface|UsersDbRepository $users)
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
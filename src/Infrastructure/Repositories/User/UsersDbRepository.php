<?php

namespace Source\Infrastructure\Repositories\User;

use Source\Domain\Dto\User\Output\UserDto;
use Source\Infrastructure\Assemblers\User\UserDtoAssembler;
use Source\Infrastructure\Repositories\Contracts\BaseDbRepository;
use Source\Infrastructure\Repositories\Exceptions\ResourceNotFoundException;
use Source\Infrastructure\Repositories\User\Contracts\UserRepositoryInterface;

class UsersDbRepository extends BaseDbRepository implements UserRepositoryInterface
{

    /**
     * @param  string  $email
     * @return UserDto
     * @throws ResourceNotFoundException
     */
    public function findByEmail(string $email): UserDto
    {
        $user = $this->getBuilder()->where(['email' => $email])->first();
        if (is_null($user)) {
            throw new ResourceNotFoundException();
        }
        return UserDtoAssembler::fromModel($user);
    }
}
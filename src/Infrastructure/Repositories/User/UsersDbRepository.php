<?php

namespace Src\Infrastructure\Repositories\User;

use App\Dto\User\Response\UserDto;
use Src\Infrastructure\Assemblers\User\UserDtoAssembler;
use Src\Infrastructure\Repositories\Contracts\BaseDbRepository;
use Src\Infrastructure\Repositories\User\Contracts\UserRepositoryInterface;

class UsersDbRepository extends BaseDbRepository implements UserRepositoryInterface
{

    public function findByEmail(string $email): UserDto
    {
        $user = $this->query(where: ['email' => $email])->first();
        return UserDtoAssembler::fromModel($user);
    }
}
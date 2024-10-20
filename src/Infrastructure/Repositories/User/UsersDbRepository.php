<?php

namespace Src\Infrastructure\Repositories\User;

use App\Dto\User\Response\UserDto;
use Src\Domain\Actions\Exceptions\NotFoundException;
use Src\Infrastructure\Assemblers\User\UserDtoAssembler;
use Src\Infrastructure\Repositories\Contracts\BaseDbRepository;
use Src\Infrastructure\Repositories\Exceptions\ResourceNotFoundException;
use Src\Infrastructure\Repositories\User\Contracts\UserRepositoryInterface;

class UsersDbRepository extends BaseDbRepository implements UserRepositoryInterface
{

    /**
     * @param  string  $email
     * @return UserDto
     * @throws ResourceNotFoundException
     */
    public function findByEmail(string $email): UserDto
    {
        $user = $this->query(where: ['email' => $email])->first();
        if (is_null($user)) {
            throw new ResourceNotFoundException();
        }
        return UserDtoAssembler::fromModel($user);
    }
}
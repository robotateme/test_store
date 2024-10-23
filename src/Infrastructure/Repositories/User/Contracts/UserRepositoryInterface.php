<?php

namespace Source\Infrastructure\Repositories\User\Contracts;

use Source\Domain\Dto\Contracts\BaseDto;
use Source\Domain\Dto\User\Output\UserDto;
use Source\Infrastructure\Repositories\Contracts\RepositoryInterface;
use Source\Infrastructure\Repositories\Exceptions\ResourceNotFoundException;

interface UserRepositoryInterface extends RepositoryInterface
{

    /**
     * @param  string  $email
     * @return UserDto
     * @throws ResourceNotFoundException
     */
    public function findByEmail(string $email): BaseDto;
}
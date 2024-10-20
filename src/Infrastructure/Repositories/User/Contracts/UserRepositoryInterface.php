<?php

namespace Source\Infrastructure\Repositories\User\Contracts;

use Source\Domain\Dto\Contracts\BaseDto;
use Source\Infrastructure\Repositories\Contracts\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{

    public function findByEmail(string $email): BaseDto;
}
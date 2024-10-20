<?php

namespace Src\Infrastructure\Repositories\User\Contracts;

use App\Dto\Contracts\BaseDto;
use Src\Infrastructure\Repositories\Contracts\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{

    public function findByEmail(string $email): BaseDto;
}
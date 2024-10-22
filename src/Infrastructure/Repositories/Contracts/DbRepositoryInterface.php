<?php

namespace Source\Infrastructure\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface DbRepositoryInterface extends RepositoryInterface
{
    public function __construct(Model $model);
}
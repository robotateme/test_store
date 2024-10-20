<?php

namespace Source\Infrastructure\Repositories\Basket\Contracts;

use Illuminate\Database\Eloquent\Model;
use Source\Infrastructure\Repositories\Contracts\RepositoryInterface;

interface DbRepositoryInterface extends RepositoryInterface
{
    public function __construct(Model $model);
}
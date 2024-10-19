<?php

namespace Src\Infrastructure\Repositories\Basket\Contracts;

use Illuminate\Database\Eloquent\Model;
use Src\Infrastructure\Repositories\Contracts\RepositoryInterface;

interface DbRepositoryInterface extends RepositoryInterface
{
    public function __construct(Model $model);
}
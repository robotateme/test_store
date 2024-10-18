<?php

namespace Src\Infrastructure\Repositories\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * @param  Model  $model
     */
    public function __construct(Model $model);

    /**
     * @return Builder
     */
    public function getBuilder(): Builder;

    public function create(array $data): array;
}
<?php

namespace Src\Infrastructure\Repositories\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    /**
     * @param  Model  $model
     */
    public function __construct(private readonly Model $model)
    {

    }

    /**
     * @return Builder
     */
    public function getBuilder(): Builder
    {
        return $this->model->newModelQuery();
    }
}
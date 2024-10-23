<?php

namespace Source\Infrastructure\Repositories\Contracts;

use Closure;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Expression;
use Source\Domain\Dto\Pagination\Contracts\PaginationDtoInterface;
use Source\Domain\Dto\Pagination\Input\PaginationDto;
use Throwable;

class BaseDbRepository implements DbRepositoryInterface
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
    protected function getBuilder(): Builder
    {
        return $this->model->newModelQuery();
    }
}
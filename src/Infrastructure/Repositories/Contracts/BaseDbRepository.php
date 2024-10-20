<?php

namespace Src\Infrastructure\Repositories\Contracts;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Expression;
use App\Dto\Pagination\Contracts\PaginationDtoInterface;
use App\Dto\Pagination\Request\PaginationDto;
use Src\Infrastructure\Repositories\Basket\Contracts\DbRepositoryInterface;

class BaseDbRepository implements DbRepositoryInterface
{
    /**
     * @param  Model  $model
     */
    public function __construct(private readonly Model $model)
    {}

    /**
     * @return Builder
     */
    private function getBuilder(): Builder
    {
        return $this->model->newModelQuery();
    }


    /**
     * @param  array|Closure|null  $where
     * @param  Expression|string|null  $select
     * @param  array|Closure|null  $with
     * @param  string|Closure|null  $orderBy
     * @param  PaginationDto|null  $pagination
     * @param  int|null  $limit
     * @return Builder
     */
    protected function query(
        array|Closure|null $where = null,
        string|Expression|null $select = null,
        array|Closure|null $with = null,
        string|Closure|null $orderBy = null,
        PaginationDtoInterface $pagination = null,
        int|null $limit = null
    ): Builder {
        return $this->getBuilder()
            ->when(!is_null($select), fn(Builder $query) => $query->select($select))
            ->when(!is_null($where), fn(Builder $query) => $query->where($where))
            ->when(!is_null($with), fn(Builder $query) => $query->with($with))
            ->when(!is_null($limit), fn(Builder $query) => $query->limit($limit))
            ->when(!is_null($orderBy), fn(Builder $query) => $query->orderBy($orderBy))
            ->when(!is_null($pagination), function (Builder $query) use ($pagination) {
                return $query->forPage($pagination->page, $pagination->perPage);
            });
    }
}
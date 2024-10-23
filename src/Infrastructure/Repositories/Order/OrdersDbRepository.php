<?php

namespace Source\Infrastructure\Repositories\Order;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Source\Domain\Dto\Contracts\BaseDto;
use Source\Domain\Dto\Order\Input\OrderCreateDto;
use Source\Infrastructure\Repositories\Contracts\BaseDbRepository;
use Source\Infrastructure\Repositories\Order\Contracts\OrdersRepositoryInterface;

class OrdersDbRepository extends BaseDbRepository implements OrdersRepositoryInterface
{
    /**
     * @param  BaseDto|OrderCreateDto  $orderCreateDto
     * @return Model
     */
    public function create(BaseDto|OrderCreateDto $orderCreateDto)
    {
        return $this->getBuilder()->create($orderCreateDto->toArray());
    }

    /**
     * @param  int  $userId
     * @return Collection
     */
    public function getList(int $userId)
    {
        return $this->getBuilder()->where("user_id", $userId)->get();
    }
}
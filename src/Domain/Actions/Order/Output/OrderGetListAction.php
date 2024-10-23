<?php

namespace Source\Domain\Actions\Order\Output;

use Source\Domain\Actions\Order\Contracts\OrderGetListActionInterface;
use Source\Infrastructure\Repositories\Order\Contracts\OrdersRepositoryInterface;
use Source\Infrastructure\Repositories\Order\OrdersDbRepository;

readonly class OrderGetListAction implements OrderGetListActionInterface
{
    /**
     * @param  OrdersDbRepository  $orders
     */
    public function __construct(private OrdersRepositoryInterface $orders)
    {
    }

    public function handle(int $userId)
    {
        return $this->orders->getList($userId);
    }
}
<?php
namespace Source\Domain\Actions\Order;

use Source\Domain\Actions\Order\Contracts\OrderCreateActionInterface;
use Source\Infrastructure\Repositories\Order\Contracts\OrdersRepositoryInterface;

readonly class OrderCreateAction implements OrderCreateActionInterface
{
    public function __construct(private OrdersRepositoryInterface $orders)
    {
    }

    public function handle(): OrdersRepositoryInterface
    {
        return $this->orders;
    }
}
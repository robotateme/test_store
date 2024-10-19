<?php
namespace Src\Application\Actions\Order;

use Src\Application\Actions\Order\Contracts\OrderCreateActionInterface;
use Src\Infrastructure\Repositories\Order\Contracts\OrdersRepositoryInterface;

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
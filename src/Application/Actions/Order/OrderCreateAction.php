<?php
namespace Src\Application\Actions\Order;

use Src\Application\Actions\Order\Contracts\OrderCreateActionInterface;
use Src\Infrastructure\Repositories\Order\Contracts\OrdersRepositoryInterface;

class OrderCreateAction implements OrderCreateActionInterface
{
    public function __construct(private OrdersRepositoryInterface $orderRepository)
    {
    }

    public function handle()
    {

    }
}
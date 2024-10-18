<?php
namespace Src\Application\Actions\Order;

use Src\Application\Actions\Order\Contracts\OrderCreateActionInterface;
use Src\Infrastructure\Repositories\Order\Contracts\OrderRepositoryInterface;

class OrderCreateAction implements OrderCreateActionInterface
{
    public function __construct(private OrderRepositoryInterface $orderRepository)
    {
    }

    public function handle()
    {

    }
}
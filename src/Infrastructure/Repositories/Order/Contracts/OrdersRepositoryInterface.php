<?php

namespace Source\Infrastructure\Repositories\Order\Contracts;

use Source\Domain\Dto\Contracts\BaseDto;
use Source\Infrastructure\Repositories\Contracts\RepositoryInterface;

interface OrdersRepositoryInterface extends RepositoryInterface
{
    public function create(BaseDto $orderCreateDto);
}
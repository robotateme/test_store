<?php

namespace Source\Domain\Actions\Basket\Contracts;

use Source\Domain\Actions\Contracts\ActionInterface;

interface BasketGetPositionsActionInterface extends ActionInterface
{
    public function handle(string $sessionId, string $userId);
}
<?php

namespace Source\Domain\Actions\Basket\Contracts;

use Source\Domain\Actions\Contracts\ActionInterface;
use Source\Domain\Actions\Exceptions\ActionException;

interface BasketRemovePositionActionInterface extends ActionInterface
{
    /**
     * @param  int  $id
     * @param  string  $sessionId
     * @param  int  $userId
     * @return bool
     * @throws ActionException
     */
    public function handle(int $id, string $sessionId, int $userId): bool;
}
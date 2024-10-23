<?php

namespace Source\Domain\Actions\Basket\Contracts;

use Source\Domain\Actions\Contracts\ActionInterface;
use Source\Domain\Dto\Contracts\BaseDtoCollection;
use Source\Infrastructure\Assemblers\Exceptions\AssemblerException;

interface BasketGetPositionsActionInterface extends ActionInterface
{
    /**
     * @param  string  $sessionId
     * @param  int|null  $userId
     * @return BaseDtoCollection
     * @throws AssemblerException
     */
    public function handle(string $sessionId, ?int $userId = null): BaseDtoCollection;
}
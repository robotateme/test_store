<?php

namespace Source\Domain\Actions\Basket\Contracts;

use Source\Domain\Actions\Contracts\ActionInterface;
use Source\Domain\Dto\Basket\Request\BasketAddProductDto;
use Source\Domain\Dto\Contracts\BaseDto;
use Source\Domain\Dto\Contracts\BaseDtoCollection;

interface BasketAddProductActionInterface extends ActionInterface
{
    public function handle(BasketAddProductDto $dto): BaseDtoCollection;
}
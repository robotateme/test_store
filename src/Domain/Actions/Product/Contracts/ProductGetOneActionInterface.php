<?php

namespace Source\Domain\Actions\Product\Contracts;

use Source\Domain\Actions\Contracts\ActionInterface;
use Source\Domain\Dto\Contracts\BaseDto;

interface ProductGetOneActionInterface extends ActionInterface
{
    public function handle(int $id): BaseDto;
}
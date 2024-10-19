<?php

namespace Src\Application\Actions\Product\Contracts;

use Src\Application\Actions\Contracts\ActionInterface;
use Src\Application\Dto\Contracts\BaseDto;

interface ProductGetOneActionInterface extends ActionInterface
{
    public function handle(int $id): BaseDto;
}
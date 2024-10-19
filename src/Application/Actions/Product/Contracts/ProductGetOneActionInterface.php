<?php

namespace Src\Application\Actions\Product\Contracts;

use Src\Application\Actions\Contracts\ActionInterface;
use Src\Application\Dto\Product\Response\ProductDto;

interface ProductGetOneActionInterface extends ActionInterface
{
    public function handle(int $id): ProductDto;
}
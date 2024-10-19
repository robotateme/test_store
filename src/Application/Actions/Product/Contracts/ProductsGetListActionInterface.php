<?php

namespace Src\Application\Actions\Product\Contracts;

use Src\Application\Actions\Contracts\ActionInterface;

interface ProductsGetListActionInterface extends ActionInterface
{
    public function handle(int $page, int $perPage);
}
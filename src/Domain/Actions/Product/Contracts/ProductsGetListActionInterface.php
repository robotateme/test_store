<?php

namespace Src\Domain\Actions\Product\Contracts;

use Src\Domain\Actions\Contracts\ActionInterface;

interface ProductsGetListActionInterface extends ActionInterface
{
    public function handle(int $page, int $perPage);
}
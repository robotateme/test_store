<?php

namespace Src\Domain\Actions\Product\Contracts;

use App\Dto\Contracts\BaseDto;
use Src\Domain\Actions\Contracts\ActionInterface;

interface ProductGetOneActionInterface extends ActionInterface
{
    public function handle(int $id): BaseDto;
}
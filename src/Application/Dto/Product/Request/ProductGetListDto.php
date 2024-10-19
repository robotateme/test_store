<?php

namespace Src\Application\Dto\Product\Request;

use Src\Application\Dto\Contracts\BaseDto;

readonly class ProductGetListDto extends BaseDto
{
    public function __construct()
    {}

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [];
    }
}
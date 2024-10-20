<?php

namespace App\Dto\Product\Request;

use App\Dto\Contracts\BaseDto;

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
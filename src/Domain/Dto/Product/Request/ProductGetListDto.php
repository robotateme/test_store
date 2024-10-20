<?php

namespace Source\Domain\Dto\Product\Request;

use Source\Domain\Dto\Contracts\BaseDto;

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
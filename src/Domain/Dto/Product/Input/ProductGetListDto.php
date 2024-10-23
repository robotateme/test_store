<?php

namespace Source\Domain\Dto\Product\Input;

use RuntimeException;
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
        throw new RuntimeException('Unimplemented');
    }
}
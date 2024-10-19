<?php

namespace Src\Application\Dto\Product\Response;

use Src\Application\Dto\Contracts\BaseDto;
readonly class ProductDto extends BaseDto
{
    public function __construct(
        public int $id,
        public string $title,
        public float $price,
        public string $createdAt,
    ) {}

    public function toArray(): array
    {
        return [];
    }
}
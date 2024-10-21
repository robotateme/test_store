<?php

namespace Source\Domain\Dto\Product\Response;

use Source\Domain\Dto\Contracts\BaseDto;

readonly class ProductDto extends BaseDto
{
    public function __construct(
        public int $id,
        public string $title,
        public float $price,
        public ?string $createdAt,
    ) {}

    public function toArray(): array
    {
        return [];
    }
}
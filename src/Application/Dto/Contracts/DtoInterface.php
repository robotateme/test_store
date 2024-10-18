<?php

namespace Src\Application\Dto\Contracts;

interface DtoInterface
{
    public function toArray(): array;

    public static function from(array $data): static;
}
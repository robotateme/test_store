<?php

namespace Source\Domain\Dto\Pagination\Response;

use Source\Domain\Dto\Pagination\Contracts\BasePaginationDto;

readonly class PaginationResultDto extends BasePaginationDto
{
    public function __construct(public int $page, public int $perPage, public int $totalCount)
    {
        parent::__construct($this->page, $this->perPage);
    }

    public function toArray(): array
    {
        return (array) $this;
    }
}
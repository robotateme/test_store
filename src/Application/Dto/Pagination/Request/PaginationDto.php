<?php

namespace Src\Application\Dto\Pagination\Request;

use Src\Application\Dto\Pagination\Contracts\BasePaginationDto;

readonly class PaginationDto extends BasePaginationDto
{

    /**
     * @param  int  $page
     * @param  int  $perPage
     */
    public function __construct(public int $page, public int $perPage)
    {
        parent::__construct($this->page, $this->perPage);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'page' => $this->page,
            'perPage' => $this->perPage
        ];
    }
}
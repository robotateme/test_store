<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Source\Domain\Dto\Pagination\Response\PaginationResultDto;

class Pagination extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $page,
        public int $perPage,
        public int $totalCount,
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $pagesCount = (int) ceil($this->totalCount / $this->perPage);
        return view('components.pagination', [
            'page' => $this->page,
            'pages' => range(1, $pagesCount),
            'perPage' => $this->perPage,
            'prev' => $this->page === 1 ? null : $this->page - 1,
            'next' => $this->page === $pagesCount ? null : $this->page + 1,
        ]);
    }
}

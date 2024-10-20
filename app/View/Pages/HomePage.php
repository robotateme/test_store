<?php

namespace App\View\Pages;

use App\View\Pages\Contracts\BasePage;
use App\View\Pages\Contracts\HomePageInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Source\Domain\Actions\Product\ProductGetListAction;
use Source\Domain\Dto\Pagination\Request\PaginationDto;
use Source\Infrastructure\Assemblers\Exceptions\AssemblerException;

readonly class HomePage extends BasePage implements HomePageInterface
{
    public function __construct(private ProductGetListAction $productGetListAction)
    {
    }

    /**
     * @param  mixed  $request
     * @return Factory|View|Application
     */
    public function render(Request $request): Factory|View|Application
    {
        $perPage = config('site.home.pagination.products_per_page', 20);
        $page = $request->get('page', 1);
        $perPage = $request->get('page', $perPage);

        $productsListDto = $this->productGetListAction->handle(
            new PaginationDto($page, $perPage)
        );

        return view('home', [
            'products' => $productsListDto->items,
            'pagination' => $productsListDto->paginationDto
        ]);
    }
}
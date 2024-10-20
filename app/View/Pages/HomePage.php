<?php

namespace App\View\Pages;

use App\View\Pages\Contracts\BasePage;
use App\View\Pages\Contracts\HomePageInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Src\Domain\Actions\Product\ProductGetListAction;
use Src\Infrastructure\Assemblers\Exceptions\AssemblerException;

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
        $page = $request->get('page', 1);
        $perPage = $request->get('page', 50);

        return view('home', [
            'products' => $this->productGetListAction->handle($page, $perPage)
        ]);
    }
}
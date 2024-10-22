<?php

namespace App\View\Pages;

use App\View\Pages\Contracts\BasePage;
use App\View\Pages\Contracts\BasketPageInterface;
use Illuminate\Contracts\View\View;
use Source\Domain\Actions\Basket\Contracts\BasketGetPositionsActionInterface;

readonly class BasketPage extends BasePage implements BasketPageInterface
{
    public function __construct(BasketGetPositionsActionInterface $basketGetListAction)
    {
    }

    public function render(): View
    {
        return view('basket', [
//            'positions' => $basketGetListAction,
        ]);
    }
}
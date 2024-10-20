<?php

namespace App\View\Pages;

use App\View\Pages\Contracts\BasePage;
use App\View\Pages\Contracts\BasketPageInterface;
use Illuminate\Contracts\View\View;

readonly class BasketPage extends BasePage implements BasketPageInterface
{
    public function render(): View
    {
        return view('basket');
    }
}
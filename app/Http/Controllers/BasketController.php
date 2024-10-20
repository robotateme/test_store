<?php

namespace App\Http\Controllers;

use App\View\Pages\Contracts\BasketPageInterface;
use Illuminate\Contracts\View\View;

class BasketController extends Controller
{
    public function index(BasketPageInterface $basketPage): View
    {
        return $basketPage->render();
    }

    public function store()
    {

    }
}

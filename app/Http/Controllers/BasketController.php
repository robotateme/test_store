<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketAddRequest;
use App\View\Pages\Contracts\BasketPageInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Source\Domain\Actions\Basket\Contracts\BasketAddProductActionInterface;
use Source\Domain\Dto\Basket\Request\BasketAddProductDto;

class BasketController extends Controller
{
    public function index(Request $request, BasketPageInterface $basketPage): View
    {
        $sessionId = $request->cookie('laravel_session');
        $userId = Auth::id();
        return $basketPage->render($sessionId, $userId);
    }

    public function store(BasketAddRequest $request, BasketAddProductActionInterface $action): RedirectResponse
    {
        $action->handle(new BasketAddProductDto(
            $request->product_id,
            $request->quantity,
            $request->user_id,
            $request->cookie('laravel_session')
        ));

        return back()->with('basket.success', "Product added to cart!");
    }

    public function removePosition()
    {

    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketAddRequest;
use App\View\Pages\Contracts\BasketPageInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Source\Domain\Actions\Basket\BasketRemovePositionAction;
use Source\Domain\Actions\Basket\Contracts\BasketAddProductActionInterface;
use Source\Domain\Actions\Exceptions\ActionException;
use Source\Domain\Dto\Basket\Request\BasketAddProductDto;
use Symfony\Component\HttpFoundation\Response;

class BasketController extends Controller
{
    /**
     * @param  Request  $request
     * @param  BasketPageInterface  $basketPage
     * @return View|RedirectResponse
     */
    public function index(Request $request, BasketPageInterface $basketPage): View|RedirectResponse
    {
        $sessionId = $request->cookie('laravel_session');
        $userId = Auth::id();
        if(is_null($sessionId)) {
            return back();
        }

        return $basketPage->render($sessionId, $userId);
    }

    /**
     * @param  BasketAddRequest  $request
     * @param  BasketAddProductActionInterface  $action
     * @return RedirectResponse
     */
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

    /**
     * @param  Request  $request
     * @param  BasketRemovePositionAction  $action
     * @return JsonResponse
     */
    public function removePosition(Request $request, BasketRemovePositionAction $action): JsonResponse
    {
        $sessionId = $request->cookie('laravel_session');
        $userId = Auth::id();

        try {
            $action->handle($request->input('id'), $sessionId, $userId);
            return response()->json(['session' => $sessionId, 'user' => $userId, $request->input('id')]);
        } catch (ActionException $e) {
            abort(Response::HTTP_BAD_REQUEST, $e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Source\Domain\Actions\Exceptions\ActionException;
use Source\Domain\Actions\Order\Input\OrderCreateAction;
use Source\Infrastructure\Assemblers\Exceptions\AssemblerException;

class OrderController extends Controller
{
    /**
     * @param  Request  $request
     * @param  OrderCreateAction  $orderCreateAction
     * @return RedirectResponse
     * @throws ActionException
     */
    public function store(Request $request, OrderCreateAction $orderCreateAction): RedirectResponse
    {
        try {
            $result = $orderCreateAction->handle(Auth::id(), $request->cookie('laravel_session'));
        } catch (AssemblerException $e) {
        }
        return redirect()->route('account.orders');
    }
}
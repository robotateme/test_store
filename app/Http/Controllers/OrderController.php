<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Source\Domain\Actions\Order\Input\OrderCreateAction;
use Source\Infrastructure\Assemblers\Exceptions\AssemblerException;

class OrderController extends Controller
{
    /**
     * @param  Request  $request
     * @param  OrderCreateAction  $orderCreateAction
     * @return RedirectResponse
     */
    public function store(Request $request, OrderCreateAction $orderCreateAction): RedirectResponse
    {
        try {
            $result = $orderCreateAction->handle(Auth::id(), null);
        } catch (AssemblerException $e) {
        }
        return back();
    }
}
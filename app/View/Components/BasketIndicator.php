<?php

namespace App\View\Components;

use Auth;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Source\Domain\Actions\Basket\Contracts\BasketGetPositionsActionInterface;

class BasketIndicator extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(private readonly BasketGetPositionsActionInterface $getPositionsAction)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {   $userId = Auth::id();
        $sessionId = request()->cookie('laravel_session');
        $dto = $this->getPositionsAction->handle($sessionId, $userId);
        return view('components.basket-indicator', [
            'totalQuantity' => $dto->totalQuantity,
        ]);
    }
}

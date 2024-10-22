<?php

namespace App\View\Pages;

use App\View\Pages\Contracts\BasePage;
use App\View\Pages\Contracts\BasketPageInterface;
use Illuminate\Contracts\View\View;
use Source\Domain\Actions\Basket\Contracts\BasketGetPositionsActionInterface;

readonly class BasketPage extends BasePage implements BasketPageInterface
{
    public function __construct(private BasketGetPositionsActionInterface $basketGetPositionsAction)
    {
    }

    public function render(string $sessionId, int $userId = null): View
    {
        $positions = $this->basketGetPositionsAction->handle($sessionId, $userId);
        return view('basket', [
            'positions' => $positions,
        ]);
    }
}
<?php

namespace App\View\Pages\Profile;

use App\View\Pages\Contracts\BasePage;
use App\View\Pages\Contracts\ProfileOrdersPageInterface;
use Illuminate\Http\Request;
use RuntimeException;

readonly class OrdersPage extends BasePage implements ProfileOrdersPageInterface
{
    public function __construct()
    {
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function render(Request $request)
    {
        throw new RuntimeException('Unimplemented');
    }
}
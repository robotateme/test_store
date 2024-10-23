<?php

namespace App\View\Pages\Contracts;

use Illuminate\Http\Request;

abstract readonly class BasePage implements PageInterface
{
    abstract public function render(Request $request);
}
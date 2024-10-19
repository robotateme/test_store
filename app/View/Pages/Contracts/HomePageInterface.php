<?php

namespace App\View\Pages\Contracts;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

interface HomePageInterface extends PageInterface
{
    public function render(Request $request): Factory|View|Application;
}
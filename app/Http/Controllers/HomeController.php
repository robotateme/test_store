<?php

namespace App\Http\Controllers;

use App\View\Pages\Contracts\HomePageInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @param  Request  $request
     * @param  HomePageInterface  $homePage
     * @return View
     */
    public function index(Request $request, HomePageInterface $homePage): View
    {
        return $homePage->render($request);
    }
}
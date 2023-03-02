<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facades\BannerFacade;

class HomeController extends Controller
{
    public function index() {
        $responce['posts'] = BannerFacade::allActive();
        return view('pages.home.index')->with($responce);
    }
}

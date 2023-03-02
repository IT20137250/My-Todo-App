<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facades\BannerFacade;

class BannerController extends ParentController
{
    public function index() {
        $responce['posts'] = BannerFacade::all();
        return view('pages.Banner.index')->with($responce);
    }

    public function store(Request $request) {
        BannerFacade::store($request->all());
        return redirect()->back();
    }

    public function delete($post_id) {
        BannerFacade::delete($post_id);
        return redirect()->back();
    }

    public function status($post_id) {
        BannerFacade::status($post_id);
        return redirect()->back();
    }
}

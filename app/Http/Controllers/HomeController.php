<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Settings $settings, Request $request)
    {
        if( $settings->get('splash_enabled' ) === "on" ) {
            return view('home.splash');
        } else {
            return view('home.home');
        }
    }

}

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
            $path = public_path('images/squares');
            $files = File::allFiles($path);
            $filenames = array();
            for($x = 0; $x < 9; $x++) {
                shuffle($files);
                $file = array_pop($files);
                array_push($filenames, $file->getFilename());
            }
            if($request->cookie('already-visited') !== 'true' || $request->rewatch === 'true') {
                return response(view('home.splash-movie', compact('filenames')))->cookie('already-visited', 'true', time()+31556926);
            } else {
                return view('home.splash', compact('filenames'));
            }
        } else {
            return view('home.home');
        }
    }

}

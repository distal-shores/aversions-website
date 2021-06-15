<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class SplashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request, Settings $settings)
    {
        $settings->put('splash_enabled', $request->splash_enabled);
    
        return redirect()->back()->with(['notice' => 'Settings updated']);
    }
}


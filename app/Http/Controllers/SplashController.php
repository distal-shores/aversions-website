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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        $splashEnabled = $settings->get('splash_enabled');
        return view('dashboard.modules.splash_enable.edit', compact('splashEnabled'));
    }

    public function update(Request $request, Settings $settings)
    {
        $settings->put('splash_enabled', $request->splash_enabled);
    
        return redirect()->back()->with(['notice' => 'Settings updated']);
    }
}


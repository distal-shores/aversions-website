<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class SettingsController extends Controller
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
        $epkHeaderImg = $settings->get('epk_header_img');
        $epkBgColour = $settings->get('epk_bg_colour');
        return view('dashboard.modules.settings.edit', compact('splashEnabled', 'epkHeaderImg', 'epkBgColour'));
    }

    public function update(Request $request, Settings $settings)
    {
        if($request->file('epk_header_img') != null) {
            $file = $request->file('epk_header_img');
            $originalFileName = $file->getClientOriginalName();
            $file->storeAs('epk_headers', $originalFileName);
            $settings->put('epk_header_img', $originalFileName);
        }
        $settings->put('splash_enabled', $request->splash_enabled);
        $settings->put('epk_bg_colour', $request->epk_bg_colour);
    
        return redirect()->back()->with(['notice' => 'Settings updated']);
    }
}


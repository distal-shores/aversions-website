<?php

namespace App\Http\Controllers;

use App\Band;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class BandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = Band::orderBy('name')->get();

        return view('bands.index', compact("bands"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countriesCollection = new Countries();
        $countries = $countriesCollection->sortBy('name.common')->all();

        return view('bands.create', compact("countries"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestParams = array(
            'name' => $request->band_name,
            'email' => $request->band_email,
            'city' => $request->band_city,
            'country' => $request->band_country,
            'website_url' => $request->band_url
        );

        $band = Band::firstOrCreate(
            ['name' => $request->band_name],
            $requestParams
        );

        if($band->wasRecentlyCreated) {
            return redirect()->action('BandsController@index')->with(['status' => 'Band created!', 'message_type' => 'success']);
        } else {
            return redirect()->action('BandsController@index')->with(['status' => 'Band already exists!', 'message_type' => 'warning']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Band  $band
     * @return \Illuminate\Http\Response
     */
    public function show(Band $band)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Band  $band
     * @return \Illuminate\Http\Response
     */
    public function edit(Band $band)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Band  $band
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Band $band)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Band  $band
     * @return \Illuminate\Http\Response
     */
    public function destroy(Band $band)
    {
        $band->delete();
        return redirect()->action('BandsController@index')->with(['status' => 'Band removed!', 'message_type' => 'warning']);
    }
}

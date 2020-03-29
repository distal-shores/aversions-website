<?php

namespace App\Http\Controllers;

use App\Band;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class BandsController extends Controller
{

    private $countriesCollection;
    private $countries;

    public function __construct()
    {
        $this->middleware('auth');
        $this->countriesCollection = new Countries();
        $this->countries = $this->countriesCollection->sortBy('name.common')->all();
        $this->rules = array(
            'name' => 'required',
            'email' => 'email|nullable',
            'city' => 'required',
            'country' => 'required',
            'website_url' => 'url|nullable'
        )
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = Band::orderBy('name')->get();

        return view('dashboard.modules.bands.index', compact("bands"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.modules.bands.create')->with('countries', $this->countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

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
        $countries = $this->countries;
        return view('dashboard.modules.bands.edit', compact(["band", "countries"]));
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
        $this->validate($request, $this->rules);
        
        $band->name = $request->band_name;
        $band->email = $request->band_email;
        $band->city = $request->band_city;
        $band->country = $request->band_country;
        $band->website_url = $request->band_url;

        $band->save();

        return redirect()->action('BandsController@index')->with(['status' => 'Band "' . $band->name . '" updated!', 'message_type' => 'success']);
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

<?php

namespace App\Http\Controllers;

use App\Venue;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class VenuesController extends Controller
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
            'email' => 'required|email',
            'city' => 'required',
            'country' => 'required',
            'website_url' => 'nullable|url',
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::orderBy('name')->get();

        return view('dashboard.modules.venues.index', compact("venues"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.modules.venues.create')->with('countries', $this->countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $rules);

        $requestParams = array(
            'name' => $request->name,
            'main_contact' => $request->main_contact,
            'city' => $request->city,
            'country' => $request->country,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'website_url' => $request->website_url,
        );

        $venue = Event::firstOrCreate(
            [ 'name' => $request->name, 'city' => $request->city],
            $requestParams
        );

        if($venue->wasRecentlyCreated) {
            return redirect()->action('VenuesController@index')->with(['status' => 'Venue created!', 'message_type' => 'success']);
        } else {
            return redirect()->action('VenuesController@index')->with(['status' => 'Venue already exists!', 'message_type' => 'warning']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        $countries = $this->countries;
        return view('dashboard.modules.venues.edit', compact(["venue", "countries"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        $this->validate($request, $this->rules);
        
        $venue->name = $request->venue_name;
        $venue->main_contact = $request->venue_contact;
        $venue->email = $request->venue_email;
        $venue->city = $request->venue_city;
        $venue->country = $request->venue_country;
        $venue->website_url = $request->venue_url;

        $venue->save();

        return redirect()->action('VenuesController@index')->with(['status' => 'Venue "' . $venue->name . '" updated!', 'message_type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();
        return redirect()->action('VenuesController@index')->with(['status' => 'Venue removed!', 'message_type' => 'warning']);
    }
}

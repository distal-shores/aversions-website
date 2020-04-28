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
            'address' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
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
        $this->validate($request, $this->rules);

        $requestParams = array(
            'name' => $request->name,
            'main_contact' => $request->main_contact,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'country' => $request->country,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'website_url' => $request->website_url,
        );

        $venue = Venue::firstOrCreate(
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

        $venue->name = $request->name;
        $venue->main_contact = $request->main_contact;
        $venue->email = $request->email;
        $venue->address = $request->address;
        $venue->state = $request->state;
        $venue->postal_code = $request->postal_code;
        $venue->city = $request->city;
        $venue->country = $request->country;
        $venue->website_url = $request->website_url;

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

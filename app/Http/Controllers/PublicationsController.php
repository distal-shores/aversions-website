<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;


class PublicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->countriesCollection = new Countries();
        $this->countries = $this->countriesCollection->sortBy('name.common')->all();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pubs = Publication::orderBy('name')->get();
        return view('dashboard.modules.publications.index', compact('pubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.modules.publications.create')->with('countries', $this->countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'requied|email',
            'url' => 'required|url',
        );

        $this->validate($request, $rules);

        if($request->print_only === null) {
            $request->print_only = 0;
        }

        $requestParams = array(
            'name' => $request->name,
            'contact_name' => $request->contact_name,
            'email' => $request->email,
            'city' => $request->city,
            'country' => $request->country,
            'url' => $request->url,
            'print_only' => $request->print_only,
        );

        $publication = Publication::firstOrCreate(
            ['name' => $request->name],
            $requestParams
        );

        if($publication->wasRecentlyCreated) {
            return redirect()->action('PublicationsController@index')->with(['status' => 'Publication created!', 'message_type' => 'success']);
        } else {
            return redirect()->action('PublicationsController@index')->with(['status' => 'Publication already exists!', 'message_type' => 'warning']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        $countries = $this->countries;
        return view('dashboard.modules.publications.edit', compact(["publication", "countries"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'url' => 'required|url',
        );

        $this->validate($request, $rules);

        // if($request->print_only === null) {
        //     $request->boolean('print_only') = false;
        // }

        $publication->name = $request->name;
        $publication->email = $request->email;
        $publication->city = $request->city;
        $publication->country = $request->country;
        $publication->url = $request->url;
        $publication->contact_name = $request->contact_name;
        $publication->print_only = $request->boolean('print_only');

        $publication->save();

        return redirect()->action('PublicationsController@index')->with(['status' => 'Publication "' . $publication->name . '" updated!', 'message_type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return redirect()->action('PublicationsController@index')->with(['status' => 'Publication removed!', 'message_type' => 'warning']);
    }
}

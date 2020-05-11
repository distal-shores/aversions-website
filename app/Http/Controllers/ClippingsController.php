<?php

namespace App\Http\Controllers;

use App\Clipping;
use App\Publication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClippingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->rules = array(
            'title' => 'required',
            'publication_id' => 'required',
            'url' => 'required|url',
            'pullquote' => 'required',
            'date' => 'required|date'
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clippings = Clipping::orderBy('publish_date')->get();
        return view('dashboard.modules.clippings.index', compact('clippings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publications = Publication::orderBy('name')->get();

        return view('dashboard.modules.clippings.create', compact('publications'));
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
            'title' => $request->title,
            'publication_id' => $request->publication_id,
            'url' => $request->url,
            'pullquote' => $request->pullquote,
            'publish_date' => Carbon::createFromDate($request->date)
        );

        $clipping = Clipping::firstOrCreate(
            ['title' => $request->title],
            $requestParams
        );

        if($clipping->wasRecentlyCreated) {
            return redirect()->action('ClippingsController@index')->with(['status' => 'Clipping created!', 'message_type' => 'success']);
        } else {
            return redirect()->action('ClippingsController@index')->with(['status' => 'Clipping already exists!', 'message_type' => 'warning']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clipping  $clipping
     * @return \Illuminate\Http\Response
     */
    public function show(Clipping $clipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clipping  $clipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Clipping $clipping)
    {
        $publications = Publication::all();

        return view('dashboard.modules.clippings.edit', compact(["publications", "clipping"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clipping  $clipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clipping $clipping)
    {
        $this->validate($request, $this->rules);

        $clipping->title = $request->title;
        $clipping->publication_id = $request->publication_id;
        $clipping->url = $request->url;
        $clipping->pullquote = $request->pullquote;
        $clipping->publish_date = Carbon::createFromDate($request->date);

        $clipping->save();

        return redirect()->action('ClippingsController@index')->with(['status' => 'Clipping ' . $clipping->title . ' updated!', 'message_type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clipping  $clipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clipping $clipping)
    {
        $clipping->delete();
        return redirect()->action('ClippingsController@index')->with(['status' => 'Clipping removed!', 'message_type' => 'warning']);
    }

    /**
     * Adds or removes the Clipping from the homepage quote carousel
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JSON
     */
    public function inCarousel(Request $request) {
        $clipping = Clipping::find($request->id);
        if($request->in_carousel == 'true') {
            $clipping->in_carousel = 1;
        } else {
            $clipping->in_carousel = 0;
        }
        $clipping->save();

        return response()->json();
    }
}

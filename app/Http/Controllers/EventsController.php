<?php

namespace App\Http\Controllers;

use Storage;
use App\Band;
use App\Event;
use App\Venue;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->rules = array(
            'name' => 'required',
            'event_venue' => 'required|integer',
            'ticket_url' => 'nullable|url',
            'event_url' => 'nullable|url',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'ticket_price' => 'required|numeric',
            'event_poster' => 'nullable|mimes:jpeg,png,bmp,tiff|max:4096',
        );
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('date')->get();

        return view('dashboard.modules.events.index', compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venues = Venue::orderBy('name')->get();
        $bands = $this->getAllNonAversionsBands();

        return view('dashboard.modules.events.create', compact(["venues","bands"]));
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
        
        // Save the event poster in public storage
        if($request->file('event_poster') != null) {
            $file = $request->file('event_poster');
            $originalFileName = $file->getClientOriginalName();
            $file->storeAs('posters', $originalFileName);
        }

        $requestParams = array(
            'name' => $request->name,
            'venue_id' => $request->event_venue,
            'ticket_url' => $request->ticket_url,
            'event_url' => $request->event_url,
            'date' => Carbon::createFromDate($request->date),
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'ticket_price' => $request->ticket_price,
            'event_poster' => isset($originalFileName) ? $originalFileName : null
        );


        $event = Event::firstOrCreate(
            [ 'name' => $request->name, 'date' => Carbon::createFromDate($request->date)],
            $requestParams
        );

        if($request->event_bands != null) {
            $bands = $request->event_bands;
            foreach($bands as $band) {
                $event->bands()->attach(Band::find($band));
            }
        }

        if($event->wasRecentlyCreated) {
            return redirect()->action('EventsController@index')->with(['status' => 'Event created!', 'message_type' => 'success']);
        } else {
            return redirect()->action('EventsController@index')->with(['status' => 'Event already exists!', 'message_type' => 'warning']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $venues = Venue::all();
        $eventVenue = $event->venue()->first();
        $bands = $this->getAllNonAversionsBands();

        return view('dashboard.modules.events.edit', compact(["event", "venues", "eventVenue", "bands"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $this->validate($request, $this->rules);
        
        if($request->event_bands != null) {
            $bands = $request->event_bands;
            $event->bands()->detach();
            $event->bands()->attach($bands);
        }

        $event->name = $request->name;
        $event->venue_id = $request->event_venue;
        $event->ticket_url = $request->ticket_url;
        $event->event_url = $request->event_url;
        $event->date = Carbon::createFromDate($request->date);
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->ticket_price = $request->ticket_price;

        if($request->file('event_poster') != null) {
            $file = $request->file('event_poster');
            $originalFileName = $file->getClientOriginalName();
            if(!Storage::exists('posters/'.$originalFileName)) {
                $file->storeAs('posters', $originalFileName);
            }
            $event->event_poster = $originalFileName;
        }

        $event->save();

        return redirect()->action('EventsController@index')->with(['status' => 'Event ' . $event->name . ' updated!', 'message_type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->action('EventsController@index')->with(['status' => 'Event removed!', 'message_type' => 'warning']);
    }

    /**
     * Get all bands that aren't Aversions
     *
     * @return Eloquent Collection
     */
    private function getAllNonAversionsBands()
    {
        $bands = Band::orderBy('name')->get();
        $bands = $bands->reject(function ($value, $key) {
            return $value->name === 'Aversions';
        });
        return $bands->all();
    }
}

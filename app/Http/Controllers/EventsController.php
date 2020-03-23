<?php

namespace App\Http\Controllers;

use App\Band;
use App\Event;
use App\Venue;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('date')->get();

        return view('events.index', compact("events"));
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

        return view('events.create', compact(["venues","bands"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->event_bands != null) {
            $bands = $request->event_bands;
        }

        $requestParams = array(
            'name' => $request->name,
            'venue_id' => $request->event_venue,
            'ticket_url' => $request->ticket_url,
            'event_url' => $request->event_url,
            'date' => Carbon::createFromDate($request->event_date),
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'ticket_price' => $request->ticket_price,
        );

        $event = Event::firstOrCreate(
            [ 'name' => $request->name, 'date' => Carbon::createFromDate($request->event_date)],
            $requestParams
        );

        if($bands) {
            foreach($bands as $band) {
                $event->bands()->save(Band::find($band));  
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
        $bands = Band::all();
        $eventBands = $event->bands()->get();

        return view('events.edit', compact(["event", "venues", "eventVenue", "bands", "eventBands"]));
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
        if($request->event_bands != null) {
            $bands = $request->event_bands;
            $event->bands()->detach();
            $event->bands()->attach($bands);
        }

        $event->name = $request->name;
        $event->venue_id = $request->event_venue;
        $event->ticket_url = $request->ticket_url;
        $event->event_url = $request->event_url;
        $event->date = Carbon::createFromDate($request->event_date);
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->ticket_price = $request->ticket_price;

        $event->save();

        return redirect()->action('EventsController@index')->with(['status' => 'Event updated!', 'message_type' => 'success']);
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

<?php

namespace App\Http\View\Composers;

use App\Event;
use Illuminate\View\View;
use Carbon\Carbon;

class ShowListComposer
{
    /**
     * The events implementation.
     *
     * @var Event
     */
    protected $events;
    protected $pastEvents;
    protected $futureEvents;

    /**
     * Create a new profile composer.
     *
     * @param  Event $event
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->events = Event::all();
        $this->pastEvents = $this->events->where('date', '<', Carbon::today());
        $this->futureEvents = $this->events->where('date', '>=', Carbon::today());
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('pastEvents', $this->pastEvents)->with('futureEvents', $this->futureEvents);
    }
}
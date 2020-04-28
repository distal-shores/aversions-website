<?php

namespace App\Http\View\Composers;

use App\Event;
use Illuminate\View\View;

class ShowListComposer
{
    /**
     * The events implementation.
     *
     * @var Event
     */
    protected $events;

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
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('events', $this->events);
    }
}
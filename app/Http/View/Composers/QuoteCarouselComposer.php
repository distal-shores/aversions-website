<?php

namespace App\Http\View\Composers;

use App\Clipping;
use Illuminate\View\View;

class QuoteCarouselComposer
{
    /**
     * The quotes implementation.
     *
     * @var Event
     */
    protected $quotes;

    /**
     * Create a new profile composer.
     *
     * @param  Clipping $clipping
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->quotes = Clipping::where('in_carousel', 1)->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('quotes', $this->quotes);
    }
}
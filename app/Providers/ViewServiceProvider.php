<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'home.partials.show_list', 'App\Http\View\Composers\ShowListComposer'
        );
        View::composer(
            'home.partials.quote_carousel', 'App\Http\View\Composers\QuoteCarouselComposer'
        );
    }
}
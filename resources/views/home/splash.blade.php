@extends('layouts.app')

@section('content')
    <div class="splash-container">
        <div class="title-bar">
            <h1>Aversions</h1>
            <h2>ON/QC Tour 2022</h2>
        </div>
        <div class="tour-logo">
            <img src="{{ asset('images/tour_logo.jpg') }}" alt="Image of hands three hands holding lightbulbs" />
        </div>
        <div class="grid">
            <div class="date">Apr 29</div>
            <div class="city">Quebec City</div>
            <div class="venue">Scanner Bistro</div>
            <div class="ticket-link"><a href=""></a></div>
            {{--  --}}
            <div class="date">Apr 30</div>
            <div class="city">Montreal</div>
            <div class="venue">Diving Bell</div>
            <div class="ticket-link"><a href=""></a></div>
            {{--  --}}
            <div class="date">May 1</div>
            <div class="city">Ottawa</div>
            <div class="venue">Dominion Tavern</div>
            <div class="ticket-link"><a href="https://www.ticketweb.ca/event/deliverables-aversions-growing-fires-dominion-tavern-tickets/11934355?pl=spectrasonic&refid=AVE">Tickets</a></div>
            {{--  --}}
            <div class="date">May 3</div>
            <div class="city">Kingston</div>
            <div class="venue">Daft Brewing</div>
            <div class="ticket-link"><a href=""></a></div>
            {{--  --}}
            <div class="date">May 4</div>
            <div class="city">Oshawa</div>
            <div class="venue">The Atria</div>
            <div class="ticket-link"><a href="https://www.eventbrite.ca/manage/events/305925851457/basicinfo">Tickets</a></div>
            {{--  --}}
            <div class="date">May 5</div>
            <div class="city">Guelph</div>
            <div class="venue">Red Brick</div>
            <div class="ticket-link"><a href=""></a></div>
            {{--  --}}
            <div class="date">May 6</div>
            <div class="city">Toronto</div>
            <div class="venue">Monarch Tavern</div>
            <div class="ticket-link"><a href="https://www.showclix.com/event/gentle-aversions-panic-bodies-some-exercise">Tickets</a></div>
            {{--  --}}
            <div class="date">May 7</div>
            <div class="city">London</div>
            <div class="venue">Palasad</div>
            <div class="ticket-link"><a href="https://www.facebook.com/events/241119534806572">Event Page</a></div>
            {{--  --}}
            <div class="date">May 8</div>
            <div class="city">Hamilton</div>
            <div class="venue">Mills Hardware</div>
            <div class="ticket-link"><a href="https://www.eventbrite.ca/e/aversions-tickets-301626481927?aff=on">Tickets</a></div>
            {{--  --}}
            <div class="date">May 9</div>
            <div class="city">Niagara</div>
            <div class="venue">Camp Cataract</div>
            <div class="ticket-link"><a href=""></a></div>
            {{--  --}}
            <div class="date">May 10</div>
            <div class="city">Barrie</div>
            <div class="venue">The Queens</div>
            <div class="ticket-link"><a href=""></a></div>
            {{--  --}}
            <div class="date">May 12</div>
            <div class="city">Sherbrooke</div>
            <div class="venue">Le Murdoch</div>
            <div class="ticket-link"><a href="https://www.facebook.com/events/247577190807027">Event Page</a></div>
        </div>
        <div class="latest-release">
            <h3>Latest release:</h3>
            <a href="https://aversionsband.bandcamp.com" alt="Link to Aversions' Bandcamp page">
                <img src="{{ asset('images/slt_cover_minimized.jpg') }}" alt="Cover art of Aversions' 2nd EP Sharp Left Turns" />
            </a>
        </div>
    </div>
@endsection

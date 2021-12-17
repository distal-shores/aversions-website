@extends('layouts.app')

@section('content')
    <div class="splash-container" style="background-color:black;">

        <div id="face" class="invert"></div>

        <div id="title">
            <h1>Aversions</h1>
        </div>

        <div id="square-grid">
            <div class="grid">
                @foreach($filenames as $filename)
                    <img src="{{ asset('images/squares/'.$filename) }}">
                @endforeach
            </div>
        </div>

        <div id="video">
            <video loop muted autoplay>
                <source src="{{ asset('videos/fll_clip.mp4') }}" type="video/mp4">
            </video> 
        </div>

        <div id="single-copy">
            @include('home.partials.splash_menus_mobile')
            @include('home.partials.splash_menus')
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/js/splash.js"></script>
    @push('scripts')
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '583442679711771'); 
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" 
        src="https://www.facebook.com/tr?id=583442679711771&ev=PageView
        &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
@endpush
@endpush
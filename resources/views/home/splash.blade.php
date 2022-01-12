@extends('layouts.app')

@section('content')
    <div class="splash-container">
        <video autoplay muted loop id="bg_vid">
            <source src="{{ asset('videos/slt_bg_filtered.mp4') }}" type="video/mp4">
        </video>
        <h1>Aversions</h1>
        <h2><span>"</span>Sharp Left Turns<span>"</span></h2>
        <h3>Out Now</h3>
        <div class="logos-container">
            <a href="https://www.youtube.com/watch?v=uJ2ePOxSo18"><img src="{{ asset('images/youtube.svg') }}"></a>
            <a href="https://aversionsband.bandcamp.com"><img src="{{ asset('images/bandcamp.svg') }}"></a>
        </div>
    </div>
@endsection

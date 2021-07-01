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
@endpush
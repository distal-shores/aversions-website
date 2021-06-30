@extends('layouts.app')

@section('content')
    <div class="splash-container">
        <div id="single-copy" style="display:flex">
            @include('home.partials.splash_menus_mobile')
            @include('home.partials.splash_menus')
            <a class="replay-link" href="/?rewatch=true">Replay Intro</a>
        </div>
    </div>
@endsection
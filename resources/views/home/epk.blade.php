@extends('layouts.app')

@section('content')
    <div class="epk-container" style="background-color:#{{ settings('epk_bg_colour') }}">
        <div class="epk-wrapper">
            <div class="row no-gutters epk-header">
                <img src="{{ asset('storage/epk_headers/' . settings('epk_header_img')) }}">
            </div>
            <div class="row no-gutters epk-content">
                <div class="row no-gutters song-name">
                    <div class="col-sm-12">
                        <h1>{{ $song->name }}</h1>
                    </div>
                    <div class="col-sm-12">
                        <span>Release date: {{ $song->release_date }}</span>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-sm-12 col-md-8 left-content">
                        <div class="row no-gutters" style="width:100%;">
                            <iframe width="100%" height="125" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/{{ $song->soundcloud_param }}&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=false&visual=false">
                            </iframe>
                        </div>
                        <div class="row no-gutters song-copy">
                            <div class="col-sm-12">
                                <h3>About</h3>
                            </div>
                            <div class="col-sm-12">
                                <p>{!! $song->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 right-content">
                        <img src="{{ asset('storage/song_covers/' . $song->cover_art) }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row no-gutters">
        @include('home.partials.footer')
    </div>
@endsection

@push('robots')
    <meta name="robots" content="nofollow"/>
@endpush
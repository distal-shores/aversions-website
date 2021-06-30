@extends('layouts.app')

@section('content')
    <div class="epk-container" style="background-color:#{{ settings('epk_bg_colour') }}">
        <div class="epk-wrapper">
            <div class="row no-gutters epk-header">
                <img src="{{ asset('storage/epk_headers/' . settings('epk_header_img')) }}">
            </div>
            <div class="epk-content">
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
                        <div class="row no-gutters song-copy" style="margin-bottom: 0;">
                            <div class="col-sm-12">
                                <h3>About the song </h3>
                                <p>{!! $song->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 right-content">
                        <img src="{{ asset('storage/song_covers/' . $song->cover_art) }}">
                    </div>
                </div>
                @if(isset($song->mp3) || isset($song->wav)) 
                    <div class="row justify-content-end" style="margin-bottom: 2rem;">
                        <div class="col-6 col-lg-auto mp3 text-center">
                            <a class="download-button" style="color:#{{ settings('epk_bg_colour') }};" href={{ asset('mp3s/'.$song->mp3) }} download>Download MP3</a>
                        </div>
                        <div class="col-6 col-lg-auto wav text-center">
                            <a class="download-button" style="color:#{{ settings('epk_bg_colour') }};" href={{ asset('wavs/'.$song->wav) }}>Download WAV</a>
                        </div>
                    </div>
                @endif
                @if(isset($song->youtube_slug))
                    <div class="row no-gutters" style="margin-bottom: 2rem;">
                        <div class="col-sm-12 video">
                            <iframe width="560" height="349" src="https://www.youtube.com/embed/{{ $song->youtube_slug }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                @endif
                <div class="row no-gutters">
                    <div class="col-sm-12 col-md-4 mb-4 mb-md-0 left-content band-photo">
                        <img src="{{ asset('images/band_photo.jpg') }}">
                    </div>
                    <div class="col-sm-12 col-md-8 right-content">
                        <div class="row no-gutters song-copy">
                            <div class="col-sm-12 pl-md-4">
                                <h3>About the band</h3>
                                <p>A quixotic mix of American post-punk and '80s post-hardcore, Aversions are modest East Vancouver work-a-days trying to live the axiom of art interlacing life. Muscular riffing, left-turn basslines and sledgehammer drumming provide the substrate for vocalist Sam Coll's acidic takes on topics big and small, as the band alternately exalt and disparage the many contradictions of their hometown.</p>
                            </div>
                        </div>
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
    <meta name="robots" content="noindex, nofollow"/>
@endpush
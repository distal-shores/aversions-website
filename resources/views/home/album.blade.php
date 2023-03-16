@extends('layouts.app')

@section('content')
    <div class="epk-container" style="background-color:#{{ settings('epk_bg_colour') }}">
        <div class="epk-wrapper">
            <div class="row no-gutters epk-header">
                <img src="{{ Storage::disk('s3')->url('epk_headers/' . settings('epk_header_img')) }}">
            </div>
            <div class="epk-content">
                <div class="row no-gutters song-name">
                    <div class="col-sm-12">
                        <h1>You Wanted the Bike</h1>
                    </div>
                    <div class="col-sm-12">
                        <span>Release date: April 28, 2023</span>
                    </div>
                </div>
                <div class="row no-gutters mb-4">
                    <div class="col text-justify left-content md-pr-2">
                        <h3>About the album</h3>
                        <img class="d-none d-md-inline" style="width:40%;float:right;margin-left:2em;margin-bottom:1em;" src="{{ Storage::disk('s3')->url('album_covers/album_cover_front.jpg') }}">
                        <p><em>You Wanted the Bike</em>, Aversions' third release and first LP, captures the latter batch of songs written and recorded during the pandemic, the first collection being 2022's <a href="https://aversionsband.bandcamp.com/album/sharp-left-turns"><em>Sharp Left Turns</em></a> EP.</p>
                        <p>While the ghost of the pandemic can be sensed around the edges of these songs, they are more concerned with broader trends that started before and continue past COVID-19: identity politics as a facet of self-annihilation (Undecider); the widening of consumer culture into something explicitly militant (New Whip); the struggle to remain relevant even within one's own autobiography (Sunset Breakout).</p>
                        <p>Sonically, the band continues to walk the tightrope between tension-building and all out electric guitar battery. The guitar contributions of Rory Munro, no longer a permanent band member but a key part of the writing and recording of this album, contribute greatly to this chiaroscuro, while guitarist/singer Sam Coll fills in the gaps with sometimes-structured, sometimes-coy augmentation. Chad Devlin's bass parts continue to reinforce while providing delightfully unexpected detours from the rhythmic straight-and-narrow, and the evolution of drummer Joe Ross' palette is on display, adopting wild new patterns while retaining his focused and unfussy approach.</p>
                        <p class="mb-0">As the world shuffles wonkily into the middle of the '20s, with godlike machine of dubious intent threatening to upend, and the old ills of belligent machismo still looming over everything, this latest from Aversions reminds us that the pit-of-the-stomach anxiety of living among humans is a familiar condition unlikely to abate.</p>
                    </div>
                </div>
                <div class="row no-gutters d-md-none" style="margin-bottom: 2rem;">
                    <div class="col">
                        <img src="{{ Storage::disk('s3')->url('album_covers/album_cover_front.jpg') }}">
                    </div>
                </div>
                {{-- @if(isset($song->mp3) || isset($song->wav)) --}}
                    <div class="row no-gutters" style="margin-bottom: 2rem;">
                        {{-- @if(isset($song->mp3)) --}}
                            <div class="col mp3">
                                <a class="download-button d-inline-block" style="background-color:#{{ settings('epk_button_colour') }}; color:#{{ settings('epk_bg_colour') }};" href={{ Storage::disk('s3')->url('album_mp3s/aversions_you_wanted_the_bike.zip') }} download>Download MP3s</a>
                            </div>
                        {{-- @endif --}}
                    </div>
                {{-- @endif --}}
                <div class="row no-gutters justify-content-end">
                    <div class="col">
                        <h3>Track listing</h3>
                        <ol style="padding-left:0;list-style-position:inside;margin-bottom:0;">
                            <li>Mirror Game</li>
                            <li>Undecider</li>
                            <li>An Optimist's Dilemma</li>
                            <li>Hostile Architecture</li>
                            <li>New Whip</li>
                            <li>Lightweight</li>
                            <li>Sunset Breakout</li>
                        </ol>
                    </div>
                </div>
                {{-- @if(isset($song->youtube_slug)) --}}
                    <div class="row no-gutters" style="margin-bottom: 2rem;">
                        <div class="col-sm-12 video">
                            <iframe width="560" height="349" src="https://www.youtube.com/embed/3-XDEDPjBlE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                {{-- @endif --}}
                <div class="row no-gutters">
                    <div class="col-sm-12 col-md-4 mb-4 mb-md-0 left-content band-photo">
                        <img src="{{ asset('images/band_photo.jpg') }}">
                    </div>
                    <div class="col-sm-12 col-md-8 right-content">
                        <div class="row no-gutters song-copy">
                            <div class="col-sm-12 pl-md-4">
                                <h3>About the band</h3>
                                <ul style="list-style:none;padding-left:0;">
                                    <li>Sam Coll: vocals, guitar</li>
                                    <li>Chad Devlin: bass, vocals</li>
                                    <li>Joe Ross: drums</li>
                                </ul>
                                <p>A quixotic mix of American post-punk and '80s post-hardcore, Aversions are modest East Vancouver work-a-days trying to live the axiom of art interlacing life. Muscular riffing, left-turn basslines and sledgehammer drumming provide the substrate for vocalist Sam Coll's acidic takes on topics big and small, as the band alternately exalt and disparage the many contradictions of their hometown.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row no-gutters" id="socials-footer">
        @include('home.partials.footer')
    </div>
@endsection

@push('robots')
    <meta name="robots" content="noindex, nofollow"/>
@endpush
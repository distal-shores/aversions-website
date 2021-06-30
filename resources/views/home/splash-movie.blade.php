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
    <script type="text/javascript" defer>
        $(document).ready(function() {
            var classes = ['invert', 'hue-rotate', 'pink', 'normal'];
            function changeImgDisplayToInline( $img ) {
                $img.css('display', 'inline');
            }
            function displaySquares() {
                var time = 100;
                $('#square-grid .grid img').each(function() {
                    var $that = $(this);
                    setTimeout( function() { 
                        changeImgDisplayToInline( $that ); 
                    }, time);
                    time += 100;
                });
            }
            function removeTitleText() {

                $('.song-title:nth-of-type(1)').remove();
                setTimeout(function() {
                    $('.song-title:nth-of-type(1)').remove();
                }, 600);
                setTimeout(function() {
                    $('#square-grid').remove();
                }, 1200);
            }
            function replaceSquaresWithText() {
                $('#square-grid .grid img').each(function(i) {
                    if(i < 3) {
                        $(this).remove();
                    }
                });
                $('#square-grid .grid').prepend( '<div class="song-title" id="famous"><h1>Famous</h1></p>' );
                setTimeout( function() {
                    $('#square-grid .grid img').each(function(i) {
                        if(i < 3) {
                            $(this).remove();
                        }
                    });
                    $( '<div class="song-title" id="last"><h1>Last</h1></p>' ).insertAfter( '#famous' );
                }, 600);
                setTimeout( function() {
                    $('#square-grid .grid img').each(function(i) {
                        if(i < 3) {
                            $(this).remove();
                        }
                    });
                    $( '<div class="song-title" id="lines"><h1>Lines</h1></p>' ).insertAfter( '#last' );
                }, 1200);
            }
            var int = window.setInterval( function() {
                var randomNum = Math.floor( Math.random() * classes.length );
                $('#face').removeClass();
                $('#face').addClass(classes[randomNum]);
            }, 400);
            setTimeout( function() { 
                $('#face').css('display', 'none');
                $('#title').css('display', 'flex');
                setTimeout( function() {
                    $('#title').css('display', 'none');
                    $('#face').css('display', 'block');
                    $('#title h1').text('New Single');
                    setTimeout( function() {
                        $('#face').css('display', 'none');
                        $('#title').css('display', 'flex');
                        setTimeout( function() {
                            $('#face').css('display', 'block');
                            $('#title').css('display', 'none');
                            setTimeout( function() {
                                $('#face').css('display', 'none');
                                $('#square-grid').css('display', 'flex');
                                displaySquares();
                                setTimeout( function() {
                                    replaceSquaresWithText(); 
                                    setTimeout( function() {
                                        $('#square-grid').addClass('fade-out');
                                        setTimeout( function() {
                                            removeTitleText();
                                            $('#single-copy').css('display', 'flex');
                                            setTimeout( function() {

                                                $('#video').css('opacity', 0);
                                            }, 1200);
                                        }, 1500);
                                    }, 2000);
                                }, 1000);
                            }, 1200);
                        }, 1500);
                    }, 1500);
                }, 1200);
            }, 1500);
        });
    </script>
@endpush
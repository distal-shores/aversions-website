$(document).ready(function() {
    var classes = ['invert', 'hue-rotate', 'pink', 'normal'];
    function changeImgDisplayToInline( img ) {
        img.css('display', 'inline');
    }
    function displaySquares() {
        var time = 100;
        if(window.innerWidth > 500) {
            $('#square-grid .grid img').each(function() {
                var $that = $(this);
                setTimeout( function() { 
                    changeImgDisplayToInline( $that ); 
                }, time);
                time += 100;
            });
        } else {
            for(let x = 0; x < 3; x++) {
                let img = $( "#square-grid .grid img" ).eq(x);
                setTimeout( function() { 
                    changeImgDisplayToInline( img ); 
                }, time);
                time += 100;
            }
        }
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
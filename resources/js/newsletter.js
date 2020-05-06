$(document).ready(function() {
    function register($form) {
        $.ajax({
            method: "GET",
            url: 'https://band.us20.list-manage.com/subscribe/post-json?u=326cbb439cbd33e135d5a2911&id=b957fa7f6a&c=?',
            data: $form.serialize(),
            cache: false,
            dataType: 'jsonp',
            contentType: "application/json; charset=utf-8",
            error: function(err) { 
                console.log(err); 
            },
            success: function(data) {
                console.log('success');
                console.log(data);
            }
        });
    }

    $(document).on('submit', '#mailchimp_subscribe', function(event) {
        try {
            const $form = jQuery(this);
            event.preventDefault();
            register($form);
        } catch(error){}
    });

});



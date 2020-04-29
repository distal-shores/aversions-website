$(document).ready(function() {
    $(window).scroll(function () {
    	setTimeout(function(){ 
	        if ($(this).scrollTop() > 130) { 
				$('.navbar-brand-logo_sticky').removeClass('hidden');
				$('.navbar-brand-logo_default').addClass('hidden');
	        }
	        if ($(this).scrollTop() <= 130) { 
				$('.navbar-brand-logo_sticky').addClass('hidden');
				$('.navbar-brand-logo_default').removeClass('hidden');
	        }
    	}, 100);
	});
}); 
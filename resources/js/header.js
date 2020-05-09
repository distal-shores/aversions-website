$(document).ready(function() {
	var $logo = $('#logo-default');

	$(window).scroll(function () {
		var value = $(this).scrollTop();
		if (value > 50 && value <= 150) {
			$logo.css('opacity', 0);
		} else if (value <= 100) {
			$logo.css('opacity', 1);
      	}
	});
}); 
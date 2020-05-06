$(document).ready(function() {
	var $logo = $('#logo-default');

	$(window).scroll(function () {
		var value = $(this).scrollTop();
		if (value > 100 && value <= 200) {
			$logo.css('opacity', ((200 - value) * 0.01));
		} else if (value <= 100) {
			$logo.css('opacity', 1);
      	}
	});
}); 
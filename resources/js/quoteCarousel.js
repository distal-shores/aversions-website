$(document).ready(function() {
	$('.quote-carousel').slick({
		adaptiveHeight: true,
		appendArrows: $('.quote-carousel_arrows'),
		prevArrow: '<button type="button" class="carousel-button slick-prev"></button>',
		nextArrow: '<button type="button" class="carousel-button slick-next"></button>'
	});
});
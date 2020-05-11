$(document).ready(function() {
	let $in_carousel = $('.in_carousel');
	$in_carousel.each(function(index) {
		$(this).change(function() {
			let in_carousel = $(this).prop('checked');
			let clip_id = $(this).closest('td').siblings('.clipping-id').data('clipid');
			$.ajax({
				method: 'POST',
				data: { in_carousel: in_carousel, id: clip_id },
				url: '/in-carousel',
		        success: function (response) {
		            console.log(response);
		        },
		        error: function (jqXHR, textStatus, errorThrown) {
		        	console.log(JSON.stringify(jqXHR));
		        	console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
		        }
		    });
		});
	});
});
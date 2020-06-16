$(document).ready(function() {
	let $published = $('.published');
	$published.each(function(index) {
		$(this).change(function() {
			let published = $(this).prop('checked');
			let post_id = $(this).closest('td').siblings('.post-id').data('postid');
			$.ajax({
				method: 'POST',
				data: { published: published, id: post_id },
				url: '/published',
				headers: {
        			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    			},
		        success: function (response) {
		        },
		        error: function (jqXHR, textStatus, errorThrown) {
		        	console.log(JSON.stringify(jqXHR));
		        	console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
		        }
		    });
		});
	});
});
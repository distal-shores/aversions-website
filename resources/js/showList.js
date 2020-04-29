$(document).ready(function() {
	$('#show-list_selector span').click(function() {
		if(!$(this).hasClass('selected')) {
			$(this).addClass('selected');
			$(this).siblings('span').removeClass('selected');
		}
		if($(this).hasClass('upcoming')) {
			if($('#show-list_upcoming').hasClass('hidden')) {
				$('#show-list_upcoming').removeClass('hidden');
				$('#show-list_past').addClass('hidden');
			}
		} else {
			if($('#show-list_past').hasClass('hidden')) {
				$('#show-list_past').removeClass('hidden');
				$('#show-list_upcoming').addClass('hidden');
			}
		}
	});
});
$(document).ready(function() {

	var observer = new MutationObserver(function(mutations) {
	  mutations.forEach(function(mutation) {
		if($('#state').find('*').not('.default').length > 0) {
			$('#state').prop('disabled', false);
		}
	  });    
	});

	var config = { childList: true, subtree: true };

	observer.observe($('#state').get(0), config);

	$('#country').on('change', function() {
		let country = $(this).val();
		let $state = $('#state');
		$.ajax({
			type: 'GET',
			url: '/states',
			data: {
				country: country
			},
			success: function(result) {
				$state.find('*').not('.default').remove();
				result.states.forEach(function(item) {
					$state.append('<option value="' + item + '">' + item + '</option>');
				});
			}
		});
	});

});
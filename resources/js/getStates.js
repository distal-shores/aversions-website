$(document).ready(function() {

	const $state = $('#state');
	const hiddenState = $('#hiddenState').val();
	console.log(hiddenState);
	var observer = new MutationObserver(function(mutations) {
	  mutations.forEach(function(mutation) {
		if($('#state').find('*').not('.default').length > 0) {
			$('#state').prop('disabled', false);
		}
	  });    
	});

	var config = { childList: true, subtree: true };

	observer.observe($('#state').get(0), config);

	if($('#country').val() != '') {
		ajaxGetState($('#country').val(), true);
	}

	$('#country').on('change', function() {
		ajaxGetState($(this).val(), false);
	});

	function ajaxGetState(value, pageLoad) {

		$.ajax({
			type: 'GET',
			url: '/states',
			data: {
				country: value
			},
			dataType: "json",
			success: function(result) {
				console.log('success');
				$state.find('*').not('.default').remove();
				result.states.forEach(function(item) {
					$state.append('<option value="' + item + '">' + item + '</option>');
				});
			},
			error: function(data) {
				var errors = data.responseJSON;
                console.log(errors);
			},
			complete: function() {
				if(pageLoad === true) {
					$state.children('option').each(function() {
						if($(this).val() == hiddenState) {
							$(this).prop('selected', true);
						}
					});	
				}
			}
		});
	}

});

$(document).ready(function(){
	$('#contact').on("submit", function(e){
		e.preventDefault();
		let formData = $(this).serialize();
		console.log(formData);
		ajaxSubmitContactForm(formData);
	});
	function ajaxSubmitContactForm(formData) {
		$.ajax({
			type: 'POST',
			url: '/contact',
			data: formData,
			dataType: "json",
			success: function(result) {
				console.log('success ' + result.message);
			},
			error: function(xhr, status, error) {
				console.log(xhr.responseText);
			},
			complete: function() {
				console.log('complete');
			},
		});
	}
}); 
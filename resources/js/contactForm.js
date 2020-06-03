$(document).ready(function(){
	$('#contact').on("submit", function(e){
		e.preventDefault();
		let formData = $(this).serialize();
		ajaxSubmitContactForm(formData);
	});
	function ajaxSubmitContactForm(formData) {
		$.ajax({
			type: 'POST',
			url: '/contact',
			data: formData,
			dataType: "json",
			success: function(result) {
				$("<p class='se mt-10 tac'>"+result.message+"</p>").insertAfter('.contact .collapsible-content form');
			},
			error: function(xhr, status, error) {
				console.log(xhr.responseText);
			},
			complete: function(result) {
			},
		});
	}
}); 
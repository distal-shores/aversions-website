$(document).ready(function(){
	$('#contact').on("submit", function(e){
		e.preventDefault();
		let formData = this.serialize();
		ajaxSubmitContactForm(formData);
	});
	function ajaxSubmitContactForm(formData) {

		$.ajax({
			type: 'POST',
			url: '/contact',
			data: formData,
			dataType: "json",
			success: function(result) {
				
			},
			error: function(data) {
			
			},
			complete: function() {
			
			}
		});
	}
}); 
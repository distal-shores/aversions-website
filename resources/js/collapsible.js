$(document).ready(function(){
	$('.collapsible h2').click(function() {
		$(this).parent().toggleClass('collapsed');
	});
});
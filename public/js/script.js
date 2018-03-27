$(document).ready(function(){
	$(document).on("click", ".landing-nav", function(){
		var formToShow = $(this).attr("data-target");
		$(this).closest(".landing-form-container").fadeOut(function(){
			$("#"+formToShow+"").fadeIn();
		});
	});
});
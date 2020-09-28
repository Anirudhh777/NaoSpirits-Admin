$( document ).ready(function() {
	console.log("test");
	
	$(".dashpills .card-body").click(function(e) {
		window.location.replace($(this).find(".pageenter").attr("href"));
	})

	$(".custom-file-input").on("change", function() {
	  var fileName = $(this).val().split("\\").pop();
	  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
});
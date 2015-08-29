$(document).ready(function(){

	$("#scroll-test").click(function() {
	    $('html, body').animate({
	        scrollTop: $("#section2").offset().top
	    }, 1000);
	});
});
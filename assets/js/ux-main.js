$(document).ready(function(){
	var ScrollToSectionHome = "#ScrollToSectionHome";
	var gotoSection1 = "#ScrollToSection1";
	var gotoSection2 = "#ScrollToSection2";
	var gotoSection3 = "#ScrollToSection3";


	var sectionHome =  "#sectionHome";
	var section1 =  "#section1";
	var section2 =  "#section2";
	var section3 =  "#section3";
	function scrollTosection(scrollToCommand, sectionNumber)
	{
		$(scrollToCommand).click(function() {
		    $('html, body').animate({
		        scrollTop: $(sectionNumber).offset().top
		    }, 600);
		});
	}

	scrollTosection(gotoSection1,section1 );
	scrollTosection(gotoSection2,section2 );
	scrollTosection(gotoSection3,section3 );
	scrollTosection(ScrollToSectionHome,sectionHome );
	
});









// $("#ScrollToSection1").click(function() {
// 	    $('html, body').animate({
// 	        scrollTop: $("#section1").offset().top
// 	    }, 1000);
// 	});
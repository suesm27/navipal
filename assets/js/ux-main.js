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
	// scrollToSection function call
	scrollTosection(gotoSection1,section1 );
	scrollTosection(gotoSection2,section2 );
	scrollTosection(gotoSection3,section3 );
	scrollTosection(ScrollToSectionHome,sectionHome );
	
	// datepicker
	$("#datepicker").datepicker({
			firstDay: 1,
			showButtonPanel: true,
			closeText:"Close",

			minDate: 0,
			// maxDate: "+3D",
			numberOfMonths: 2,

			beforeShowDay: booked,

			constraintInput: true,

			onSelect: function(){
				if ($('#datepicker').datepicker('getDate') !== null){
				console.log("in there");
  				document.getElementById('checkout').style.display = "block";
  				}	
			}
	});

	function booked(theDate){
			if (theDate.getDay() == 0 || theDate.getDay() == 6)
				return [false, "", "Weekends disable"];

			return[true, ""];
	}

	// 	// select picker
	// $('.selectpicker').selectpicker({
	//       style: 'btn-info',
	//       size: 4
	// });

	if ($('#datepicker').datepicker('getDate') === null){
  		document.getElementById('checkout').style.display = "none";
	}
});











// $("#ScrollToSection1").click(function() {
// 	    $('html, body').animate({
// 	        scrollTop: $("#section1").offset().top
// 	    }, 1000);
// 	});
var array = ["2015-09-05","2015-09-10","2015-10-23"];
var guide_id = 1;

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
	scrollTosection(ScrollToSectionHome,sectionHome ); // home page scroll ends
	
	
	$.get("/guides/get_guide_availability_by_guide_id/"+guide_id, function(res) {
		console.log(res);
		for(var i=0; i<res.availability.length; i++){
			array.push(res.availability[i].date);
		}
		initDatePicker();
		console.log(array);
	}, "json");

	function initDatePicker(){
	// datepicker
	$("#datepicker").datepicker({
			firstDay: 1,
			showButtonPanel: true,
			closeText:"Close",

			minDate: 0,
			// maxDate: "+3D",
			numberOfMonths: 2,

			// beforeShowDay: booked,
			beforeShowDay: function(date) {
							    if($.inArray($.datepicker.formatDate('yy-mm-dd', date ), array) > -1)
							    {
							        return [true,"","Available"];
							    }
							    else
							    {
							        return [false,'',"Booked"];
							    }
							},

			constraintInput: true,

			onSelect: function(){
				if ($('#datepicker').datepicker('getDate') !== null){
  				document.getElementById('checkout').style.display = "block";
  				}	
			}
	});
	}



	if ($('#datepicker').datepicker('getDate') === null){
  		document.getElementById('checkout').style.display = "none";
	} // date picker ends

	// footer
	$(".footer").hide();
	$("#navipal-footer-icon, .navipal-footer-icon").click(function(){
		$(".footer").slideToggle("fast");

	});

	
	//$("#navipal-footer-icon").animate({marginTop : "-20px"}, 500);


});//document.ready ends


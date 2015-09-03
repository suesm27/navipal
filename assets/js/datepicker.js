var array = [];
var guide_id = document.getElementById('guide_id').value;

$(document).ready(function(){
	$.get("/guides/get_guide_availability_by_guide_id/"+guide_id, function(res) {
		for(var i=0; i<res.availability.length; i++){
			array.push(res.availability[i].date);
		}
		initDatePicker();
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
  					document.getElementById('date').value = $.datepicker.formatDate('yy-mm-dd', $('#datepicker').datepicker('getDate'));
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

});//document.ready ends


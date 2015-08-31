<!DOCTYPE html>
<html>
<head>
	<title>datapicker</title>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#datepicker").datepicker({
			firstDay: 1,
			showButtonPanel: true,
			closeText:"Close",

			// minDate: 0,
			// maxDate: "+3D",
			numberOfMonths: 3,

			beforeShowDay: booked,

			constraintInput: true
		});

		function booked(theDate){
			if (theDate.getDay() == 0 || theDate.getDay() == 6)
				return [false, "", "Weekends disable"];

			return[true, ""];
		}

		
	});

	</script>
</head>
<body>
	
	<form>
	<p>Select a date: </p>
		<input type="text" name="datepicker" id="datepicker">
	</form>

</body>
</html>

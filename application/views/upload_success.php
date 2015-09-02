<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload Success</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

	<h3>Your file was successfully uploaded!</h3>
	<?php $guide_id = $this->session->userdata('current_guide_id'); ?>
	<button class="btn btn-lg btn-info"><a href="guides/show_guide_dashboard/<?php echo $guide_id; ?>">Back to Dashboard</a></button>

	<p><?php echo anchor('/main/show_upload_page', 'Upload Another File!'); ?></p>

</body>
</html>
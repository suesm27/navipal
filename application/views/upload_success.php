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

	<ul>
		<?php foreach ($upload_data as $item => $value):?>
		<li><?php echo $item;?>: <?php echo $value;?></li>
		<?php endforeach; ?>
	</ul>

	<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

</body>
</html>
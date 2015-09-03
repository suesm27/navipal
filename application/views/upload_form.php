  <!-- header-login -->
  <?php $this->load->view("partials/header-login"); ?>
  <body>
<!-- navigation -->
<?php $this->load->view("partials/navigation"); ?>
<!-- nav background hack this should be fixed -->
<div class="bg-color3 margin-top-Negative51 padding-top-60">
</div>
  <div class="bg-color2 height100 padding-top-60 text-center margin-auto padding20">
  	<div class="photo-upload-container small-container bg-color3">
  		<div class=""><span class="glyphicon glyphicon-user"></span></div>
  	
		<?php echo $error;?>

		<?php echo form_open_multipart('/main/do_upload');?>
		<div class="fileUpload btn btn-default">
			<!-- <span>Choose file</span> -->
			<input type="file" name="userfile" class="" />
		</div>
			

		<br /><br />

		<button type="submit" class=" btn btn-1 btn-lg">Upload</button>

		</form>
	</div>
  </div>

 <!-- footer -->
  <?php $this->load->view("partials/footer"); ?>
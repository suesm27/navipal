<html>
<head>
	<meta charset="UTF-8">
	<title>Edit Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <style></style>
 <link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <span class="navbar-brand"></span>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/guides/logoff">Logoff</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container -->
  </nav>
  <div class="main-container">
    <div class="container">
      <?php 
      if ($this->session->flashdata('success'))
      {
        ?>
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Nice!</strong>
          <?php 
          foreach($this->session->flashdata('success') as $s){
            echo $s;
          }
          ?>
        </div>
        <?php
      }
      if ($this->session->flashdata('errors'))
      {
        ?>
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Error!</strong>
          <?php 
          foreach($this->session->flashdata('errors') as $error){
            echo $error;
          }
          ?>
        </div>
        <?php
      }
      ?>
    </div>
    <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form class="form-horizontal" roll='form' action="/guides/edit_guide_action/<?php echo $guide['id']; ?>" method='post'>
          <input type='hidden' name='action' value='basic'>
          <div class="form-group">
            <label>Name: </label>
            <input type="text" class="form-control" name="name" value="<?php echo $guide['name'];?>" required>
          </div>  
          <div class="form-group">
            <label>Location: </label>
            <input type="text" class="form-control" name="location" value="<?php echo $guide['location'];?>" required>
          </div>  
          <div class="form-group">
            <label>Price: </label>
            <input type="text" class="form-control" name="price" value="<?php echo $guide['price'];?>" required>
          </div>  
          <div class="form-group">
            <label>Date of Birth: </label>
            <input type="date" class="form-control" name="dob" value="<?php echo $guide['dob'];?>" required>
          </div> 
          <div class="form-group">
            <label>Phone number: </label>
            <input type="tel" class="form-control" name="phone" value="<?php echo $guide['phone'];?>" required>
          </div> 
          <div class="form-group">
            <label>Description: </label>
            <textarea class="form-control" rows="5" name="description" value="<?php echo $guide['description'];?>" required><?php echo $guide['description'];?></textarea>
          </div> 
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Save</button>
          </div>
        </form>    
        <form class="form-horizontal" roll='form' action="/guides/edit_guide_action/<?php echo $guide['id']; ?>" method='post'>
          <input type='hidden' name='action' value='password'>
          <div class="form-group">
            <label>Password: </label>
            <input type="password" class="form-control" name="password" required>
          </div>
          <div class="form-group">
            <label>Password Confirmation: </label>
            <input type="password" class="form-control" name="passwordconf" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Update Password</button>
          </div>
        </form>
    </div>
  </div> <!-- /container -->
</div>
</body>
</html>
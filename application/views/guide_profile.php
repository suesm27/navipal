<html>
<head>
  <meta charset="UTF-8">
  <title><?php echo $guide['name']; ?> Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <style>
 .navbar-brand {
  padding: 0;
 }
 </style>
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
        <span class="navbar-brand"><img src="/assets/navipal_logo.png" alt="Navipal" height="50" width="140"></span>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/users">Go Back</a></li>
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
      <div class="col-md-6">
      <h1><?php echo "{$guide['name']}'s profile"; ?></h1>
      <h3>Name: <?php echo $guide['name']; ?></h3>
      <?php echo "<img src='/uploads/{$guide['image']}'>"; ?>
      <h4>Email: <?php echo $guide['email']; ?></h4>
      <h4>Date of Birth: <?php echo $guide['dob']; ?></h4>
      <?php
      echo "<h4>Rating: ";
      for ($i = 0; $i < $guide['rating']; $i++)
      {
        echo "<img src='/assets/star.png' height='25' width='25'>";
      }
      $star = 5 - $guide['rating'];
      for ($i = 0; $i < $star; $i++)
      {
        echo "<img src='/assets/blank.png' height='25' width='25'>";
      }
      echo "</h4>";
      echo "<h4>Price: \${$guide['price']}</h4>";
      echo "<h4>Location: {$guide['location']}</h4>";
     ?>
     <?php 
     if($this->session->userdata('user_login')){?>
       <form action="<?php 
         $user_id = $this->session->userdata('current_user_id');
         echo "/reservations/show_confirmation/$user_id/{$guide['id']}/2015-08-31"; 
         ?>" method="post">
          <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
            data-name="Book Your Tour"
            data-image="/assets/navipal_icon.png"
            data-description="Your friendly neighborhood guide..."
            data-billing-address="true"
            data-amount="<?= $guide['price']*100 ?>"
            data-label="Book Tour!"
            data-locale="auto">
          </script>
        </form>
    <?php
    }
    else{
      echo "<h4 data-toggle='modal' data-target='#myModal'><a href='#'>";
      echo "Login to book the tour";
      echo "</a></h4>";
    ?>
    </div>
    <div class="col-md-6">
      <h2>Recent Reviews: </h2>
      <?php       
      foreach($reviews as $review){
        echo "<h3>{$review['user_name']} says: </h3>";
        echo "<h4>{$review['review']}</h4>";
        echo "<h4>Rating: ";
        for ($i = 0; $i < $review['star']; $i++)
        {
          echo "<img src='/assets/star.png' height='25' width='25'>";
        }
        $star = 5 - $review['star'];
        for ($i = 0; $i < $star; $i++)
        {
          echo "<img src='/assets/blank.png' height='25' width='25'>";
        }
        echo "</h4>";
        }
       ?>
    </div>
<!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h3 class="modal-title">Login</h3>
          <!-- login succes and error message will go here -->
          
          </div>
          <div class="modal-body">

           <form class="form-horizontal" roll='form' action='/Users/signin_action_other/<?php echo $guide['id']; ?>' method='post'>
            <div class="form-group">
              <label>Email: </label>
              <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
              <label>Password: </label>
              <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-lg btn-1 float-right">Sign In</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>

    </div>
  </div><!-- end of Modal -->

    <?php
     }
    ?>
    </div>
  </div>
</body>
</html>
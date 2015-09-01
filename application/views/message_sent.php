<html>
<head>
  <meta charset="UTF-8">
  <title><?php echo "Message sent to {$guide['name']}!"; ?></title>
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
          <li><a href="/guides/view_profile/<?php echo $guide['id']; ?>">Go Back</a></li>
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
	<?php
    // Get the PHP helper library from twilio.com/docs/php/install
      require_once('assets/twilio-php/Services/Twilio.php'); // Loads the library
       
      // set your AccountSid and AuthToken from www.twilio.com/user/account
      $AccountSid = "AC0509bdc2efb7771b8e0e8cbbc0006bfe";
      $AuthToken = "a415e2044b826566e515b413672ac234";
      $client = new Services_Twilio($AccountSid, $AuthToken);
      $user_name = $this->session->userdata('name');
      //send message text to guide
      try {
          $message = $client->account->messages->create(array(
              "From" => "6092773538",
              "To" => "{$guide['phone']}",
              "Body" => "New message from $user_name: $message",
          ));
      } catch (Services_Twilio_RestException $e) {
          echo $e->getMessage();
      }

      ?> 
  </div>
</body>
</html>
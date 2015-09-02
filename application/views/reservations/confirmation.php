<html>
<head>
<meta charset="UTF-8">
<title>Reservation Complete!</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false" 
type="text/javascript"></script>
<script type="text/javascript" src="/assets/js/maps.js"></script>
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
        <li></li>
      </ul>
    </div>
  </div>
</nav>
<div class="main-container">
  <div class="container">
      <?php 
        echo "<h1>Reservation Confirmation: </h1>";
        echo "<h2>Confirmation #: {$reservation['confirmation']}</h2>";
        echo "<h2>Reservation made on: {$reservation['created_at']}</h2>";
        echo "<h3>Guide: {$reservation['guide_name']}</h3>";
        echo "<h4>Price: \${$reservation['guide_price']}</h4>";
        echo "<img src='/uploads/{$reservation['guide_id']}.png'>";
        echo "<h3>User: {$reservation['user_name']}</h3>";
        echo "<h3>Reservation Date: {$reservation['date']}</h3><br>";
        echo "<h3>Payment info:</h3>";
        echo "<h4>Name: {$post_info['stripeBillingName']}</h4>";
        echo "<h4>Email: {$post_info['stripeEmail']}</h4>";
        echo "<h4>Billing Address: {$post_info['stripeBillingAddressLine1']} {$post_info['stripeBillingAddressZip']} {$post_info['stripeBillingAddressCity']} {$post_info['stripeBillingAddressState']} {$post_info['stripeBillingAddressCountry']}</h4>";
        
     ?>

     <?php

        // Get the PHP helper library from twilio.com/docs/php/install
          require_once('assets/twilio-php/Services/Twilio.php'); // Loads the library
           
          // set your AccountSid and AuthToken from www.twilio.com/user/account
          $AccountSid = "AC0509bdc2efb7771b8e0e8cbbc0006bfe";
          $AuthToken = "a415e2044b826566e515b413672ac234";
          $user_phone_number = $user_phone['phone'];
          $guide_phone_number = $guide_phone['phone'];

          $client = new Services_Twilio($AccountSid, $AuthToken);
          //send confirmation text to customer
          try {
              $message = $client->account->messages->create(array(
                  "From" => "6092773538",
                  "To" => "$user_phone_number",
                  "Body" => "Your reservation has been confirmed! Confirmation #: {$reservation['confirmation']} Date: {$reservation['date']}",
              ));
          } catch (Services_Twilio_RestException $e) {
              echo $e->getMessage();
          }
          //send confirmation text to guide
          try {
              $message = $client->account->messages->create(array(
                  "From" => "6092773538",
                  "To" => "$guide_phone_number",
                  "Body" => "You have a new booking! Confirmation #: {$reservation['confirmation']} Date: {$reservation['date']}",
              ));
          } catch (Services_Twilio_RestException $e) {
              echo $e->getMessage();
          }

      ?> 
 </div>
</div><!--/.main-container -->
</body>
</html>
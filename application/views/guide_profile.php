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
      echo "<h4>Price: \${$guide['price']}/night</h4>";
      echo "<h4>Location: {$guide['location']}</h4>";
     ?>
     <form action="" method="POST">
      <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
        data-name="Book Your Tour"
        data-image="/assets/navipal_icon.png"
        data-description="Your friendly neighborhood guide..."
        data-billing-address="true"
        data-amount="2000"
        data-label="Book Tour!"
        data-locale="auto">
      </script>
    </form>
    </div>
  </div>
</body>
</html>
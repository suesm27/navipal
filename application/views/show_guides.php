<html>
<head>
<meta charset="UTF-8">
<title>Show All Guides</title>
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
        <li><a href="/main">Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="main-container">
  <div class="container">
    <div id="panel">
      <input id="address" type="textbox" value="San Jose, CA">
      <!-- <input id="submit" type="button" value="Geocode"> -->
      <button type="submit" id="submit" class="btn btn-primary" value="Geocode">Search!</button>
    </div>
    <div class="col-md-6">
      <?php 
      foreach($guides as $guide){
        echo "<h1>{$guide['name']}</h1>";
        echo "<img src='/uploads/{$guide['image']}'>";
        echo "<h4>\"{$guide['description']}\"</h4>";
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
       echo "<h4>{$guide['location']}</h4>";
     }
     ?>
   </div>
   <div class="col-md-6" id="map">
   </div>
 </div>
</div><!--/.main-container -->
</body>
</html>
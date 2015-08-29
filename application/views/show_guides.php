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
<script type="text/javascript">
var addresses = [];
var guides_names = [];
$(document).ready(function(){
  $.get('/guides/get_all_guides_locations', function(res) {
    console.log(res);
    for(var i=0; i<res.locations.length; i++){
      addresses.push(res.locations[i].location);
    }
  }, "json");
  $.get('/guides/get_all_guides_names', function(res) {
    console.log(res);
    for(var i=0; i<res.guides_names.length; i++){
      guides_names.push(res.guides_names[i].name);
    }
  }, "json");
  $('form').submit(function(){
    return false;
  });
});
function initialize(){
  console.log(guides_names);
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var geocoder = new google.maps.Geocoder();
  var infowindow = new google.maps.InfoWindow();
  var coordinate;
  for(var i=0; i<addresses.length; i++){
    geocoder.geocode({'address': addresses[i]}, function(results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location,
        });
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            //somehow the value of "i" is messed up inside here, it's always "5"
            //infowindow.setContent(guides_names[0]); //that works and sets the content to the first element in the array
            infowindow.setContent(guides_names[i]);
            infowindow.open(map, marker);
          }
        })(marker, i));
      } 
      else {
        alert('Geocode was not successful for the following reason: ' + status);
     }
   });
  }
}
google.maps.event.addDomListener(window, "load", initialize);
</script>
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
    </div><!--/.nav-collapse -->
  </div><!--/.container -->
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
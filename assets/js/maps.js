var addresses = [];
var guides_names = [];
var map;
$(document).ready(function(){
  $.get('/guides/get_all_guides_locations', function(res) {
    for(var i=0; i<res.locations.length; i++){
      addresses.push(res.locations[i].location);
    }
  }, "json");
  $.get('/guides/get_all_guides_names', function(res) {
    for(var i=0; i<res.guides_names.length; i++){
      guides_names.push(res.guides_names[i].name);
    }
  }, "json");
  // $('form').submit(function(){
  //   return false;
  // });


 // enter key
  $( "#address" ).keypress(function() {
    if (event.keyCode == 13) {

      var geocoder = new google.maps.Geocoder();
      geocodeAddress(geocoder, map);

    };
});

  // footer
  $(".footer").hide();
  $("#navipal-footer-icon, .navipal-footer-icon").click(function(){
    $(".footer").slideToggle("fast");

  });
});
function initialize(){
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  map.set('scrollwheel', false);
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
            infowindow.setContent("Pick me!");
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

function initMap() {
 var geocoder = new google.maps.Geocoder();
 document.getElementById('submit').addEventListener('click', function() {
   geocodeAddress(geocoder, map);
 });
}

function geocodeAddress(geocoder, resultsMap) {
 var address = document.getElementById('address').value;
 geocoder.geocode({'address': address}, function(results, status) {
   if (status === google.maps.GeocoderStatus.OK) {
     resultsMap.setCenter(results[0].geometry.location);
   } else {
     alert('Geocode was not successful for the following reason: ' + status);
   }
 });
}
google.maps.event.addDomListener(window, "load", initialize);

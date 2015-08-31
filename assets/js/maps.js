var addresses = [];
var guides_names = [];
var map;
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
  map = new google.maps.Map(document.getElementById('map'), {
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
            infowindow.setContent("shit is not working");
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
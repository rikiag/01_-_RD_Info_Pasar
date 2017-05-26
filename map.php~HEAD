<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple markers</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

function initMap() {
  var myLatLng = {lat: 5.575557, lng: 95.360469};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 16,
    center: myLatLng
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Hello World!'
  });
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaZXQpHkUWpZOFFBPQScY8UE0waqvsXcE&v=3.exp&libraries=places&callback=initMap"
    async defer></script>
  </body>
</html>

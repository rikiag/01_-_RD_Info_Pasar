<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Form Tambah Pasar</title>

  <!-- CSS  -->
  <link href="fonts/icon.css" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style type="text/css">
    #map {
      height: 350px;
      width: 100%;
    }

    #pac-input {
      background-color: #fff;
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
      margin-left: 12px;
      padding: 0 11px 0 13px;
      text-overflow: ellipsis;
      width: 300px;
    }
  </style>
</head>
<body class="grey lighten-4">
  <br>
  <div class="container">
    <div class="row">
      <div class="col s12 m12 ">
        <div class="card ">
          <div class="card-content">
            <center><span class="card-title black-text">Tambah Pasar</span></center>
            <form action="tambah_pasar.php" method="post" id="form_pasar">
              <div class='row'>
                <div class='input-field col s12'>
                  <input class='validate' type='text' name='nama_pasar' />
                  <label for='nama_pasar'>Nama Pasar</label>
                </div>
              </div>
              <div class='row'>
                <label>Posisi</label>
                <div class="item form-group">
                  <input id="pac-input" class="controls" type="text" placeholder="Cari Tempat"></input>
                  <div id="map"></div>
                </div>
                <div class="item form-group">
                  <div class="col m6 s6">
                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude">
                  </div>
                  <div class="col m6 s6">
                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude">
                  </div>
                  <div class="input-field col s12">
                    <input type="text" class="form-control" id="address" name="alamat_pasar" placeholder="Alamat">
                  </div>
                </div>
              </div>
              <center>
                <div class='row'>
                  <button type='submit' class='col s12 btn btn-large waves-effect indigo'>Tambah</button>
                </div>
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--  Scripts-->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script type="text/javascript">
    //Mencegah Tombol Enter
    $('#form_pasar').on('keyup keypress', function(e) {
      var keyCode = e.keyCode || e.which;
      if (keyCode === 13) {
        e.preventDefault();
        return false;
      }
    });
    function initAutocomplete() {
      var map;
      var marker;
      var myLatlng = new google.maps.LatLng(5.556024321568074, 95.32176417790993);
      var geocoder = new google.maps.Geocoder();
      var infowindow = new google.maps.InfoWindow();

      var mapOptions = {
        zoom: 16,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      var map = new google.maps.Map(document.getElementById('map'), mapOptions);

      marker = new google.maps.Marker({
        map: map,
        position: myLatlng,
        draggable: true
      });

      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };

          marker.setPosition(pos);
          map.setCenter(pos);
        }, function() {
          handleLocationError(true, infoWindow, map.getCenter());
        });
      } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }

    geocoder.geocode({'latLng': myLatlng }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          $('#latitude,#longitude').show();
          $('#address').val(results[0].formatted_address);
          $('#latitude').val(marker.getPosition().lat());
          $('#longitude').val(marker.getPosition().lng());
          infowindow.setContent(results[0].formatted_address);
          infowindow.open(map, marker);
        }
      }
    });

    google.maps.event.addListener(marker, 'dragend', function() {
      geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            $('#address').val(results[0].formatted_address);
            $('#latitude').val(marker.getPosition().lat());
            $('#longitude').val(marker.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
          }
        }
      });
    });

    google.maps.event.addListener(map, 'click', function(event) {
      placeMarker(event.latLng);
    });

    function placeMarker(location) {
      marker.setPosition(location);
      geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            $('#address').val(results[0].formatted_address);
            $('#latitude').val(marker.getPosition().lat());
            $('#longitude').val(marker.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
          }
        }
      });
    }

    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
      searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // [START region_getplaces]
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
      var places = searchBox.getPlaces();

      if (places.length == 0) {
        return;
      }

      // Clear out the old markers.
      markers.forEach(function(marker) {
        marker.setMap(null);
      });
      markers = [];

      // For each place, get the icon, name and location.
      var bounds = new google.maps.LatLngBounds();
      places.forEach(function(place) {
        var icon = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25)
        };

        // Create a marker for each place.
        marker.setPosition(place.geometry.location);

        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
      });
      map.fitBounds(bounds);
    });
    // [END region_getplaces]
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaZXQpHkUWpZOFFBPQScY8UE0waqvsXcE&v=3.exp&libraries=places&callback=initAutocomplete"
async defer></script>

</body>
</html>

<?php 
include 'database.php';
if (isset($_POST['nama_pasar'])) {
  $nama_pasar   = $_POST['nama_pasar'];
  $latitude     = $_POST['latitude'];
  $longitude    = $_POST['longitude'];
  $alamat_pasar = $_POST['alamat_pasar'];

  $sql=mysqli_query($con, "INSERT INTO `pasar`(`nama_pasar`, `alamat_pasar`, `lat`, `long`) VALUES ('$nama_pasar', '$alamat_pasar', '$latitude', '$longitude')");
  if($sql) { 
    header('location:index.php');
  }
  else{
    echo "<script> alert('Gagal menambahkan pasar') </script>";
  }
}
?>
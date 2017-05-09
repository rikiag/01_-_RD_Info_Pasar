<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Pasar Rukoh</title>

  <!-- CSS  -->
  <link href="fonts/icon.css" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style>
  #map {
    width: : 100%;
    height: 300px;
  }
  .center-btn{
    text-align: center;
  }
  </style>
</head>
<body>
  <div class="navbar-fixed">
    <nav class="light-blue lighten-1" role="navigation">
      <div class="nav-wrapper container">
        <a href="#" class="brand-logo" data-activates="slide-out">Pasar Rukoh</a>
        <!-- Menu in Desktop mode -->
        <ul class="right hide-on-med-and-down">
          <li><a href="#">Navbar Link</a></li>
        </ul>
        <ul class="right hide-on-med-and-down">
          <li><a href="#">Navbar Link</a></li>
        </ul>

        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>
    </nav>
  </div>
  <div class="nav-wrapper container">
    <!-- Menu in Mobile mode -->
    <ul id="slide-out" class="side-nav">
      <li>
        <div class="userView">
          <div class="background">
            <img src="images/office.jpg">
          </div>
          <a href="#!user"><img class="circle" src="images/yuna.jpg"></a>
          <a href="#!name"><span class="white-text name">John Doe</span></a>
          <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
        </div>
      </li>
      <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
      <li><a class="waves-effect" href="index.html">Home</a></li>
      <!-- <li><a class="waves-effect" href="#!">Daftar / Login</a></li> -->
      <li><a class="waves-effect" href="#!">Edit Profil</a></li>
      <li><a class="waves-effect" href="#!">Jasa Antar Barang</a></li>
      <li><a class="waves-effect" href="#!">About</a></li>
      <li><div class="divider"></div></li>
      <li><a class="waves-effect" href="#!">Logout</a></li>
    </ul>
  </div>


  <div class="light-blue">
    <div class="card-tabs">
      <ul class="tabs tabs-fixed-width tabs-transparent">
        <li class="tab"><a class="active" href="#test1">Info</a></li>
        <li class="tab"><a href="#test2">Barang</a></li>
      </ul>
    </div>
    <div class="card-content grey lighten-4">
      <div id="test1">
        <div id="map"></div>
        <div class="center-btn">
          <a class="waves-effect waves-light btn-large">Dapatkan rute</a>
        </div>
      </div>
      <div id="test2">
        <div class="container">
          <div class="section">
            <!-- <div class="col s12 m7">
            <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
            <img src="images/sample-1.jpg">
            <span class="card-title">Card Title</span>
          </div>
        </div>
      </div> -->
      <div class="row">
        <div class="col s12 m6 l4">
          <div class="card horizontal">
            <div class="card-image">
              <img src="images/office.jpg">
            </div>
            <div class="card-stacked">
              <div class="card-content">
                <p>Bawang Merah</p>
              </div>
              <div class="card-action">
                <a href="barang.html">Rp. 18.000,00</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
</div>

<!--  Scripts-->
<script type="text/javascript">
console.log("Uchiha Hana Nan");
</script>
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
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

</body>
</html>

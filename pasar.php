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
<body class="grey lighten-4">
  <?php
  include 'menu.php';
  if (isset($_GET['id'])):
    $id = $_GET['id'];
  $sql = mysqli_query($con, "SELECT * FROM pasar WHERE id_pasar = $id");
  $map = mysqli_fetch_object($sql);
  ?>
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
        <hr>
        <div class="center-btn">
          <a onclick="myNavFunc(<?= $map->lat ?>, <?= $map->long ?>)" class="waves-effect waves-light btn-large">Dapatkan rute</a>
        </div>
      </div>
      <div id="test2">
        <div class="container">
          <div class="section">
            <div class="row">
              <?php
              $sqlData = mysqli_query($con, "SELECT * FROM barang JOIN barang_user ON barang_user.id_barang = barang.id_barang JOIN user ON barang_user.no_telp = user.no_telp JOIN pasar ON pasar.id_pasar = user.id_pasar AND user.id_pasar = $id AND barang.stok_barang > 0");
              while ($data = mysqli_fetch_object($sqlData)):
                ?>
              <div class="col s12 m6 l4">
                <div class="card horizontal">
                  <div class="card-image">
                    <img src="images/<?= $data->foto_barang ?>">
                  </div>
                  <div class="card-stacked">
                    <div class="card-content">
                      <p><?= $data->nama_barang ?></p>
                    </div>
                    <div class="card-action">
                      <a href="barang.php?id_barang=<?= $data->id_barang; ?>">Rp. <?= number_format($data->harga_sekarang,2,",","."); ?></a>
                      <?php
                      if ($data->harga_sekarang > $data->harga_sebelumnya) {
                        echo '<i class="material-icons">call_made</i>';
                      }
                      else{
                        echo '<i class="material-icons">call_received</i>';
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<?php else: ?>
  <br>
  <center><h1>No Data</h1></center>
<?php endif; ?>

<script type="text/javascript"> 
  function myNavFunc(a, b){ 
  // If it's an iPhone.. 
  if( (navigator.platform.indexOf("iPhone") != -1) || (navigator.platform.indexOf("iPod") != -1) || (navigator.platform.indexOf("iPad") != -1)) 
    window.open("maps://maps.google.com/maps?daddr="+a+","+b+"&ll="); 
  else 
    window.open("http://maps.google.com/maps?daddr="+a+","+b+"&ll="); 
} 
</script>

<!--  Scripts-->

<script>

  function initMap() {
    var myLatLng = {lat: <?= $map->lat ?>, lng: <?= $map->long ?>};

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

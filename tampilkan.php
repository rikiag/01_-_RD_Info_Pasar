<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Pasar Rukoh</title>

  <!-- CSS  -->
  <link href="fonts/icon.css" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
</head>
<body>
<div class="navbar-fixed">
    <nav class="light-blue lighten-1" role="navigation">
      <div class="nav-wrapper container">
        <a href="#" class="brand-logo" data-activates="slide-out">Pasar Rukoh</a>
        <!-- Menu in Desktop mode -->
        <ul class="right hide-on-med-and-down">
          <li><a href="editor.php">upload barang</a></li>
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
        <li class="tab"><a href="#test3">Harga Terbaru</a></li>
      </ul>
    </div>
    <div class="card-content grey lighten-4">
    <center>
    <br><br><br>
    <div class="row">
              <div class="col s12 m6 l4">
                  <div class="card horizontal">
                    <div class="card-image">


<?php 
include "database.php"; 
$sql = "select * FROM barang WHERE id_barang IN(SELECT MAX(id_barang) FROM barang)";
$tampil = mysqli_query($con, $sql);
while ($data = mysqli_fetch_array($tampil)){
// Tampilkan Gambar

echo "<img src='upload/".$data['foto_barang']."' width='372px' height='243px'/>";
echo "</br>";
echo 'Nama Barang: ';
echo $data['nama_barang'];
echo '<br>';
echo 'Harga: ';
echo $data['harga_sekarang'];
}
?>
</center>

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaZXQpHkUWpZOFFBPQScY8UE0waqvsXcE&v=3.exp&libraries=places&callback=initMap"
async defer></script>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

</body>
</html>

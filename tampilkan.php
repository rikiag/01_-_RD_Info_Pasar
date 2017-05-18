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
<div class="light-blue">
    <div class="card-tabs">
      <ul class="tabs tabs-fixed-width tabs-transparent">
        <li class="tab"><a href="#test3">Harga Terbaru</a></li>
      </ul>
    </div>
    <div class="card-content grey lighten-4">
    <center>
    <br><br><br>


<?php 
include "database.php"; 
$sql = "select * FROM barang WHERE id_barang IN(SELECT MAX(id_barang) FROM barang)";
$tampil = mysqli_query($con, $sql);
while ($data = mysqli_fetch_array($tampil)){
// Tampilkan Gambar

echo "<img src='upload/".$data['foto_barang']."' width='372px' height='243px'/>";
echo "</br>";
<<<<<<< HEAD
echo 'harga: ';
=======
echo 'Nama Barang: ';
echo $data['nama_barang'];
echo '<br>';
echo 'Harga: ';
>>>>>>> komentar
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

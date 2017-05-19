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
</head>
<body class="grey lighten-4">
  <?php
  include 'menu.php';
  if (isset($_GET['id_barang'])):
    $id = $_GET['id_barang'];
  $sql = mysqli_query($con, "SELECT * FROM barang WHERE id_barang = $id");
  $data = mysqli_fetch_object($sql);
  ?>
  <div class="row">
    <div class="col s12 m6 offset-m3">
      <div class="card">
        <div class="card-image">
          <img src="images/<?= $data->foto_barang; ?>">
          <span class="card-title"><?= $data->nama_barang; ?></span>
        </div>
        <div class="card-content">
          <?php 
          $sql = mysqli_query($con, "SELECT * FROM komentar JOIN user ON komentar.no_telp = user.no_telp WHERE komentar.id_barang = $id");
          while($data = mysqli_fetch_object($sql)):
            ?>
          <b><?= $data->nama; ?> :</b>
          <p><?= $data->isi_komentar; ?></p>
            <hr>
          <?php endwhile; ?>
        </div>
        <div class="card-action">
          <div class="row hoverable">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s12">
                  <textarea id="textarea1" class="materialize-textarea"></textarea>
                  <label for="textarea1">Tambah Komentar</label>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php else: ?>
  <br>
  <center><h1>No Data</h1></center>
<?php endif; ?>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

</body>
</html>
<?php 
//header("Refresh:0; url=page2.php");
?>
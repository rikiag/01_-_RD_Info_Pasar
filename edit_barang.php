<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Edit Barang</title>

  <!-- CSS  -->
  <link href="fonts/icon.css" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="grey lighten-4">
  <?php
    include 'menu.php';
    $id = $_GET['id_barang'];
    $sql = "SELECT * FROM barang where id_barang = $id";
    $result = $con->query($sql);
    $row = $result -> fetch_object();
  ?>
  <div class="row">
    <div class="col s12 m6 offset-m3">
      <div class="card">
        <diw class="row">
          <center><h3>Edit Barang</h3></center>
        </diw>
        <div class="row">
          <form class="col s12" method="post" action="edit_barang.php?id_barang=<?= $row->id_barang ?>" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col s12">
                <input type="text" class="validate" name="nama_barang" autofocus value="<?= $row->nama_barang ?>">
                <label >Nama Barang</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="text" class="validate" name="stok_barang" value="<?= $row->stok_barang ?>">
                <label >Stok</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="hidden" class="validate" name="harga_sebelumnya" value="<?= $row->harga_sekarang ?>">
                <input type="text" class="validate" name="harga_sekarang" value="<?= $row->harga_sekarang ?>">
                <label >Harga</label>
              </div>
            </div>
            <div class="row">
              <div class="file-field input-field col s12">
                <div class="btn">
                  <span>Foto</span>
                  <input type="file" name="file_foto" value="<?= $row->foto_barang ?>">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <center>
                <div class='row'>
                  <input type='submit' class='col s12 btn btn-large waves-effect' name="tambah" value="Edit">
                </div>
              </center>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

</body>
</html>

<?php 
if (isset($_POST['tambah'])) {
  $nama   = $_POST['nama_barang'];
  $harga  = $_POST['harga_sekarang'];
  $stok   = $_POST['stok_barang'];
  $harga_sebelumnya  = $_POST['harga_sebelumnya'];
  $gambar = $_FILES["file_foto"]["name"];

  $folder   = "images";
  $tmp_name = $_FILES["file_foto"]["tmp_name"];
  $name     = $folder."/".$_FILES["file_foto"]["name"];
  move_uploaded_file($tmp_name, $name);

  $sql = mysqli_query($con, "UPDATE `barang` SET `nama_barang`='$nama', `foto_barang`='$gambar', `harga_sekarang`='$harga', `harga_sebelumnya`='$harga_sebelumnya', `stok_barang`='$stok' WHERE id_barang = $id");
  if ($sql) {
    echo '<script>window.location.assign("barang_penjual.php")</script>';
  }
  else{
    echo "<script>alert('Gagal mengedit barang')</script>";
  }
}
?>
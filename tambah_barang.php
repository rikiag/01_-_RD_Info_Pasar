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
  <?php include 'menu.php'; ?>
  <div class="row">
    <div class="col s12 m6 offset-m3">
      <div class="card">
        <diw class="row">
          <center><h3>Tambah Barang</h3></center>
        </diw>
        <div class="row">
          <form class="col s12" method="post" action="tambah_barang.php" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col s12">
                <input type="text" class="validate" name="nama_barang" autofocus>
                <label >Nama Barang</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="text" class="validate" name="harga_sekarang">
                <label >Harga</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="text" class="validate" name="stok_barang">
                <label >Stok</label>
              </div>
            </div>
            <div class="row">
              <div class="file-field input-field col s12">
                <div class="btn">
                  <span>Foto</span>
                  <input type="file" name="file_foto">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <center>
                <div class='row'>
                  <input type='submit' class='col s12 btn btn-large waves-effect' name="tambah" value="Tambah">
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
  $stok   = $_POST['stok_barang'];
  $harga  = $_POST['harga_sekarang'];
  $gambar = $_FILES["file_foto"]["name"];

  $folder   = "images";
  $tmp_name = $_FILES["file_foto"]["tmp_name"];
  $name     = $folder."/".$_FILES["file_foto"]["name"];
  move_uploaded_file($tmp_name, $name);
  mysqli_query($con, "INSERT INTO `barang`(`nama_barang`, `foto_barang`, `harga_sekarang`, `stok_barang`) VALUES ('$nama','$gambar','$harga','$stok')");

  $cek = mysqli_query($con, "SELECT * FROM barang ORDER BY `barang`.`id_barang` DESC");
  $data = mysqli_fetch_object($cek);

  if (mysqli_query($con, "INSERT INTO `barang_user`(`no_telp`, `id_barang`) VALUES ('".$_SESSION['no_telp']."','".$data->id_barang."')")) {
    echo '<script>window.location.assign("barang_penjual.php")</script>';
  }
  else{
    echo "<script>alert('gagal menambahkan barang')</script>";
  }
}
?>
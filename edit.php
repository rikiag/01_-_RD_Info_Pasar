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
    $id = $_SESSION['no_telp'];
    $sql = "SELECT * FROM user where no_telp = $id";
    $result = $con->query($sql);
    $row = $result -> fetch_object();
  ?>
  <div class="row">
    <div class="col s12 m6 offset-m3">
      <div class="card">
        <diw class="row">
          <center><h3>Edit Profil</h3></center>
        </diw>
        <div class="row">
          <form class="col s12" method="post" action="edit.php" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col s12">
                <input type="text" class="validate" name="nama" autofocus value="<?= $row->nama ?>">
                <label >Nama</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="text" class="validate" name="no_telp" value="<?= $row->no_telp ?>">
                <label >NO. Telp</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="text" class="validate" name="alamat" value="<?= $row->alamat ?>">
                <label >Alamat</label>
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
              <div class="input-field col s12">
                <input type="password" class="validate" name="password" required>
                <label >Password</label>
              </div>
            </div>
            </div>
            <div class="row">
              <center>
                <div class='row'>
                  <input type='submit' class='col s12 btn btn-large waves-effect' name="tambah" value="Simpan">
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
  $nama     = $_POST['nama'];
  $no_telp  = $_POST['no_telp'];
  $alamat   = $_POST['alamat'];
  $password = $_POST['password'];
  $gambar   = $_FILES["file_foto"]["name"];

  $folder   = "images";
  $tmp_name = $_FILES["file_foto"]["tmp_name"];
  $name     = $folder."/".$_FILES["file_foto"]["name"];
  move_uploaded_file($tmp_name, $name);

  $sql = "UPDATE `user` SET `no_telp`='$no_telp',`nama`='$nama',`alamat`='$alamat',`foto`='images/$gambar',`password`='$password' WHERE no_telp = $id";

  if ($con->query($sql)) {
    echo "<script>alert('Silahkan login untuk melanjutkan')</script>";
    session_destroy();
    echo '<script>window.location.assign("login.php")</script>';
  }else{
    echo "<script>alert('Gagal mengedit profil')</script>";
  }
}
?>
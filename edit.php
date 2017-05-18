<<<<<<< HEAD
<?php

  require_once "database.php";//untuk menghubungkan/koneksi dengan database

  $no_telp = $_GET['no_telp'];

  echo $no_telp;

  $sql = "SELECT * FROM user where no_telp = $no_telp";
  $result = $con->query($sql);
  $row = $result -> fetch_assoc();

  echo '
    <form action="proses_edit.php?no_telp='.$row["no_telp"].'" method="post">
        <input type="text" value="'.$row['nama'].'" name="nama" required/>
        <br>
        <input type="text" value="'.$row['no_telp'].'" name="no_telp" disabled =""/>
        <br>
        <input type="text" value="'.$row['alamat'].'" name="alamat" disabled =""/>
        <br>
        <select name="level" required>
          <option value="" selected="selected" disabled ="">'.$row['level'].'</option>
          <option value="1">Penjual</option>
          <option value="2">Pembeli</option>
          <option value="3">Antar Barang</option>
        </select>
        <br>
        <input type="text" value="'.$row['password'].'" name="password" required/>
        <br>
        <input type="text" value="'.$row['foto'].'" name="foto" required/>
        <br>
        <button type="submit"> Submit </button>
    </form>';

  //$nim = $_GET['nim'];
  //$jk = $_GET['jk'];
  //$email = $_GET['email'];
  //$umur = $_GET['umur'];

=======
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
    <div class="col s12 m7">
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

  $sql = "UPDATE `user` SET `no_telp`='$no_telp',`nama`='$nama',`alamat`='$alamat',`foto`='$gambar',`password`='$password' WHERE no_telp = $id";

  if ($con->query($sql)) {
    echo "<script>alert('Silahkan login untuk melanjutkan')</script>";
    session_destroy();
    echo '<script>window.location.assign("login.php")</script>';
  }else{
    echo "<script>alert('Gagal mengedit profil')</script>";
  }
}
>>>>>>> komentar
?>
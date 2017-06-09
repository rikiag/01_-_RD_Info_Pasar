<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Register</title>

  <!-- CSS  -->
  <link href="fonts/icon.css" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="grey lighten-4">
  <br>
  <div class="container">
    <div class="row">
      <div class="col s12 m6 offset-m3">
        <div class="card ">
          <div class="card-content">
            <span class="card-title black-text">Sign Up</span>
            <form action="register.php" method="post" enctype="multipart/form-data">
              <div class='row'>
                <div class='input-field col s12'>
                  <input class='validate' type='text' name='nama' />
                  <label for='nama'>Nama</label>
                </div>
              </div>
              <div class='row'>
                <div class='input-field col s12'>
                  <input class='validate' type='text' name='no_telp' />
                  <label for='no_telp'>No.Telpon</label>
                </div>
              </div>
              <div class='row'>
                <div class='input-field col s12'>
                  <input class='validate' type='text' name='alamat' />
                  <label for='alamat'>Alamat</label>
                </div>
              </div>
              <div>
              <select name="level" required>
                <option value="">Pilih Status</option>
                <option value="1">Penjual</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
                <option value="2">Pembeli</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
                <option value="3">Antar Barang</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
              </select>
              </div>
              <div class='row'>
                <div class='input-field col s12'>
                  <input class='validate' type='password' name='password' />
                  <label for='password'>Password</label>
                </div>
              </div>
              <div class="file-field input-field">
                <div class="btn" style="background-color: black; height: 40px">
                  <span>Upload Foto</span>
                  <input type="file" name="file_foto"/>
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
              <center>
                <div class='row'>
                  <input type='submit' value="Daftar" class="col s12 btn btn-large waves-effect indigo" >
                </div>
              </center>
            </form>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--  Scripts-->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

</body>
</html>
<?php 
include 'database.php';
if (isset($_POST['no_telp'])) {
  $nama    = $_POST['nama'];
  $no_telp    = $_POST['no_telp'];
  $level= $_POST['level'];
  $alamat    = $_POST['alamat'];
  $password = $_POST['password'];
  $folder = "images";
  $tmp_name = $_FILES["file_foto"]["tmp_name"];
  $name = $folder."/".$_FILES["file_foto"]["name"];
  move_uploaded_file($tmp_name, $name);

  mysqli_query($con, "INSERT INTO user (no_telp, nama, alamat, level, password, foto) VALUES ('$no_telp','$nama','$alamat','$level','$password', '$name')");
  echo "<script>alert('Silahkan login untuk melanjutkan')</script>";
  echo '<script>window.location.assign("login.php")</script>';
}
?>
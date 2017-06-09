<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Kelompok 1</title>

  <!-- CSS  -->
  <link href="fonts/icon.css" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="grey lighten-4">
  <?php include 'menu.php'; ?>
  <div class="container">
    <div class="section">
      <?php if (isset($_SESSION['status'])): ?>
        <?php if ($_SESSION['level'] == 1 && $_SESSION['id_pasar'] == 0): ?>
          <div class="row">
            <div class="card lighten-5">
              <div class="card-content">
                <b>Anda belum memilih pasar, silahkan pilih pasar.</b>
                <br>Jika pasar anda belum ada, silakan <a href="tambah_pasar.php">Tambah Pasar</a>, lalu memilihnya kembali.
                <hr>
                <br>
                <form action="index.php" method="post">
                  <select name="pasar" required="">
                    <option>-- Pilih Pasar --</option>
                    <?php 
                      $sql = mysqli_query($con, "SELECT * FROM `pasar`");
                      while($data = mysqli_fetch_object($sql)):
                    ?>
                    <option value="<?= $data->id_pasar ?>"><?= $data->nama_pasar ?></option>
                    <?php endwhile; ?>
                  </select>
                  <center>
                    <input type="submit" value="pilih" name="pilih_pasar" class="btn btn-large waves-effect indigo">
                  </center>
                </form>
              </div>
            </div>
          </div>
        <?php endif ?>
        <div class="row">
          <div class="card cyan lighten-5">
            <div class="card-content cyan-text">
              <p class="single-alert">
                <b>Welcome <?= $_SESSION['nama']; ?></b>
                <p>Anda telah login sebagai
                  <?php 
                  if ($_SESSION['level'] == 1) {
                    echo "Pedagang";
                  }
                  elseif ($_SESSION['level'] == 2) {
                    echo "Pembeli";
                  }else{
                    echo "Jasa angkat barang";
                  }
                  ?>
                </p>
              </p>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <!--   Icon Section   -->
      <div class="row">
        <?php 
        $sql = mysqli_query($con, "SELECT * FROM pasar");
        while ($data = mysqli_fetch_object($sql)):
          ?>
        <div class="col s12 m6 l4">
          <div class="card horizontal">
            <div class="card-stacked waves-effect">
              <a href="pasar.php?id=<?= $data->id_pasar ?>"><div class="card-content">
                <h5><?= $data->nama_pasar ?></h5>
                <p><?= $data->alamat_pasar ?></p>
              </div></a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
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
if (isset($_POST['pilih_pasar'])) {
  $id = $_SESSION['no_telp'];
  $pasar = $_POST['pasar'];

  $sql = "UPDATE `user` SET `id_pasar` = '$pasar' WHERE no_telp = $id";

  if ($con->query($sql)) {
    $_SESSION['id_pasar'] = $pasar;
    echo "<script>alert('Selamat menggunakan aplikasi Info Pasar')</script>";
    echo '<script>window.location.assign("index.php")</script>';
  }else{
    echo "<script>alert('Gagal mengedit profil')</script>";
  }
}
?>
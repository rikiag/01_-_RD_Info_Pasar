<?php include "database.php"; ?>
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
<body>
  <?php include 'menu.php'; ?>
  <div class="grey lighten-4">
    <div class="container">
      <div class="section">
        <div class="row">
          <?php 
            $telp = $_GET['telp'];
            $sql = mysqli_query($con,"SELECT * FROM `barang` JOIN barang_user ON barang.id_barang = barang_user.id_barang JOIN user ON user.no_telp = barang_user.no_telp AND user.no_telp = '$telp'");
            while ($data = mysqli_fetch_object($sql)):
          ?>
          <div class="col s12 m6 l4">
            <div class="card horizontal">
              <div class="card-image">
                <img src="images/<?php echo $data->foto_barang; ?>">
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p><?php echo $data->nama_barang; ?></p>
                </div>
                <div class="card-action">
                  <a href="barang.php?id_barang=<?php echo $data->id_barang; ?>">Rp. <?php echo number_format($data->harga_sekarang,2,",","."); ?></a>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
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

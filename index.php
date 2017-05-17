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

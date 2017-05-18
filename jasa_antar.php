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
    <ul class="collection">
      <?php 
        $sql = mysqli_query($con, "SELECT * FROM `user` WHERE level = 3");
        while($data = mysqli_fetch_object($sql)):
      ?>
      <li class="collection-item avatar">
        <img src="<?= $data->foto ?>" alt="" class="circle">
        <span class="title"><?= $data->nama ?></span>
        <p><?= $data->alamat ?> <br><?= $data->no_telp ?></p>
        <a href="tel:<?= $data->no_telp ?>" class="secondary-content"><i class="material-icons">call</i></a>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

</body>
</html>
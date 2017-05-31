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
  <style type="text/css">
    .card {
  overflow: visible;
}
.profile-pic {
  margin-top: -6em;
  z-index: 1;
  position: relative;
}

.profile-pic > img {
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
}

.controls {
  cursor: pointer;
}

.row-menu{
  position:relative;
}

.menu {
  display:none;
  right: 1em;
  top: 1.8em;
  position: absolute;
  background-color: #fff;
  padding-left: 0.8em;
  padding-right: 0.8em;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
}

.menu-list > li {
  margin-bottom: 1em;
  cursor: pointer;
}

.menu-list > li:last-child{
   margin-bottom: -1em;
}

  </style>
</head>
<body class="grey lighten-4">
<?php
  include 'menu.php';
  $id = $_GET['id'];
  $sql = "SELECT * FROM `user` WHERE level = 3 AND no_telp = $id";
  $result = $con->query($sql);
  $data = $result -> fetch_object();
?>
  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col l12 m12 s12">
          <div class="row">
            <div class="col s12">
              <div class="card">
                <div class="card-image">
                  <img src="<?= $data->foto ?>" alt="" />
                </div>
                <div class="card-content">
                  <div class="row">
                  <?php if ($data): ?>
                    <div class="col left controls ">
                      <p class="card-title black-text"><?= $data->nama ?></p>
                      <p><?= $data->alamat ?></p>
                    </div>
                    <div class="col right controls ">
                      <i class="material-icons" onclick='showMenu()'>more_vert</i>
                    </div>
                    <div class="row-menu">
                      <div class="menu">
                        <div class="row">
                          <ul class="menu-list">
                            <li>&nbsp;&nbsp;&nbsp; <a href="tel:<?= $data->no_telp ?>">Panggil</a> &nbsp;&nbsp;&nbsp;</li>
                            <li>&nbsp;&nbsp;&nbsp; <a href="#modal1">Laporkan</a> &nbsp;&nbsp;&nbsp;</li>
                          </ul>
                        </div>
                      </div>
                      <div id="modal1" class="modal">
                        <div class="modal-content">
                          <div class="input-field col s12">
                            <textarea id="textarea1" class="materialize-textarea"></textarea>
                            <label for="textarea1">Keluhan</label>
                          </div>
                        </div>
                        <div class="modal-footer center">
                          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick="Materialize.toast('Terima kasih. Laporan anda akan kami proses.', 5000)">Kirim</a>
                        </div>
                      </div>
                    </div>
                  <?php else: ?>
                    <h1>no data</h1>
                  <?php endif ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
    </div>
  </div>
<!--  Scripts-->
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<script type="text/javascript">
  function showMenu() {
  if ($('.menu').css("display") != "none") {
    $('.menu').css("display", "none");
  }
  else{
     $('.menu').css("display", "block");
    $('.menu').addClass('animated bounceIn');
  }
}
</script>

</body>
</html>

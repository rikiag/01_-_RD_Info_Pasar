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
      <div class="row">
        <div class="card cyan lighten-5">
          <div class="card-content">
          <p>Aplikasi ini dibuat untuk tugas proyek final pada mata kuliah Rekayasa Perangkat Lunak, Jurusan Informatika Universitas Syiah Kuala</p>
          <hr>
          <!-- Modal Trigger -->
          <center>
            <a class="waves-effect waves-light btn" href="#modal1">Kirim Masukan</a>
          </center>

          <!-- Modal Structure -->
          <div id="modal1" class="modal">
            <div class="modal-content">
              <p>Bantu kami mengembangkan aplikasi dengan mengirimkan ide-ide unik anda.</p>
              <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea"></textarea>
                <label for="textarea1">Masukan</label>
              </div>
            </div>
            <div class="modal-footer center">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick="Materialize.toast('Terima kasih. masukan anda sudah kami terima.', 5000)">Kirim</a>
            </div>
          </div>
          </div>
        </div>
        <ul class="collection">
          <li class="collection-item avatar">
            <img src="images/user.ico" alt="" class="circle">
            <span class="title">Riki Agusnaidi</span>
            <p>1608107010053 <br>
            </p>
          </li>
          <li class="collection-item avatar">
            <img src="images/user.ico" alt="" class="circle">
            <span class="title">M. Ilham Surya Alam</span>
            <p>1508107010013 <br>
            </p>
          </li>
          <li class="collection-item avatar">
            <img src="images/user.ico" alt="" class="circle">
            <span class="title">Aida Ristia</span>
            <p>1508107010019 <br>
            </p>
          </li>
          <li class="collection-item avatar">
            <img src="images/user.ico" alt="" class="circle">
            <span class="title">Shinta Keumala Sari</span>
            <p>1508107010029 <br>
            </p>
          </li>
          <li class="collection-item avatar">
            <img src="images/user.ico" alt="" class="circle">
            <span class="title">Annisa Mahfira</span>
            <p>1508107010030 <br>
            </p>
          </li>
          <li class="collection-item avatar">
            <img src="images/user.ico" alt="" class="circle">
            <span class="title">Mahjati Amanda</span>
            <p>1508107010038 <br>
            </p>
          </li>
        </ul>
      </div>
    </div>
  </div>
<!--  Scripts-->
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

</body>
</html>

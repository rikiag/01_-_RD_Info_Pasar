<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Login</title>

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
            <span class="card-title black-text">Lupa Password</span>
            <form>
              <div class='row'>
                <div class='input-field col s12'>
                  <input class='validate' type='text' name='nama' />
                  <label for='nama'>Nama</label>
                </div>
              </div>
              <div class='row'>
                <div class='input-field col s12'>
                  <input class='validate' type='text' name='email' />
                  <label for='email'>No.Telpon</label>
                </div>
              </div>
              <center>
                <div class='row'>
                  <a class="waves-effect waves-light btn" href="#modal1">Kirim</a>
                  <!-- Modal Structure -->
                  <div id="modal1" class="modal">
                    <div class="modal-content">
                    <h4>Pesan</h4>
                    <p>Kami telah mengirimkan password ke nomor telepon anda</p>
                    <p>Silahkan tunggu sebentar..</p>
                  </div>
                  <div class="modal-footer">
                    <a href="login.php" class="modal-action modal-close waves-effect waves-green btn-flat">Oke</a>
                  </div>
                </div>
              </div>
            </center>
          </form>
        <hr>
            <center>
              <a href="login.php">&Lt;Back To Sign In</a>
            </center>
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
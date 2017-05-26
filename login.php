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
            <span class="card-title black-text">Sign In</span>
            <form action="login.php" method="post">
              <div class='row'>
                <div class='input-field col s12'>
                  <input class='validate' type='text' name='email' />
                  <label for='email'>No.Telpon</label>
                </div>
              </div>

              <div class='row'>
                <div class='input-field col s12'>
                  <input class='validate' type='password' name='password' />
                  <label for='password'>Password</label>
                </div>
                <label style='float: right;'>
                  <a class='pink-text' href='forgot.php'><b>Forgot Password?</b></a>
                </label>
              </div>
              <center>
                <div class='row'>
                  <button type='submit' class='col s12 btn btn-large waves-effect indigo'>Login</button>
                </div>
              </center>
            </form>
            <hr>
            <center>
              <a href="register.php">Create account</a>
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
<?php 
  include 'database.php';
  if (isset($_POST['email'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql=mysqli_query($con, "select * from user where no_telp='$email' and password='$password'");
    if(mysqli_num_rows($sql)<1) { 
      echo "<script> alert('Password salah') </script>";
    }

    else{
      $data = mysqli_fetch_object($sql);
      session_start();
      $_SESSION['no_telp']  = $data->no_telp;
      $_SESSION['nama']     = $data->nama;
      $_SESSION['foto']     = $data->foto;
      $_SESSION['alamat']   = $data->alamat;
      $_SESSION['level']    = $data->level;
      $_SESSION['id_pasar'] = $data->id_pasar;
      $_SESSION['status']   = 'login';
      header('location:index.php');
    }
  }
?>
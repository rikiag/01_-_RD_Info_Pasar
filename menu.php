<?php 
include 'database.php';
session_start();
?>
<div class="navbar-fixed">
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container">
      <a href="#" class="brand-logo" data-activates="slide-out">Aplikasi Info Pasar</a>
      <!-- Menu in Desktop mode -->
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>

      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
</div>
<div class="nav-wrapper container">
  <!-- Menu in Mobile mode -->
  <?php if (isset($_SESSION['status'])): ?>

    <ul id="slide-out" class="side-nav">
      <li>
        <div class="userView">
          <div class="background">
            <img src="images/office.jpg">
          </div>
          <a href="#!user"><img class="circle" src="images/yuna.jpg"></a>
          <a href="#!name"><span class="white-text name"><?= $_SESSION['nama']; ?></span></a>
          <a href="#!email"><span class="white-text email"><?= $_SESSION['no_telp']; ?></span></a>
        </div>
      </li>
      <li><a class="waves-effect" href="index.php">Home</a></li>
      <?php if ($_SESSION['level'] == 1): ?>
        <li><a class="waves-effect" href="barang_penjual.php">Barang Saya</a></li>
      <?php endif ?>
      <li><a class="waves-effect" href="#!">Edit Profil</a></li>
      <li><a class="waves-effect" href="#!">Jasa Antar Barang</a></li>
      <li><a class="waves-effect" href="#!">About</a></li>
      <!-- MENU LOGIN LOGOUT -->
      <li><div class="divider"></div></li>
      <?php if (isset($_SESSION['no_telp'])): ?>
        <li><a class="waves-effect" href="logout.php">Logout</a></li>
      <?php else: ?>
        <li><a class="waves-effect" href="login.php">Login</a></li>
      <?php endif; ?>
    </ul>
  <?php else: ?>
    <ul id="slide-out" class="side-nav">
      <li><a class="subheader">Aplikasi Info Pasar</a></li>
      <li><a class="waves-effect" href="index.php">Home</a></li>
      <li><div class="divider"></div></li>
      <li><a class="waves-effect" href="login.php">Login</a></li>
    </ul>
  <?php endif ?>
</div>
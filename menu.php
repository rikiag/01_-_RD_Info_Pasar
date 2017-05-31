<?php 
include 'database.php';
session_start();
?>
<div class="navbar-fixed">
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container">
      <a href="index.php" class="brand-logo" data-activates="slide-out">Aplikasi Info Pasar</a>
      <!-- Menu in Desktop mode -->
      <?php if (isset($_SESSION['status'])): ?>
        <?php if (isset($_SESSION['no_telp'])): ?>
          <ul class="right hide-on-med-and-down">
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?= $_SESSION['nama'] ?><i class="material-icons right">arrow_drop_down</i></a></li>
          </ul>
          <ul id="dropdown1" class="dropdown-content">
            <li><a href="edit.php"><?= $_SESSION['nama'] ?></a></li>
            <li><a href="edit.php">Edit Profil</a></li>
            <li class="divider"></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        <?php endif; ?>
        <?php if ($_SESSION['level'] == 3): ?>
          <ul class="right hide-on-med-and-down"><li><a class="waves-effect" href="rutekerumah.php">Antar Barang</a></li></ul>
        <?php endif ?>
        <ul class="right hide-on-med-and-down"><li><a class="waves-effect" href="about.php">About</a></li></ul>
        <?php if ($_SESSION['level'] == 2): ?>
          <ul class="right hide-on-med-and-down"><li><a class="waves-effect" href="jasa_antar.php">Jasa Antar Barang</a></li></ul>
        <?php endif ?>
        <?php if ($_SESSION['level'] == 1): ?>  
          <ul class="right hide-on-med-and-down"><li><a class="waves-effect" href="barang_penjual.php">Barang Saya</a></li></ul>
          <ul class="right hide-on-med-and-down"><li><a class="waves-effect" href="tambah_barang.php">Tambah Barang</a></li></ul>
        <?php endif ?>        
      <?php else: ?>
      <ul class="right hide-on-med-and-down">
        <li><a href="login.php">Login</a></li>
      </ul>
      <?php endif; ?>
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
          <a href="edit.php"><img class="circle" src="<?= $_SESSION['foto']; ?>"></a>
          <a href="edit.php"><span class="white-text name"><?= $_SESSION['nama']; ?></span></a>
          <a href="edit.php"><span class="white-text email"><?= $_SESSION['no_telp']; ?></span></a>
        </div>
      </li>
      <li><a class="waves-effect" href="index.php">Home</a></li>
      <?php if ($_SESSION['level'] == 1): ?>  
        <li><a class="waves-effect" href="barang_penjual.php">Barang Saya</a></li>
        <li><a class="waves-effect" href="tambah_barang.php">Tambah Barang</a></li>
      <?php endif ?>
      <?php if ($_SESSION['level'] == 2): ?>
        <li><a class="waves-effect" href="jasa_antar.php">Jasa Antar Barang</a></li>
      <?php endif ?>
      <?php if ($_SESSION['level'] == 3): ?>
        <li><a class="waves-effect" href="rutekerumah.php">Antar Barang</a></li>
      <?php endif ?>
      <li><a class="waves-effect" href="about.php">About</a></li>
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
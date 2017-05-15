<?php

  require_once "database.php";//untuk menghubungkan/koneksi dengan database

  $no_telp = $_GET['no_telp'];

  echo $no_telp;

  $sql = "SELECT * FROM user where no_telp = $no_telp";
  $result = $con->query($sql);
  $row = $result -> fetch_assoc();

  echo '
    <form action="proses_edit.php?no_telp='.$row["no_telp"].'" method="post">
        <input type="text" value="'.$row['nama'].'" name="nama" required/>
        <br>
        <input type="text" value="'.$row['no_telp'].'" name="no_telp" disabled =""/>
        <br>
        <input type="text" value="'.$row['alamat'].'" name="alamat" disabled =""/>
        <br>
        <select name="level" required>
          <option value="" selected="selected" disabled ="">'.$row['level'].'</option>
          <option value="1">Penjual</option>
          <option value="2">Pembeli</option>
          <option value="3">Antar Barang</option>
        </select>
        <br>
        <input type="text" value="'.$row['password'].'" name="password" required/>
        <br>
        <input type="text" value="'.$row['foto'].'" name="foto" required/>
        <br>
        <button type="submit"> Submit </button>
    </form>';

  //$nim = $_GET['nim'];
  //$jk = $_GET['jk'];
  //$email = $_GET['email'];
  //$umur = $_GET['umur'];

?>
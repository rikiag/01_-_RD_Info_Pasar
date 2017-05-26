<?php

	require_once "database.php";//untuk menghubungkan/koneksi dengan database

	if (isset($_POST['no_telp'])) {
  		$nama    = $_POST['nama'];
  		$no_telp    = $_POST['no_telp'];
  		$alamat    = $_POST['alamat'];
  		$id_pasar    = $_POST['id_pasar'];
  		$password = $_POST['password'];
  		$foto = $_POST['foto'];

	$sql = "UPDATE user set nama='$nama', no_telp='$no_telp', alamat='$alamat', id_pasar='$id_pasar', password='$password', foto='$foto' where no_telp=$no_telp";

	$result = $con -> query($sql);

	if ($result) 
	{
		echo "<script>confirm('Berhasil ditambahkan') location.replace('halaman_edit.php')</script>";
	}
	else
	{
		echo "gagal edit";	
	}
}

?>
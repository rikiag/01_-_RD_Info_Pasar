<?php

	require_once "database.php";//untuk menghubungkan/koneksi dengan database

	if (isset($_POST['no_telp'])) {
  		$nama    = $_POST['nama'];
  		$no_telp    = $_POST['no_telp'];
  		$alamat    = $_POST['alamat'];
  		$id_pasar    = $_POST['id_pasar'];
  		$password = $_POST['password'];
  		$foto = $_POST['foto'];

	$sql=mysqli_query($con, "INSERT INTO `user`(`no_telp`, `nama`, `alamat`, `level`, `password`, `id_pasar`, `foto`) VALUES ('$no_telp','$nama','$alamat',$level,'$password','$id_pasar,'$foto')");
	

	$result = $con->query($sql);//untuk menjalankan sql diatas

	if($result)
	{
		echo "Data Berhasil Ditambahkan";
	} 

	else
	{
		echo "Gagal Menambahkan";
	}
	}

     $sqli = "SELECT * FROM user";
     $result = $con->query($sqli);
    
     if($result->num_rows>0){

   	echo'
	<table style="border: 1px solid">
		<tr>
			<th style="border: 1px solid">Nama</th>
			<th style="border: 1px solid">No.Telpon</th>
			<th style="border: 1px solid">Alamat</th>
			<th style="border: 1px solid">Pilih Status</th>
			<th style="border: 1px solid">Password</th>
			<th style="border: 1px solid">Upload Foto</th>
			<th style="border: 1px solid">Pilihan</th>
		</tr>
		';
		while($row = $result->fetch_assoc())
		{
			echo'
			<tr>
			<td style="border: 1px solid">'.$row["nama"].'</td>
			<td style="border: 1px solid">'.$row["no_telp"].'</td>
			<td style="border: 1px solid">'.$row["alamat"].'</td>
			<td style="border: 1px solid">'.$row["id_pasar"].'</td>
			<td style="border: 1px solid">'.$row["password"].'</td>
			<td style="border: 1px solid">'.$row["foto"].'</td>
			<td style="border: 1px solid"><a href="edit.php?no_telp='.$row["no_telp"].'">EDIT</a> | <a href="hapus.php?no_telp='.$row["no_telp"].'">DELETE</a></td>
			</tr>
		';
		}
		echo '</table>';
	}
?>
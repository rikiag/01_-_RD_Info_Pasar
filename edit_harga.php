<?php
//mulai proses edit data
//cek dahulu, jika tombol simpan di klik
if(isset($_POST['simpan'])){
 
 //inlcude atau memasukkan file koneksi ke database
 include('koneksi.php');
 
 //jika tombol tambah benar di klik maka lanjut prosesnya
 $id_barang   = $_POST['id_barang']; 
 $nama_barang  = $_POST['nama_barang']; 
 $foto_barang  = $_POST['foto_barang']; 
 $harga_sekarang  = $_POST['harga_sekarang']; 
 $harga_sebelumnya = $_POST['harga_sebelumnya']; 
 
 //melakukan query dengan perintah UPDATE 
 $update = mysql_query("UPDATE barang SET id='$id_barang', nama='$nama_barang', foto='$foto_barang', harga1='$harga_sekarang', harga2='$harga_sebelumnya' WHERE id='$id_barang'") or die(mysql_error());
 
 //jika query update sukses
 if($update){
  
  echo 'Data berhasil di simpan! ';  //Pesan jika proses simpan sukses
  echo '<a href="edit.php?id='.$id.'">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
 }else{
  
  echo 'Gagal menyimpan data! ';  //Pesan jika proses simpan gagal
  echo '<a href="edit.php?id='.$id.'">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
 }
}else{ //jika tidak terdeteksi tombol simpan di klik
 //redirect atau dikembalikan ke halaman edit
 echo '<script>window.history.back()</script>';
}
?>
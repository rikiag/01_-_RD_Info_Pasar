<?php 
if (isset($_GET['id'])) {
	include 'database.php';
	$id = $_GET['id'];
	$id_barang = $_GET['id_barang'];

	$sql = "DELETE FROM `komentar` WHERE id_komentar = $id";
    if ($con->query($sql)) {
    	echo '<script>window.location.assign("barang.php?id_barang='.$id_barang.'")</script>';
    }
    else{
    	echo "<script>alert('Gagal Menghapus komentar')</script>";
    	echo '<script>window.location.assign("barang.php?id_barang='.$id_barang.'")</script>';
    }
}
?>
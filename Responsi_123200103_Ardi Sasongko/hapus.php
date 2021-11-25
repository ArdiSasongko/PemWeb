<?php
//include file config.php
$conn = mysqli_connect("localhost","root","","responsi");

	$sql = mysqli_query($conn, "SELECT * FROM inventaris WHERE kode_barang = '$_GET[kode]'") or die(mysqli_error($conn));
	$data = mysqli_fetch_assoc($sql);
	
	$del = mysqli_query($conn, "DELETE FROM inventaris WHERE kode_barang ='$_GET[kode]'") or die(mysqli_error($conn));

	echo '<script>alert("Berhasil menghapus data."); document.location="daftar.php";</script>';

?>
<?php 

	include "koneksi.php";

	$kd_buku=$_GET['kd_buku'];  

	$hapus = mysqli_query($con, "DELETE FROM tb_buku WHERE kd_buku='$kd_buku'");

	if($hapus) {
	    echo "<script>alert('Data berhasil di hapus!');document.location='buku.php'</script>";
	}else{
	 echo "<script>alert('Data Gagal Di Hapus!');";
	}
?>
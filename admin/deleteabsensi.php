<?php 

	include "koneksi.php";

	$id_absensi=$_GET['id_absensi'];  

	$hapus = mysqli_query($con, "DELETE FROM tb_absensi WHERE id_absensi='$id_absensi'");

	if($hapus) {
	    echo "<script>alert('Data berhasil di hapus!');document.location='absensi.php'</script>";
	}else{
	 echo "<script>alert('Data Gagal Di Hapus!');";
	}
?>
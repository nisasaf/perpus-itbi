<?php 

	include "koneksi.php";

	$nim=$_GET['nim'];  

	$hapus = mysqli_query($con, "DELETE FROM tb_mahasiswa WHERE nim='$nim'");

	if($hapus) {
	    echo "<script>alert('Data berhasil di hapus!');document.location='mahasiswa.php'</script>";
	}else{
	 echo "<script>alert('Data Gagal Di Hapus!');";
	}
?>
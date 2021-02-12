<?php 

	include "koneksi.php";

	$id_user=$_GET['id_user'];  

	$hapus = mysqli_query($con, "DELETE FROM tb_user WHERE id_user='$id_user'");

	if($hapus) {
	    echo "<script>alert('Data berhasil di hapus!');document.location='user.php'</script>";
	}else{
	 echo "<script>alert('Data Gagal Di Hapus!');";
	}
?>
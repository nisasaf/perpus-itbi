<?php 

	include "koneksi.php";

	$id_transaksi=$_GET['id_transaksi'];  

	$hapus = mysqli_query($con, "DELETE FROM tb_transaksi WHERE id_transaksi='$id_transaksi'");

	if($hapus) {
	    echo "<script>alert('Data berhasil di hapus!');document.location='datakembali.php'</script>";
	}else{
	 echo "<script>alert('Data Gagal Di Hapus!');";
	}
?>
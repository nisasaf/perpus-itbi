<?php

	include "koneksi.php"; 

	$kd_buku	= isset($_GET['kd_buku']) ? $_GET['kd_buku'] : "";
	$id_transaksi		    = isset($_GET['id_transaksi']) ? $_GET['id_transaksi'] : "";

	$query = mysqli_query($con,"SELECT * FROM tb_buku where kd_buku='$kd_buku'");
	$data  = mysqli_fetch_array($query);
	$stok  = $data['stok'];
	$sisa  = $stok+1;

	$up_buku=mysqli_query($con, "UPDATE tb_transaksi SET status='Kembali', perpanjang='0' WHERE id_transaksi='$id_transaksi'")or die ("Gagal update".mysqli_error());

	$up_status=mysqli_query($con, "UPDATE tb_buku SET stok='$sisa' WHERE kd_buku='$kd_buku'")or die ("Gagal update".mysqli_error());

	if ($up_status) {

		echo "<script>alert('Buku telah berhasil dikembalikan!'); window.location = 'datapinjam.php'</script>";

	} else {

		echo "<script>alert('Oops! Buku gagal dikembalikan!'); window.location = 'datapinjam.php'</script>";

	}

?>

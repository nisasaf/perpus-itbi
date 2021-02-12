<?php 
	
	include "koneksi.php";

	$id_transaksi	= isset($_GET['id_transaksi']) ? $_GET['id_transaksi'] : "";

	$date = date("d-m-Y");
	$maxpinjam = mktime(0,0,0,date("n"),date("j")+9,date("Y"));
	$kembali = date("d-m-Y", $maxpinjam);

	$query = mysqli_query($con,"SELECT * FROM tb_transaksi where id_transaksi='$id_transaksi'")or die(mysqli_error($con));
	$data = mysqli_fetch_array($query);
	$jumlah = $data['perpanjang'];

	if ($jumlah==1) {

		echo "<script>alert('Perpanjang peminjaman telah mencapai batas! Silahkan kembalikan buku dan meminjam lagi.'); window.location = 'datapinjam.php'</script>";

	} else {

		$perpanjang	= mysqli_query($con, "UPDATE tb_transaksi SET tgl_kembali='$kembali', perpanjang='1' WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($con));

		echo "<script>alert('Perpanjang peminjaman berhasil!'); window.location = 'datapinjam.php'</script>";

	}

 ?>
<?php

include "koneksi.php";

$tgl_pinjam		= isset($_POST['tgl_pinjam']) ? $_POST['tgl_pinjam'] : "";
$tgl_kembali	= isset($_POST['tgl_kembali']) ? $_POST['tgl_kembali'] : "";
$buku			= isset($_POST['judul']) ? $_POST['judul'] : "";
$peminjam		= isset($_POST['nama']) ? $_POST['nama'] : "";
$pisah1			= explode ("~", $buku);
$kd_buku		= $pisah1[0];
$judul			= $pisah1[1];
$pisah2 		= explode("~", $peminjam);
$nim	 		= $pisah2[0];
$nama			= $pisah2[1];

$query = mysqli_query($con,"SELECT * FROM tb_buku where kd_buku='$kd_buku'");
$data = mysqli_fetch_array($query);
$stok = $data['stok'];
$sisa = $stok-1;

if($buku=="" || $judul=="") {

 	echo "<script>alert('Anda belum memilih buku!'); window.location = 'peminjaman.php'</script>";

} elseif ($peminjam=="" || $nama=="") {

 	echo "<script>alert('Anda belum memilih peminjam!'); window.location = 'peminjaman.php'</script>";

} else {

 	if ($stok==0) {

 		echo "<script>alert('Stock buku babis! Harap tunggu pengembalian buku'); window.location = 'peminjaman.php'</script>";

 	} else {

 		$sql = mysqli_query($con, "SELECT  COUNT(nim) FROM tb_transaksi WHERE status='Pinjam' AND nim='$nim' GROUP BY nim");

 		$row = mysqli_fetch_array($sql);
 		$limit = @$row['COUNT(nim)'];


		if ($limit > 1) {

			echo "<script>alert('Transaksi gagal! $nama telah meminjam 2 kali.'); window.location = 'peminjaman.php'</script>";

		} else {

			$insert	= mysqli_query($con, "INSERT INTO tb_transaksi (kd_buku, judul, nim, peminjam, tgl_pinjam, tgl_kembali, status, perpanjang) VALUES ('$kd_buku', '$judul', '$nim', '$nama', '$tgl_pinjam', '$tgl_kembali', 'Pinjam', '0')")or die(mysqli_error($con));

			$update	= mysqli_query($con, "UPDATE tb_buku SET stok='$sisa' WHERE kd_buku='$kd_buku' ")or die(mysqli_error($con));

			echo "<script>alert('Transaksi peminjaman berhasil!'); window.location = 'datapinjam.php'</script>";
					
		}
 	}
}

?>

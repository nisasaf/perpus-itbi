<?php

include "koneksi.php";

$kd_buku      = $_POST['kd_buku'];
$judul        = $_POST['judul'];
$penulis      = $_POST['penulis'];
$tahun		  = $_POST['tahun'];
$penerbit	  = $_POST['penerbit'];
$isbn         = $_POST['isbn'];
$kategori     = $_POST['kategori'];
$jumlah       = $_POST['jumlah'];
$lokasi       = $_POST['lokasi'];
$asal		  = $_POST['asal'];
$tgl_input    = $_POST['tgl_input'];
$foto		  = $_FILES['foto']['name'];

$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', '');  
$x = explode('.', $foto); 
$ekstensi = strtolower(end($x));
$file_tmp = $_FILES['foto']['tmp_name'];   
$angka_acak     = rand(1,999);
$nama_foto = $foto; 

if((!($_FILES['foto']['name']))) {

	$sql = mysqli_query($con, "UPDATE tb_buku SET judul='$judul', penulis='$penulis', tahun='$tahun', penerbit='$penerbit', isbn='$isbn', kategori='$kategori', jumlah='$jumlah', lokasi='$lokasi', asal='$asal', tgl_input='$tgl_input' WHERE kd_buku='$kd_buku'");
	
	echo "<script>alert('Data berhasil diperbarui!');document.location.href = 'buku.php';</script>";

} else if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  { 

	move_uploaded_file($file_tmp, '../gambar/'.$nama_foto); 
	                
	$sql = mysqli_query($con, "UPDATE tb_buku SET judul='$judul', penulis='$penulis', tahun='$tahun', penerbit='$penerbit', isbn='$isbn', kategori='$kategori', jumlah='$jumlah', lokasi='$lokasi', asal='$asal', tgl_input='$tgl_input', foto='$foto' WHERE kd_buku='$kd_buku'");
		
	echo "<script>alert('Data berhasil diperbarui!');document.location.href = 'buku.php';</script>";

} else {
			
	echo "Error: " . $sql . "<br>" . mysqli_error($con);

}
mysqli_close($con);
?>
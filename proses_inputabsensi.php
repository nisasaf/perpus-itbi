<?php
	
	include 'koneksi.php';

	$nama          = $_POST['nama'];
	$nim           = $_POST['nim'];
	$prodi         = $_POST['prodi'];
	$jenjang 	   = $_POST['jenjang'];
	$kelas 	       = $_POST['kelas'];
	$waktu 	       = $_POST['waktu'];
	$semester 	   = $_POST['semester'];
	$tgl_kunjung   = $_POST['tgl_kunjung'];
	$jam_kunjung   = $_POST['jam_kunjung'];

	             
    $sql = "INSERT INTO tb_absensi (nama, nim, prodi, jenjang, kelas, waktu, semester, tgl_kunjung, jam_kunjung) VALUES ('$nama', '$nim', '$prodi', '$jenjang', '$kelas', '$waktu', '$semester', '$tgl_kunjung', '$jam_kunjung')";
	
	if (mysqli_query($con, $sql)) {

		echo "<script>alert('Data sukses ditambahkan!');document.location.href = 'index.php';</script>";

	} else {

		echo "Error: " . $sql . "<br>" . mysqli_error($con);

	}
       
	mysqli_close($con);

?>

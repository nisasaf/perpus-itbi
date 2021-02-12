<?php

include "koneksi.php";

$nim       		= $_POST['nim'];
$nama       	= $_POST['nama'];
$jenis_kelamin 	= $_POST['jenis_kelamin'];
$ttl 			= $_POST['ttl'];
$jenjang	    = $_POST['jenjang'];
$prodi			= $_POST['prodi'];
$kelas			= $_POST['kelas'];
$waktu			= $_POST['waktu'];
$semester		= $_POST['semester'];
$email			= $_POST['email'];
$alamat			= $_POST['alamat'];
$nohp			= $_POST['nohp'];
$foto		    = $_FILES['foto']['name'];

$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', '');  
$x = explode('.', $foto); 
$ekstensi = strtolower(end($x));
$file_tmp = $_FILES['foto']['tmp_name'];   
$angka_acak     = rand(1,999);
$nama_foto = $foto; 

if((!($_FILES['foto']['name']))) {

	$sql = mysqli_query($con, "UPDATE tb_mahasiswa SET nama='$nama', jenis_kelamin='$jenis_kelamin', ttl='$ttl', jenjang='$jenjang', prodi='$prodi', kelas='$kelas', waktu='$waktu', semester='$semester', email='$email', alamat='$alamat', nohp='$nohp' WHERE nim='$nim'");
	
	echo "<script>alert('Data berhasil diperbarui!');document.location.href = 'mahasiswa.php';</script>";

} else if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  { 

	move_uploaded_file($file_tmp, '../gambar/'.$nama_foto); 
	                
	$sql = mysqli_query($con, "UPDATE tb_mahasiswa SET nama='$nama', jenis_kelamin='$jenis_kelamin', ttl='$ttl', jenjang='$jenjang', prodi='$prodi', kelas='$kelas', waktu='$waktu', semester='$semester', email='$email', alamat='$alamat', nohp='$nohp', foto='$foto' WHERE nim='$nim'");
		
	echo "<script>alert('Data berhasil diperbarui!');document.location.href = 'mahasiswa.php';</script>";

} else {
			
	echo "Error: " . $sql . "<br>" . mysqli_error($con);

}
mysqli_close($con);
?>
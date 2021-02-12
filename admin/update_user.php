<?php

include "koneksi.php";

$id_user            = $_POST['id_user'];
$username      = $_POST['username'];
$password      = $_POST['password'];
$nama      	   = $_POST['nama'];
$email 		   = $_POST['email'];
$level		   = $_POST['level'];
$foto		   = $_FILES['foto']['name'];

$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', '');  
$x = explode('.', $foto); 
$ekstensi = strtolower(end($x));
$file_tmp = $_FILES['foto']['tmp_name'];   
$angka_acak     = rand(1,999);
$nama_foto = $foto; 

if((!($_FILES['foto']['name']))) {

	$sql = mysqli_query($con, "UPDATE tb_user SET username='$username', password='$password', nama='$nama', email='$email', level='$level' WHERE id_user='$id_user'");
	
	echo "<script>alert('Data berhasil diperbarui!');document.location.href = 'user.php';</script>";

} else if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  { 

	move_uploaded_file($file_tmp, '../gambar/'.$nama_foto); 
	                
	$sql = mysqli_query($con,"UPDATE tb_user SET username='$username', password='$password', nama='$nama', email='$email', foto='$foto', level='$level' WHERE id_user='$id_user'");
		
	echo "<script>alert('Data berhasil diperbarui!');document.location.href = 'user.php';</script>";

} else {
			
	echo "Error: " . $sql . "<br>" . mysqli_error($con);

}
mysqli_close($con);
?>
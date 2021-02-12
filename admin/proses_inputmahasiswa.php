<?php
	
	include 'koneksi.php';

	$nim       		= $_POST['nim'];
	$nama      		= $_POST['nama'];
	$jenis_kelamin 	= $_POST['jenis_kelamin'];
	$ttl	  		= $_POST['ttl'];
	$jenjang	    = $_POST['jenjang'];
	$prodi			= $_POST['prodi'];
	$kelas			= $_POST['kelas'];
	$waktu			= $_POST['waktu'];
	$semester		= $_POST['semester'];
	$ttl	  		= $_POST['ttl'];
	$email			= $_POST['email'];
	$alamat			= $_POST['alamat'];
	$nohp			= $_POST['nohp'];
	$foto			= $_FILES['foto']['name'];

	if($foto != "") {

		$ekstensi_diperbolehkan = array('png','jpg', 'jpeg');  
		$x 						= explode('.', $foto); 
		$ekstensi 				= strtolower(end($x));
		$file_tmp 				= $_FILES['foto']['tmp_name'];   
		$angka_acak     		= rand(1,999);
		$nama_foto 				= $foto; 

      	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  { 

            move_uploaded_file($file_tmp, '../gambar/'.$nama_foto); 

            $sql = "INSERT INTO tb_mahasiswa (nim, nama, jenis_kelamin, ttl, jenjang, prodi, kelas, waktu, semester, email, alamat, nohp, foto) VALUES ('$nim', '$nama', '$jenis_kelamin', '$ttl', '$jenjang', '$prodi', '$kelas', '$waktu', '$semester', '$email', '$alamat', '$nohp', '$foto')";
	
			if (mysqli_query($con, $sql)) {

		      echo "<script>alert('Data berhasil ditambahkan!');document.location.href = 'mahasiswa.php';</script>";

			} else {

		      echo "Error: " . $sql . "<br>" . mysqli_error($con);

			}
        } else {     

            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, jpeg, atau png.');window.location='inputmahasiswa.php';</script>";
        }
	} else {

		echo "<script>alert('Tidak ada foto! Silahkan unggah ulang fotonya.');window.location='inputmahasiswa.php';</script>";

	}
	mysqli_close($con);

?>

<?php
	
	include 'koneksi.php';

	$username       = $_POST['username'];
	$password       = $_POST['password'];
	$nama 			= $_POST['nama'];
	$email	        = $_POST['email'];
	$foto			= $_FILES['foto']['name'];
	$level          = $_POST['level'];

	if($foto != "") {

		$ekstensi_diperbolehkan = array('png','jpg', 'jpeg');  
		$x = explode('.', $foto); 
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];   
		$angka_acak     = rand(1,999);
		$nama_foto = $foto; 

      	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  { 

            move_uploaded_file($file_tmp, '../gambar/'.$nama_foto); 
                
            $sql = "INSERT INTO tb_user (username, password, nama, email, foto, level) VALUES ('$username', '$password', '$nama', '$email', '$foto', '$level')";
	
			if (mysqli_query($con, $sql)) {

		      echo "<script>alert('Data berhasil ditambahkan!');document.location.href = 'user.php';</script>";

			} else {

		      echo "Error: " . $sql . "<br>" . mysqli_error($con);

			}
        } else {     

             echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, jpeg, atau png.');window.location='inputuser.php';</script>";
        }
	} else {

		echo "<script>alert('Tidak ada foto! Silahkan unggah ulang fotonya.');window.location='inputuser.php';</script>";

	}
	mysqli_close($con);

?>

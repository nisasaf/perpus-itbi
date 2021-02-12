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

	if($foto != "") {

		$ekstensi_diperbolehkan = array('png','jpg', 'jpeg');  
		$x = explode('.', $foto); 
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];   
		$angka_acak = rand(1,999);
		$nama_foto = $foto; 

      	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  { 

            move_uploaded_file($file_tmp, '../gambar/'.$nama_foto); 
                
        	$query = "INSERT INTO tb_buku (kd_buku, judul, penulis, tahun, penerbit, isbn, kategori, jumlah, lokasi, asal, tgl_input, stok, foto) VALUES ('$kd_buku', '$judul', '$penulis', '$tahun', '$penerbit', '$isbn', '$kategori', '$jumlah', '$lokasi', '$asal', '$tgl_input', '$jumlah', '$foto')";
	
			if (mysqli_query($con,$query)) {

		    	echo "<script>alert('Data berhasil ditambahkan!');document.location.href = 'buku.php';</script>";

			} else {

		    	echo "Error: " . $query . "<br>" . mysqli_error($con);

			}
        } else {     

            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, jpeg atau png.');window.location='inputbuku.php';</script>";
        }
	} else {

		echo "<script>alert('Tidak ada foto! Silahkan unggah ulang fotonya.');window.location='inputbuku.php';</script>";

	}
	mysqli_close($con);

?>
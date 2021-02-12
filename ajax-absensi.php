<?php
include 'koneksi.php';
$nim = $_GET['nim'];
$query = mysqli_query($con, "SELECT * FROM tb_mahasiswa WHERE nim= '$nim'");
$paket = mysqli_fetch_array($query);
$data = array(
            'nama'      	=>  $paket['nama'],
            'prodi'    		=>  $paket['prodi'],
        	'kelas'    		=>  $paket['kelas'],
    		'waktu'    		=>  $paket['waktu'],
			'semester'    	=>  $paket['semester'],
			'jenjang'    	=>  $paket['jenjang'],);
			
 echo json_encode($data);
?>
<?php 
include "koneksi.php";

$nim = mysqli_real_escape_string($con, $_POST['nim']);
$sql = mysqli_query($con, "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'");
$num = mysqli_num_rows($sql);
	if($num == 1){
		echo "<div>&#x274C; NIM ini sudah ada</div>";
	}
?>

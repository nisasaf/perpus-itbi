<?php 
include "koneksi.php";

$unem = mysqli_real_escape_string($con, $_POST['username']);
$sql = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$unem'");
$num = mysqli_num_rows($sql);
	if($num == 1){
		echo "<div>&#x274C; Username sudah ada</div>";
	}
?>

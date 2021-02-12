<?php 

	include "koneksi.php";

	session_start();

	$username = $_POST['username'];
	$pass     = $_POST['password'];

	$login 	= mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$username' AND password='$pass'");
	$row 	= mysqli_fetch_array($login);

	if ($row['username'] == $username AND $row['password'] == $pass) {
		
		if($row['level']=="Admin"){

			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['nama'] 	  = $row['nama'];
	    	$_SESSION['foto'] 	  = $row['foto'];

			header('location:admin/beranda.php');

		}else if($row['level']=="User"){

			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['nama'] 	  = $row['nama'];
	    	$_SESSION['foto'] 	  = $row['foto'];

			header('location:user/beranda.php');

		} else {

			header('location:login.php');
		}

	} else {  
		
		header('location:login.php');

  	}

 ?>
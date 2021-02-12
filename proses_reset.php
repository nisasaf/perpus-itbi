<?php
	session_start();
	require_once 'koneksi.php';
	if (isset($_POST['submit'])) 
	{
		$username = $_POST['username'];
		$user = mysqli_query($con, "SELECT username FROM tb_user WHERE username = '$username' ");
		
		if (mysqli_num_rows($user) == 1 ) {
			$password   = $_POST['password'];
			$repassword = $_POST['repassword'];
			if($password != $repassword)
			{
				?>
					<script>
						alert("Inputan password tidak sama");
						window.location.href = 'changepassword.php';
					</script>
				<?php

			}else{

				$pass = $password;
				$sql = mysqli_query($con, "UPDATE tb_user SET password = '$pass' WHERE username = '$username' ");
				if ($sql) 
				{
					?>
						<script>
							alert("Password telah di perbarui");
							window.location.href = 'login.php';
						</script>
					<?php
				}else
				{
					?>
						<script>
							alert("Password gagal diperbaharui");
							window.location.href = 'changepassword.php';
						</script>
					<?php
				}
			}
		}else{
			?>
				<script>
					alert("Pastikan username yang anda masukan benar!");
					window.location.href = 'changepassword.php';
				</script>
			<?php
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>IT&BI LIBRARY | Perpustakaan Institut Teknologi & Bisnis Indonesia</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width. initial-scale=1.0">
	<link rel="shortcut icon" href="gambar/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="fa/css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="logstyles.css">
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light fixed-top">
  		<a class="navbar-brand px-5 py-2 mx-4" href="#"><img alt="Logo ITBI" src="gambar/logo.png" class="img-responsive">IT&BI LIBRARY</a>
	</nav><hr>

	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="card card-custom">
					<div class="card-heading pt-5 pb-3 px-5">
						<h4><a href="login.php"><span  class="cursor-pointer"><i class="fas fa-angle-left angle-left-color mr-4"></i></span></a>RESET PASSWORD</h4>
						<p>Please enter your Username and Password below</p>
					</div>

					<div class="card-body pb-5 pt-0">
						<form class="form-horizontal" action="proses_reset.php" method="POST">
							<div class="form-group">
								<div class="col-md-12 p-0">
									<div class="form-label-group">
									    <input type="text" id="username" name="username" class="form-control px-4" placeholder="Username" required>
									    <label for="username" class="px-4 text-muted">Username</label>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12 p-0">
									<div class="form-label-group">
									    <input type="password" id="password" name="password" class="form-control px-4" placeholder="New Password" required>
									    <label for="password" class="px-4 text-muted">New Password</label>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12 p-0">
									<div class="form-label-group">
									    <input type="password" id="repassword" name="repassword" class="form-control px-4" placeholder="Confirm New Password" required>
									    <label for="password" class="px-4 text-muted">Confirm New Password</label>
									</div>
								</div>
							</div>
							<input type="submit" class="btn btn-login mt-4" name="submit" value="RESET">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="fa/js/all.min.js"></script>
<div class="footer">
	<div class="col-md-12 p-0">
		<p><center>&copy; 2020 . INSTITUT TEKNOLOGI & BISNIS INDONESIA </center></p>
	</div>
</div>
</html>
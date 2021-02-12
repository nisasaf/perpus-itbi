<?php

 	session_start();
	
 	if(empty($_SESSION['username']) AND empty($_SESSION['password'])){
		
 	header("location:../login.php");
	} else {
		include "koneksi.php";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>IT&BI LIBRARY | Perpustakaan Institut Teknologi & Bisnis Indonesia</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../gambar/favicon.ico">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../fa/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="d-flex" id="wrapper">
		<div id="sidebar-wrapper">
      		<div class="sidebar-heading">
      			<a class="navbar-brand navbar-brand-sidebar" href="beranda.php"><img alt="Logo ITBI" src="../gambar/logo.png" class="img-responsive">IT&BI LIBRARY</a>
      		</div>
      			<div class="list-group list-group-flush">
      				<div class="profile pt-5 px-4 pb-0">
      					<h6 class="mb-3"><b>USER</b></h6>
						<img src="../gambar/<?php echo $_SESSION['foto']; ?>" class="rounded-circle img-resp">
						<p class="name-resp m-0"><?php echo $_SESSION['nama']; ?></p>
					</div>
      				<ul>
						<li>
							<a href="beranda.php">
								<span class="icon"><i class="fas fa-home"></i></span>
			                	<span >Dashborad</span>
			                </a>
			            </li>
						<li class="active">
							<a href="user.php">
								<span class="icon"><i class="fas fa-user"></i></span>
			                	<span>User</span>
			                </a>
			            </li>
			            <li>
							<a href="buku.php">
								<span class="icon"><i class="fas fa-book"></i></span>
			                	<span>Buku</span>
			                </a>
						</li>
						 <li>
							<a href="mahasiswa.php">
								<span class="icon"><i class="fas fa-user-graduate"></i></span>
			                	<span>Mahasiswa</span>
			                </a>
						</li>
						 <li>
							<a href="absensi.php">
								<span class="icon"><i class="fas fa-book-open"></i></span>
			                	<span>Absensi</span>
			                </a>
						</li>
						<li>
							<a href="#submenu" data-toggle="collapse" aria-expanded="false" aria-controls="submenu">
								<span class="icon"><i class="fas fa-database"></i></span>
			                	<span class="ttr-label">Data Transaksi</span>
			                	<span class="pr-1"><i class="fas fa-angle-down"></i></span>
			                </a>
			             	<ul class="collapse multi-collapse p-0" id="submenu">
			                	<li class="boder-none">
			                		<a href="datapinjam.php"><span>Data Peminjaman</span></a>
			                		<a href="datakembali.php"><span>Data Pengembalian</span></a>
			                	</li>
			                </ul>
			            </li>  
			            <li>
							<a href="laporan.php">
								<span class="icon"><i class="fas fa-layer-group"></i></span>
			                	<span>Laporan</span>
			                </a>
			            </li> 
					</ul>
					
      			</div>
      			<div class="logout">
      				<a href="../logout.php" class="btn btn-outline-danger btn-logout" onclick="return confirm('Apakah kamu yakin ingin keluar?')">Log Out</a>
      			</div>
      		</div>

      		<div id="page-content-wrapper">
	      		<nav class="navbar navbar-expand-md navbar-light">
			  		<button class="btn btn-default btn-sidebar btn-sm" id="menu-toggle">
			  			<span></span>
						<span></span>
						<span></span>
			  		</button>
			  		<a class="navbar-brand navbar-brand-nav" href="beranda.php"><img alt="Logo ITBI" src="../gambar/logo.png" class="img-responsive">IT&BI LIBRARY</a>

			  		<div class="collapse navbar-collapse">
			          	<ul class="navbar-nav nav-right ml-auto mt-2 mt-lg-0">
			            	<li class="nav-item dropdown">
			            		<li><a href=""><img src="../gambar/<?php echo $_SESSION['foto']; ?>" class="rounded-circle" ></a></li>
			              		<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="mx-2 text-dark"><?php echo $_SESSION['nama']; ?></span></a>
			              		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
			                		<a class="dropdown-item" href="../logout.php">Log Out</a>
			              		</div>
			            	</li>
			          	</ul>
			        </div>
				</nav>

				<div class="container-fluid px-0">
					<div class="col-md-12">
						<div><br>
							<ul class="breadcrumb m-0 mb-1">
								<li class="breadcrumb-item"><a href="beranda.php">DASHBOARD</a></li>
								<li class="breadcrumb-item"><a href="user.php">USER</a></li>
								<li class="breadcrumb-item active">FORM DATA USER</li>
							</ul>
						</div>
					</div>

					<div class="col-md-12">
						<div class="card">
							<div class="card-body px-4 py-5">
								<div class="form-body">
									<div class="form-head">
										<h4 class="mt-2">FORM USER</h4>
										<p class="mb-1">Silahkan input data baru di sini</p>
									</div>
									<div class="row">
										<div class="col-md-12">
											<form class="form-horizontal mx-5" action="proses_inputuser.php" method="POST" enctype="multipart/form-data">
												<div class="row">
													<div class="col-md-6 mt-3">
														<label for="username">Username</label>
														<input type="text" class="form-control" name="username" id="username" required oninvalid="this.setCustomValidity('Username tidak boleh kosong.')" oninput="setCustomValidity('')">
														<span id="pesan"></span>
													</div>

													<div class="col-md-6 mt-3">
														<label for="password">Password</label>
														<input type="text" class="form-control" name="password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong.')" oninput="setCustomValidity('')">
													</div>
												</div>

												<div class="row">
													<div class="col-md-6 mt-3">
														<label for="nama">Nama</label>
														<input type="text" class="form-control" name="nama" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong.')" oninput="setCustomValidity('')">
													</div>
													
													<div class="col-md-6 mt-3">
														<label for="email">E-Mail</label>
														<input type="text" class="form-control" name="email" required oninvalid="this.setCustomValidity('E-mail tidak boleh kosong.')" oninput="setCustomValidity('')">
													</div>
												</div>

												<div class="row">
													<div class="col-md-6 mt-3">
														<label for="foto">Foto</label>
														<div class="d-block my-2">
															<input type="file" name="foto">
															<small id="foto" class="form-text text-muted">* Foto wajib diunggah</small>
														</div>
													</div>

													<div class="col-md-6 mt-3">
														<label for="level">Level</label>
														<div class="my-2">
	          												<div class="custom-control custom-radio d-inline">
																<input class="custom-control-input" name="level" value="Admin" type="radio" checked>
																<label class="custom-control-label mr-3" for="level">Admin</label>
															</div>
															<div class="custom-control custom-radio d-inline">
																<input class="custom-control-input" name="level" value="User" type="radio">
																<label class="custom-control-label" for="level">User</label>
															</div>
														</div>
													</div>
												</div>

												<br>
												<div class="d-flex my-3">
													<a href="user.php" type="button" class="btn btn-outline-success btn-md btn-form mr-3" name="batal">Batal</a>
													<input type="submit" class="btn btn-success btn-md btn-form" name="submit" value="Simpan">
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../fa/js/all.min.js"></script>
<script>
	$(document).ready(function(){
		$('#username').blur(function(){
			$('#pesan').html('');
			var username = $(this).val();

			$.ajax({
				type	: 'POST',
				url 	: 'cekusername.php',
				data 	: 'username='+username,
				success	: function(data){
					$('#pesan').html(data);
				}
			})

		});
	});
</script>
<script>
    $("#menu-toggle").click(function(e) {
      	e.preventDefault();
      	$("#wrapper").toggleClass("toggled");
    });
</script>
</body>
<div class="footer">
	<div class="col-md-12 p-0">
		<p><center>&copy; 2020 . INSTITUT TEKNOLOGI & BISNIS INDONESIA </center></p>
	</div>
</div>
</html>
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
						<li class="active">
							<a href="beranda.php">
								<span class="icon"><i class="fas fa-home"></i></span>
			                	<span >Dashborad</span>
			                </a>
			            </li>
						<li>
							<a href="profil.php">
								<span class="icon"><i class="fas fa-user"></i></span>
			                	<span>Profil</span>
			                </a>
			            </li>
			            <li>
							<a href="peminjaman.php">
								<span class="icon"><i class="fas fa-book"></i></span>
			                	<span>Peminjaman</span>
			                </a>
						</li>
						 <li>
							<a href="history.php">
								<span class="icon"><i class="fas fa-history"></i></span>
			                	<span>Riwayat Pinjam</span>
			                </a>
						</li>
						 <li>
							<a href="kartu.php">
								<span class="icon"><i class="fas fa-id-card"></i></span>
			                	<span>Kartu</span>
			                </a>
						</li>
					</ul>
					
      			</div>
      			<div class="logout"><a href="../logout.php" class="btn btn-outline-danger btn-logout" onclick="return confirm('Apakah kamu yakin ingin keluar?')">Log Out</a></div>
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
							</ul>
						</div>
					</div>

					<div class="col-md-12">
						<div class="row">
							<div class="col-6 col-sm-6 col-md-6">
								<div class="card bg-danger card-featured">
									<div class="card-body card-body-featured px-4">
										<div class="featured-list d-flex justify-content-between">
											<a href="peminjaman.php"><i class="fas fa-user-graduate"></i></a>
											<span class="badge badge-warning"><h3 class="badge-warning">2</h3></span>
										</div>
										<div class="featured-list">
											<h3>DATA PEMINJAMAN</h3>
										</div>
									</div>
									<div class="card-footer d-flex align-items-center justify-content-between px-4">
					                	<a class="small text-white stretched-link" href="mahasiswa.php">View Details</a>
					                	<div class="small text-white"><i class="fas fa-angle-right"></i></div>
					              	</div>
								</div>
							</div>

							<div class="col-6 col-sm-6 col-md-6">
								<div class="card card-featured" style="background-color: #ed8d14;">
									<div class="card-body card-body-featured px-4">
										<div class="featured-list d-flex justify-content-between">
											<a href="history.php"><i class="fas fa-chart-bar"></i></a>
											<span class="badge badge-warning"><h3 class="badge-warning">2</h3></span>
										</div>
										<div class="featured-list">
											<h3>RIWAYAT PEMINJAMAN</h3>
										</div>
									</div>
									<div class="card-footer d-flex align-items-center justify-content-between px-4">
					                	<a class="small text-white stretched-link" href="absensi.php">View Details</a>
					                	<div class="small text-white"><i class="fas fa-angle-right"></i></div>
					              	</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="card card-welcome">
							<div class="card-body px-4">
								<h5>Selamat Datang di</h5>
								<h4>Sistem Informasi Manajemen Perpustakaan</h4>
								<h2>INSTITUT TEKNOLOGI & BISNIS INDONESIA</h2>
								<p class="m-0">Anda sedang Login sebagai <?php echo $_SESSION['nama']; ?><br><br></p>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="card pb-4">
									<div class="card-header">
										<h5>Profil</h5>
									</div>
									<div class="card-body pt-0">
										<?php
											$username = $_SESSION['username'];
			                                $notif = mysqli_query($con, "SELECT * FROM tb_mahasiswa WHERE nim='$username'");
			                                while($data1 = mysqli_fetch_array($notif)){
			                                $implode1 = array($data1['kelas'], $data1['waktu']);
											$a = implode(" ", $implode1);
											$implode2 = array('Semester', $data1['semester']);
											$b = implode(" ", $implode2);
											$implode3 = array($a, $b);
			           	                ?>
			           	                <ul class="list-group list-style">
											<div class="row">
												<div class="col-5 col-sm-5 col-md-5">
					                                <li>
					                                     <br><img class="img-profil-beranda" width="150" src="../gambar/<?php echo $_SESSION['foto']; ?>">
					                                </li>
					                            </div>
					                            <div class="col-7 col-sm-7 col-md-7 pl-0 member-card">
			                                		<li class="member-card">
			                                			<br>
			                                			<h5 class="m-0 profile-name"><?php echo $data1['nama']; ?></h5>
			                                			<p class="my-1 profile-id"><b><?php echo $data1['nim']; ?></b></p><br>
			                                			<p class="my-1"><?php echo $data1['prodi']; ?> - <?php echo $data1['jenjang']; ?></p>
			                                			<p class="my-1"><?php echo implode("/", $implode3); ?></p>
			                                			<p class="my-1"><?php echo $data1['alamat']; ?></p>
			                                		</li>
			                                	</div>
			                                </div>
			                            </ul>							
			                        </div>
			                        <div class="card-footer d-flex align-items-center justify-content-between px-4">
					                	<a class="small text-dark stretched-link" href="profil.php">View Details</a>
					                	<div class="small text-dark"><i class="fas fa-angle-right"></i></div>
					              	</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="card pb-4">
									<div class="card-header"><h5>Kartu Anggota</h5></div>
									<div class="card-body pt-0">
										<ul class="list-group list-style">
											<div class="row">
												<div class="col-5 col-sm-5 col-md-5">
					                                <li>
					                                     <br><img class="img-profil-beranda" width="150" src="../gambar/card.jpg">
					                                </li>
					                            </div>

					                            <div class="col-7 col-sm-7 col-md-7 pl-0">
			                                		<li>
			                                			<br>
			                                			<h5 class="my-1 mx-0 mt-0 card-title">KARTU PERPUSTAKAAN</h5>
			                                			<p class="my-1 card-name"><b>INSTITUT TEKNOLOGI DAN BISNIS INDONESIA</b></p><br>
			                                			<p class="mb-1"><?php echo $data1['nama']; ?></p>
			                                			<p class="my-1"><?php echo $data1['prodi']; ?> - <?php echo $data1['jenjang']; }?></p>
			                                			<p class="my-1">Berlaku: <b><?php echo date('Y'); ?></b></p>
			                                		</li>
			                                	</div>
			                                </div>
			                            </ul>
									</div>
									<div class="card-footer d-flex align-items-center justify-content-between px-4">
					                	<a class="small text-dark stretched-link" href="kartu.php">View Details</a>
					                	<div class="small text-dark"><i class="fas fa-angle-right"></i></div>
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
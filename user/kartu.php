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
						<li class="active">
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
								<li class="breadcrumb-item active">KARTU ANGGOTA</li>
							</ul>
						</div>
					</div>

					<div class="col-md-12">
						<div class="card">
							<div class="card-body p-4">
								<div class="alert alert-info"><div class="btn btn-warning btn-lg btn-add-data btn-label"><i class="fas fa-id-card mr-2"></i>Kartu Tanda Anggota</div></div>
								<div class="row">
									<div class="col-sm-12 col-md-7">
										<div class="card">
											<div class="card-header card-head-grey">	
												<li class="list-group card-head">
													<h4 class="m-0"><center><b>KARTU TANDA ANGGOTA</b></center></h4>
													<h5 class="m-0"><center><b>PERPUSTAKAAN</b></center></h5>
													<h6 class="m-0"><center><b>INSTITUT TEKNOLOGI DAN BISNIS INDONESIA</b></center></h6>
												</li>
											</div>
											<div class="card-body py-4">
												<table class="table">
													<?php 
														$username  = $_SESSION['username'];
														$query = mysqli_query($con, "SELECT * FROM tb_mahasiswa WHERE nim='$username'")or die(mysqli_error());
														while($data = mysqli_fetch_array($query)){
													 ?>
													<tr>
														<td class="td-bold" width="150">NIM</td>
														<td>:</td>
														<td><?php echo $data['nim']; ?></td>
													</tr>
													<tr>
														<td class="td-bold" width="150">Nama Lengkap</td>
														<td>:</td>
														<td><?php echo $data['nama']; ?></td>
													</tr>
													<tr>
														<td class="td-bold" width="150">Tanggal Lahor</td>
														<td>:</td>
														<td><?php echo $data['jenis_kelamin']; ?></td>
													</tr>
													<tr>
														<td class="td-bold" width="150">Tahun</td>
														<td>:</td>
														<td><?php echo date('Y'); ?></td>
													</tr>
													<tr>
														<td class="td-bold" width="150">Alamat</td>
														<td>:</td>
														<td><?php echo $data['alamat']; ?></td>
													</tr>
													<?php 
														}
													 ?>
												</table>
					                            <div class="card-footer bg-grey">
					                        		<div class="text-right">
					                        			<p class="my-1">Medan, <?php echo date('d'); ?> Agustus <?php echo date('Y'); ?> </p>
					                        			<p class="my-1">Ka. Bid. Perpustakaan</p>
					                        			<br>
					                        			<p class="my-2"><b>Rahma Ninda</b></p>
					                        		</div>
					                            </div>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-md-5">
										<br>
										<h4><center><b>Peraturan Peminjaman</b></center></h4>
										<hr class="bg-grey">
										<div class="row">
											<div class="col-xs-11 col-sm-11 col-md-11">
												<ul class="list-style text-justify line-height">
												<li>Buku hanya dapat dipinjam oleh pemegang Kartu Tanda Anggota Perpustakaan</li>
												<li>Buku hanya dapat dipinjam selama 7 hari.</li>
												<li>Keterlambatan pada pengembalian, dikenakan denda Rp 1000.</li>
												<li>Maksimal perpanjang peminjaman dalam waktu yang berdekatan hanya 1 kali.</li>
												<li>Buku-buku kategori tertentu tidak dapat dipinjamkan.</li>
												<li>Buku yang rusak/hilang adalah tanggung jawab peminjam.</li>
											</ul>
											</div>
										</div>
										<hr class="bg-grey">
										<div class="row">
											<div class="col-md-1">
												
											</div>
											<div class="col-md-11">
												<h6>Kartu tanda anggota ini hanya berlaku tahun: <b><h5><?php echo date('Y'); ?>2020</b></h5></h6>
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
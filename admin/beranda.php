<?php

 	session_start();
	
 	if(empty($_SESSION['username']) AND empty($_SESSION['password'])){
		
 	header("location:../login.php");
	} else {
		include "koneksi.php";
	}
?>

<?php 
	include "koneksi.php";
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
								<li><a href="beranda.php">DASHBOARD</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-12">
						<div class="row">
							<div class="col-6 col-sm-6 col-md-3">
								<div class="card bg-success card-featured">
									<div class="card-body card-body-featured px-4">
										<div class="featured-list d-flex justify-content-between">
											<a href="buku.php"><i class="fas fa-book"></i></a>
											<?php  
												$query = mysqli_query($con, "SELECT * FROM tb_buku");
												$buku  = mysqli_num_rows($query);
											?>
											<span class="badge badge-warning"><h3 class="badge-warning"><?php echo $buku; ?></h3></span>
										</div>
										<div class="featured-list">
											<h3>BUKU</h3>
										</div>
									</div>
									<div class="card-footer d-flex align-items-center justify-content-between px-4">
					                	<a class="small text-white stretched-link" href="buku.php">View Details</a>
					                	<div class="small text-white"><i class="fas fa-angle-right"></i></div>
					              	</div>
								</div>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<div class="card bg-danger card-featured">
									<div class="card-body card-body-featured px-4">
										<div class="featured-list d-flex justify-content-between">
											<a href="mahasiswa.php"><i class="fas fa-user-graduate"></i></a>
											<?php  
												$query = mysqli_query($con, "SELECT * FROM tb_mahasiswa");
												$mahasiswa  = mysqli_num_rows($query);
											?>
											<span class="badge badge-warning"><h3 class="badge-warning"><?php echo $mahasiswa; ?></h3></span>
										</div>
										<div class="featured-list">
											<h3>MAHASISWA</h3>
										</div>
									</div>
									<div class="card-footer d-flex align-items-center justify-content-between px-4">
					                	<a class="small text-white stretched-link" href="mahasiswa.php">View Details</a>
					                	<div class="small text-white"><i class="fas fa-angle-right"></i></div>
					              	</div>
								</div>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<div class="card card-featured" style="background-color: #3d92c4;">
									<div class="card-body card-body-featured px-4">
										<div class="featured-list d-flex justify-content-between">
											<a href="datapinjam.php"><i class="fas fa-database"></i></a>
											<?php  
												$query = mysqli_query($con, "SELECT * FROM tb_transaksi");
												$pinjam  = mysqli_num_rows($query);
											?>
											<span class="badge badge-warning"><h3 class="badge-warning"><?php echo $pinjam; ?></h3></span>
										</div>
										<div class="featured-list">
											<h3>PEMINJAMAN</h3>
										</div>
									</div>
									<div class="card-footer d-flex align-items-center justify-content-between px-4">
					                	<a class="small text-white stretched-link" href="datapinjam.php">View Details</a>
					                	<div class="small text-white"><i class="fas fa-angle-right"></i></div>
					              	</div>
								</div>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<div class="card card-featured" style="background-color: #ed8d14;">
									<div class="card-body card-body-featured px-4">
										<div class="featured-list d-flex justify-content-between">
											<a href="absensi.php"><i class="fas fa-chart-bar"></i></a>
											<?php 
												$date        = date("Y/m/d"); 
												$query       = mysqli_query($con, "SELECT * FROM tb_absensi WHERE tgl_kunjung='$date'");
												$absensi  = mysqli_num_rows($query);
											?>
											<span class="badge badge-warning"><h3 class="badge-warning"><?php echo $absensi; ?></h3></span>
										</div>
										<div class="featured-list">
											<h3>ABSENSI</h3>
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
							<div class="col-md-8">
								<div class="card">
									<div class="card-header">
										<h5>Grafik Pengunjung Perpustakaan</h5>
									</div>
									<div class="card-body pt-3">
										<br>
										<canvas id="myChart"></canvas>
										<br>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="card">
									<div class="card-header"><h5>Pemberitahuan</h5></div>
									<div class="card-body">
										<?php
			                            	$notif = mysqli_query($con, "SELECT * FROM tb_mahasiswa ORDER BY nim DESC LIMIT 1");
			                                while($data2 = mysqli_fetch_array($notif)){
			                            ?>
			                                <div class="alert alert-block alert-danger">
			                                    <button data-dismiss="alert" class="close close-sm" type="button">
			                                        <i class="fa fa-times"></i>
			                                    </button>
			                                    <strong><?php echo $data2['nama'];?></strong>, Telah terdaftar menjadi anggota perpustakaan.
			                                </div>
			                            <?php } ?>
			                                                    
			                            <?php
			                                $notif = mysqli_query($con, "SELECT * FROM tb_transaksi ORDER BY id_transaksi DESC LIMIT 1");
			                                while($data3 = mysqli_fetch_array($notif)){
			           	                ?>
			                                <div class="alert alert-success">
			                                    <button data-dismiss="alert" class="close close-sm" type="button">
			                                        <i class="fa fa-times"></i>
			                                    </button>
			                                    <strong><?php echo $data3['peminjam']; ?></strong>, Baru saja meminjam buku di IT&BI LIBRARY. 
			                                </div>
			                            <?php } ?>

			                            <?php
			                            	$notif = mysqli_query($con, "SELECT * FROM tb_buku ORDER BY kd_buku DESC LIMIT 1");
			                                while($data2 = mysqli_fetch_array($notif)){
			                            ?>
			                                <div class="alert alert-info">
			                                    <button data-dismiss="alert" class="close close-sm" type="button">
			                                        <i class="fa fa-times"></i>
			                                    </button>
			                                    <strong><?php echo $data2['judul'];?></strong>, Buku bacaan baru yang ada di IT&BI LIBRARY. 
			                                </div>
			                            <?php } ?>
			                                                    
			                            <?php
			                                $notif = mysqli_query($con, "SELECT * FROM tb_absensi ORDER BY id_absensi DESC LIMIT 1");
			                                while($data3 = mysqli_fetch_array($notif)){
			           	                ?>
			                                <div class="alert alert-warning">
			                                    <button data-dismiss="alert" class="close close-sm" type="button">
			                                        <i class="fa fa-times"></i>
			                                    </button>
			                                    <strong><?php echo $data3['nama']; ?></strong>, Baru saja mengisi daftar hadir di IT&BI LIBRARY.
			                                </div>
			                            <?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="card">
									<div class="card-header"><h5>Anggota Baru</h5></div>
									<div class="card-body">
										<?php
			                                $notif = mysqli_query($con, "SELECT * FROM tb_mahasiswa ORDER BY nim DESC LIMIT 3");
			                                while($data1 = mysqli_fetch_array($notif)){
			           	                ?>
			                            <ul class="list-group teammates">
			                                <li class="list-group-item list-style-member">
			                                    <img src="../gambar/<?php echo $data1['foto']; ?>" width="50" height="50" class="img-member">
			                                    <?php echo $data1['nama']; ?>
			                                </li>
			                            </ul>
			                            <?php  } ?>
			                            <div class="card-footer bg-light">
			                                <a href="mahasiswa.php" class="btn btn-sm btn-info btn-member">Data Anggota<i class="fa fa-plus ml-2"></i></a>
			                            </div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="card">
									<div class="card-header"><h5>Buku di IT&BI LIBRARY</h5></div>
									<div class="card-body">
										<div>
			                                <ul class="ul-style">
			                                 	<?php
			                                		$notif = mysqli_query($con, "SELECT * FROM tb_buku ORDER BY kd_buku DESC LIMIT 5");
			                                		while($data6 = mysqli_fetch_array($notif)){
			           	                		?>
			                                    <li class="li-style">            
			                                        <div>
			                                            <span class="book-title"><?php echo $data6['judul']; ?></span>
			                                            <span class="badge badge-primary badge-sm"><?php echo $data6['tahun']; ?></span>
			                                            <div class="float-check">
			                                                <button class="btn btn-success btn-sm btn-xs"><i class="fa fa-check icon-check"></i></button>
			                                            </div>
			                                        </div>
			                                    </li>
			                                    <?php } ?>
			                                </ul>
			                            </div>
			                            <div class="card-footer bg-light">
			                                <a href="buku.php" class="btn btn-sm btn-warning btn-book">Lihat Buku<i class="fa fa-plus ml-2"></i></a>
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
<script type="text/javascript" src="../plugins/Chart.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
      	e.preventDefault();
      	$("#wrapper").toggleClass("toggled");
    });
</script>
<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ["Akuntansi - D3", "Manajemen Informatika - D3", "Teknik Informatika - D3", "Teknik Komputer - D3", "Rekaya Perangkat Lunak - S1", "Teknik Informatika - S1", "Teknologi Informasi - S1", "Sistem Informasi - S1"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$akuntansi = mysqli_query($con, "select * from tb_absensi where prodi='Akuntansi' and jenjang='D3'");
					echo mysqli_num_rows($akuntansi);
					?>,

					<?php 
					$mi = mysqli_query($con, "select * from tb_absensi where prodi='Manajemen Informatika' and jenjang='D3'");
					echo mysqli_num_rows($mi);
					?>,

					<?php 
					$ti_d3 = mysqli_query($con, "select * from tb_absensi where prodi='Teknik Informatika' and jenjang='D3'");
					echo mysqli_num_rows($ti_d3);
					?>,

					<?php 
					$tk = mysqli_query($con, "select * from tb_absensi where prodi='Teknik Komputer' and jenjang='D3'");
					echo mysqli_num_rows($tk);
					?>,

					<?php 
					$rpl = mysqli_query($con, "select * from tb_absensi where prodi='Rekayasa Perangkat Lunak' and jenjang='S1'");
					echo mysqli_num_rows($rpl);
					?>,

					<?php 
					$ti_s1 = mysqli_query($con, "select * from tb_absensi where prodi='Teknik Informatika' and jenjang='S1'");
					echo mysqli_num_rows($ti_s1);
					?>,

					<?php 
					$t_in = mysqli_query($con, "select * from tb_absensi where prodi='Teknologi Informasi' and jenjang='S1'");
					echo mysqli_num_rows($t_in);
					?>,

					<?php 
					$si = mysqli_query($con, "select * from tb_absensi where prodi='Sistem Informasi' and jenjang='S1'");
					echo mysqli_num_rows($si);
					?>
					],
					backgroundColor: [
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 99, 132, 0.2)'
					],
					borderColor: [
					'rgba(54, 162, 235, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255,99,132,1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
</script>
</body>
<div class="footer">
	<div class="col-md-12 p-0">
		<p><center>&copy; 2020 . INSTITUT TEKNOLOGI & BISNIS INDONESIA </center></p>
	</div>
</div>
</html>
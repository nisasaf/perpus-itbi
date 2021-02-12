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
	<link href="../plugins/css/dataTables.bootstrap4.css" rel="stylesheet">
  	<link href="../plugins/css/jquery.dataTables.css" rel="stylesheet">
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
			            <li class="active">
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
								<li class="breadcrumb-item active">PEMINJAMAN</li>
							</ul>
						</div>
					</div>

					<div class="col-md-12">
						<div class="card">
							<div class="card-body p-4">
								<div class="alert alert-info"><div class="btn btn-warning btn-lg btn-add-data btn-label"><i class="fas fa-book mr-2"></i>Buku yang Sedang Dipinjam</div></div>
								<div class="tab-content">
									<div role="tab-panel" class="tab-pane active" id="list">
										<table id="data-table" class="table data">
											<?php 
												function terlambat($deadline , $sekarang) {

												$tgl_deadline = explode ("-", $deadline);
												$tgl_deadline = $tgl_deadline[2]."-".$tgl_deadline[1]."-".$tgl_deadline[0];

												$tgl_sekarang = explode ("-", $sekarang);
												$tgl_sekarang = $tgl_sekarang[2]."-".$tgl_sekarang[1]."-".$tgl_sekarang[0];

												$selisih = strtotime ($tgl_sekarang) - strtotime ($tgl_deadline);

												$selisih = $selisih / (60*60*24);

												if ($selisih>=1) {
													$hasil_tgl = floor($selisih);
												}
												else {
													$hasil_tgl = 0;
												}
												return $hasil_tgl;
												}
											?>
											<thead>
												<tr>
													<th class="th-number">No.</th>
													<th>Judul Buku</th>
													<th>Peminjam</th>
													<th>Tanggal Pinjam</th>
													<th>Tanggal Kembali</th>
													<th>Terlambat</th>
													<th class="th-action">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php 
													$username = $_SESSION['username'];
													$query_mysql = mysqli_query($con, "SELECT * FROM tb_transaksi WHERE nim='$username' AND status='Pinjam'")or die(mysqli_error());
													$nomor = 1;
													while($data = mysqli_fetch_array($query_mysql)){

														$tgl_p = date('d-m-Y', strtotime($data['tgl_pinjam']));
														$tgl_k = date('d-m-Y', strtotime($data['tgl_kembali']));
												?>
											
												<tr>
													<td><?php echo $nomor++; ?></td>
													<td><?php echo $data['judul']; ?></td>
													<td><?php echo $data['peminjam']; ?></td>
													<td><?php echo $tgl_p; ?></td>
													<td><?php echo $tgl_k; ?></td>
													<td><?php 
										                    $deadline     = $data['tgl_kembali'];
												            $sekarang = date('d-m-Y');
												            $lambat       = terlambat($deadline, $sekarang);
										                    $biaya        = 1000;
										                    $denda        = $lambat*$biaya;
												            if ($lambat>0) {
										                    	echo "<center><b><font color='red'>$lambat hari &nbsp | &nbsp(Rp. $biaya,- x $lambat) = Rp. $denda,-</font></b></center>";
												            }
												            else {
										               	    	echo "<center><b><font color='blue'> $lambat hari &nbsp | &nbsp Baru Meminjam</font></b></center>";
												            }
										                ?>
										            </td>
										            <td>
														<center>
														<a href="proses_perpanjang.php?id=<?php echo $data['id']; ?>" class="btn btn-default btn-sm btn-extend" type="submit" data-toggle="tooltip" data-placement="bottom" title="Perpanjang" onclick="return confirm('Apakah kamu yakin ingin memperpanjang peminjaman buku?')"><i class="fas fa-infinity"></i></a>
														</center>
													</td>
												</tr>
												<?php 
													}
												 ?>
											</tbody>
										</table>
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
<script type="text/javascript" src="../plugins/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../fa/js/all.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	    $('.btn-default').tooltip({
			delay: { "show": 500, "hide": 100 },
			html:true,
		});   
	});
</script>
<script>
    $("#menu-toggle").click(function(e) {
      	e.preventDefault();
      	$("#wrapper").toggleClass("toggled");
    });
</script>
<script type="text/javascript">
  	$(document).ready(function(){
    	$('.data').DataTable();
 })
</script>
</body>
<div class="footer">
	<div class="col-md-12 p-0">
		<p><center>&copy; 2020 . INSTITUT TEKNOLOGI & BISNIS INDONESIA </center></p>
	</div>
</div>
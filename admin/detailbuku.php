<?php

 	session_start();
	
 	if(empty($_SESSION['username']) AND empty($_SESSION['password'])){
		
 	header("location:../login.php");
	} else {
		include "koneksi.php";
	}
?>

<?php include "koneksi.php"; ?>

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
							<a href="user.php">
								<span class="icon"><i class="fas fa-user"></i></span>
			                	<span>User</span>
			                </a>
			            </li>
			            <li class="active">
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
								<li class="breadcrumb-item"><a href="buku.php">BUKU</a></li>
								<li class="breadcrumb-item active">DETAIL BUKU</li>
							</ul>
						</div>
					</div>

					<div class="col-md-12">
						<div class="card">
							<div class="card-body p-4">
								<div class="alert alert-info"><div class="btn btn-warning btn-lg btn-label"><i class="fas fa-book-open mr-2"></i>Detail Buku</div></div>
								<table id="example" class="table table-hover">
									<?php 
										$query = mysqli_query($con, "SELECT * FROm tb_buku WHERE kd_buku='$_GET[kd_buku]'");
										$data  = mysqli_fetch_array($query);
									?>
									<div class="col-12 mb-4 text-center display-img-responsive">
										<img src="../gambar/<?php echo $data['foto']; ?>" class="img-rounded detail" height="300" width="250" alt="User Image" /> 		
									</div>
				                    <tr>
				                        <td width="200" class="td-bold">Kode Buku</td>
				                        <td width="585"><?php echo $data['kd_buku']; ?></td>
				                        <td rowspan="8" class="display-img">
				                        	<div class="pull-right image">
				                            	<img src="../gambar/<?php echo $data['foto']; ?>" class="img-rounded detail" height="300" width="250" alt="User Image" />
				                            </div>
				                        </td>
				                    </tr>
				                    <tr>
					                    <td class="td-bold">Judul Buku</td>
					                    <td><?php echo $data['judul']; ?></td>
				                    </tr>
				                    <tr>
					                    <td class="td-bold">Penulis</td>
					                    <td><?php echo $data['penulis']; ?></td>
				                    </tr>
				                    <tr>
					                    <td class="td-bold">Tahun</td>
					                    <td><?php echo $data['tahun']; ?></td>
				                    </tr>
				                    <tr>
					                    <td class="td-bold">Penerbit</td>
					                    <td><?php echo $data['penerbit']; ?></td>
				                    </tr>
				                    <tr>
					                    <td class="td-bold">ISBN</td>
					                    <td><?php echo $data['isbn']; ?></td>
				                    </tr>	
				                    <tr>
					                    <td class="td-bold">Kategori</td>
					                    <td><?php echo $data['kategori']; ?></td>
				                    </tr>
				                    <tr>
					                    <td class="td-bold">Jumlah Buku</td>
					                    <td><?php echo $data['jumlah']; ?></td>
				                    </tr>
				                    <tr>
					                    <td class="td-bold">Rak</td>
					                    <td colspan="2"><?php echo $data['lokasi']; ?></td>
				                    </tr>
				                    <tr>
					                    <td class="td-bold">Asal Buku</td>
					                    <td colspan="2"><?php echo $data['asal']; ?></td>
				                    </tr>
				                    <tr>
					                    <td class="td-bold">Tanggal Input</td>
					                    <td colspan="2"><?php echo $data['tgl_input']; ?></td>
				                    </tr>
								</table>
								<div class="text-right">
				                	<a href="buku.php" class="btn btn-md btn-warning text-light btn-back"> Kembali <i class="fa fa-arrow-circle-right ml-2"></i></a>
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
</html>
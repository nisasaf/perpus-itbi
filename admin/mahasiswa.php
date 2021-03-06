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
			            <li>
							<a href="buku.php">
								<span class="icon"><i class="fas fa-book"></i></span>
			                	<span>Buku</span>
			                </a>
						</li>
						 <li class="active">
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
								<li class="breadcrumb-item active">MAHASISWA</li>
							</ul>
						</div>
					</div>

					<div class="col-md-12">
						<div class="card">
							<div class="card-body p-4">
								<div class="alert alert-info"><a href="inputmahasiswa.php" class="btn btn-warning btn-lg btn-add-data"><i class="fas fa-plus mr-2"></i>Tambah Data</a></div>
								<div class="tab-content">
									<div role="tab-panel" class="tab-pane active" id="list">
										<h5>Data Mahasiswa</h5>
										<table id="data-table" class="table data">
											<thead>
												<tr>
													<th class="th-number">No.</th>
													<th>NIM</th>
													<th>Nama Mahasiswa</th>
													<th class="th-jenjang">Jenjang</th>
													<th>Program Studi</th>
													<th>Kelas/Semester</th>
													<th>Foto</th>
													<th class="th-action">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php 
													$query_mysql = mysqli_query($con, "SELECT * FROM tb_mahasiswa")or die(mysqli_error());
													$nomor = 1;
													while($data = mysqli_fetch_array($query_mysql)){
													$implode1 = array($data['kelas'], $data['waktu']);
													$a = implode(" ", $implode1);
													$implode2 = array('Semester', $data['semester']);
													$b = implode(" ", $implode2);
													$implode3 = array($a, $b);
												?>
											
												<tr>
													<td><?php echo $nomor++; ?></td>
													<td><?php echo $data['nim']; ?></td>
													<td>
														<a href="detailmahasiswa.php?nim=<?php echo $data['nim'];?>" style="color: #b50502;">
															<?php echo $data['nama']; ?>
														</a>
													</td>
													<td><?php echo $data['jenjang']; ?></td>
													<td><?php echo $data['prodi']; ?></td>
													<td><?php echo implode("/", $implode3); ?></td>
													<td><center><img src="../gambar/<?php echo $data['foto']; ?>" class="rounded-circle"></center></td>
													<td>
														<center>
														<a href="editmahasiswa.php?nim=<?php echo $data['nim']; ?>" class="btn btn-default btn-sm btn-edit" type="submit" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fas fa-edit"></i></a>
														<a href="deletemahasiswa.php?nim=<?php echo $data['nim'];?>" class="btn btn-default btn-sm btn-delete" type="submit" data-toggle="tooltip" data-placement="bottom" title="Hapus" onclick="return confirm('Apakah kamu yakin ingin menghapus?')"><i class="fas fa-trash"></i></a>
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
</html>
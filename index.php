<!DOCTYPE html>
<html>
<head>
	<title>IT&BI LIBRARY | Perpustakaan Institut Teknologi & Bisnis Indonesia</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width. initial-scale=1.0">
	<link rel="shortcut icon" href="gambar/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="plugins/css/dataTables.bootstrap4.css" rel="stylesheet">
  	<link href="plugins/css/jquery.dataTables.css" rel="stylesheet">
	<link rel="stylesheet" href="fa/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light fixed-top">
  		<a class="navbar-brand px-5 py-2 mx-4" href="#"><img alt="Logo ITBI" src="gambar/logo.png" class="img-responsive">IT&BI LIBRARY</a>
	</nav>

	<div class="container-fluid container-jumbotron">
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron">
					<br>
					<h2 class="main-caption">Welcome to IT&BI LIBRARY</h2>
					<p class="tagline">Membaca adalah jendela ilmu. Jangan lupa baca buku hari ini, ya!</p>
					<a href="login.html" class="btn btn-warning btn-lg btn-login">LOGIN</a>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 py-3">
				<div class="card">
					<div class="card-heading p-4">
						<h5 class="m-1"><b>DAFTAR HADIR (ABSENSI)</b></h5>
						<small class="line-height-note">*Refresh halaman ini sebelum mengisi data<span><a href="index.php" class="btn btn-danger btn-sm btn-refresh ml-2">Klik di sini</a></span></small>	
					</div>
					<div class="card-body px-3">
						<div class="row">
							<div class="col-md-12">
								<form action="proses_inputabsensi.php" method="POST" class="mx-4">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="nim">NIM</label>
												<input type="text" name="nim" id="nim" class="form-control" onkeyup="cek_database()" placeholder="NIM">
											</div>
											<div class="form-group">
												<label for="nama">Nama</label>
												<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required oninvalid="this.setCustomValidity('Pilih NIM terlebih dahulu')" oninput="setCustomValidity('')">
											</div>

											<div class="form-group">
												<label for="prodi">Program Studi</label>
												<input type="text" name="prodi" id="prodi" class="form-control" placeholder="Program Studi" required oninvalid="this.setCustomValidity('Pilih NIM terlebih dahulu')" oninput="setCustomValidity('')">
											</div>						
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label for="jenjang">Jenjang Studi</label><br>
												<input type="text" name="jenjang" id="jenjang" class="form-control"  placeholder="Jenjang Studi" required oninvalid="this.setCustomValidity('Pilih NIM terlebih dahulu')" oninput="setCustomValidity('')">
											</div>

											<div class="form-group">
												<label for="kelas">Kelas</label>
												<div class="row">
													<div class="col-md-6 col-first">
														<input type="text" name="kelas" id="kelas" class="form-control" placeholder="Kelas" required oninvalid="this.setCustomValidity('Pilih NIM terlebih dahulu')" oninput="setCustomValidity('')">
													</div>
													<div class="col-md-6 col-sec">
														<input type="text" name="waktu" id="waktu" class="form-control" placeholder="Waktu" required oninvalid="this.setCustomValidity('Pilih NIM terlebih dahulu')" oninput="setCustomValidity('')">
												    </div>
												</div>
											</div>

											<div class="form-group">
												<label for="perlu">Semester</label>
												<input type="text" class="form-control" name="semester" id="semester" placeholder="Semester" required oninvalid="this.setCustomValidity('Pilih NIM terlebih dahulu')" oninput="setCustomValidity('')"> 
											</div>
										</div>

										<div class="col-md-4">
											<?php 
				                            	date_default_timezone_set('Asia/Jakarta');
				                             ?>
											<div class="form-group">
				                             	<label for="tgl_kunjung">Tanggal</label>
				                                <input name="tgl_kunjung" type="text" class="form-control cursor-notallowed" id="tgl_kunjung" value="<?php echo "".date("Y/m/d").""; ?>" readonly="readonly">
				                            </div>

				                          
				                        	<div class="form-group">
				                            	<label for="jam_kunjung">Jam</label>
				                                <input name="jam_kunjung" type="text" class="form-control cursor-notallowed" id="jam_kunjung" value="<?php echo "".date("H:i:s").""?>" readonly="readonly">
				                          	</div>

				                          	<div class="form-group">
				                            	<label><br></label>
				                               	<div class="btncustom mt-2">
													<button type="button" class="btn btn-outline-success btn-form" name="batal">Batal</button>
													<input type="submit" class="btn btn-success btn-form" name="submit" value="OK">
												</div>
				                          	</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 py-3">
				<div class="card">
					<div class="card-heading p-4">
						<h5><b>ABSENSI HARI INI</b></h5>
					</div>
					<div class="card-body px-4">
						<div class="tab-content">
							<table id="data-table" class="table data">
								<thead>
									<tr>
										<th>No.</th>
										<th>NIM</th>
										<th>Nama</th>
										<th>Jenjang Studi</th>
										<th>Program Studi</th>
										<th>Tanggal</th>
										<th>Jam</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										include "koneksi.php";

										$no = 1;
										$tanggal = date("Y/m/d");
										$query_mysql = mysqli_query($con, "SELECT * FROM tb_absensi WHERE tgl_kunjung='$tanggal'")or die(mysqli_error());
											while($data = mysqli_fetch_array($query_mysql)){
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $data['nim']; ?></td>
										<td><?php echo $data['nama']; ?></td>
										<td><?php echo $data['jenjang']; ?></td>
										<td><?php echo $data['prodi']; ?></td>
										<td><?php echo $data['tgl_kunjung']; ?></td>
										<td><?php echo $data['jam_kunjung']; }?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 py-3">
				<div class="card">
					<div class="card-heading p-4">
						<h5><b>DATA AKUMULASI ABSENSI</b></h5>
					</div>
					<div class="card-body px-4">
						<div class="tab-content">
							<table id="data-table" class="table data">
								<thead>
									<tr>
										<th>No.</th>
										<th>NIM</th>
										<th>Nama</th>
										<th>Jenjang Studi</th>
										<th>Program Studi</th>
										<th>Kelas/Semester</th>
										<th>Tanggal</th>
										<th>Jam</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										include "koneksi.php";

										$no = 1;
										$tanggal = date("Y/m/d");
										$query_mysql = mysqli_query($con, "SELECT * FROM tb_absensi")or die(mysqli_error());
										while($data = mysqli_fetch_array($query_mysql)){
										$implode1 = array($data['kelas'], $data['waktu']);
										$a = implode(" ", $implode1);
										$implode2 = array('Semester', $data['semester']);
										$b = implode(" ", $implode2);
										$implode3 = array($a, $b);
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $data['nim']; ?></td>
										<td><?php echo $data['nama']; ?></td>
										<td><?php echo $data['jenjang']; ?></td>
										<td><?php echo $data['prodi']; ?></td>
										<td><?php echo implode("/", $implode3); ?></td>
										<td><?php echo $data['tgl_kunjung']; ?></td>
										<td><?php echo $data['jam_kunjung']; }?></td>
									</tr>
								</tbody>
							</table>	
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
	function cek_database() {   
		var nim = $("#nim").val();   
		$.ajax({       
			url: 'ajax-absensi.php',       
			data: "nim=" + nim,       
			success : function(data) {        
				var json = data,        
				obj = JSON.parse(json);         
				$('#nama').val(obj.nama);
				$('#prodi').val(obj.prodi);
				$('#kelas').val(obj.kelas);
				$('#waktu').val(obj.waktu);
				$('#semester').val(obj.semester);
				$('#jenjang').val(obj.jenjang);       
			}    
		}) 
	}
</script>
<script type="text/javascript" src="plugins/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="fa/js/all.min.js"></script>
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

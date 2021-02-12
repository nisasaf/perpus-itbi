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
	<link rel="stylesheet" href="../plugin/jquery-ui/jquery-ui.min.css" />
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../plugin/jquery.min.js"></script>
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
			            <li class="active">
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
								<li class="breadcrumb-item active">LAPORAN</li>
							</ul>
						</div>
					</div>

					<div class="col-md-12">
						<div class="card">
							<div class="card-body p-4">
								<div class="alert alert-info"><div class="btn btn-warning btn-lg btn-label"><i class="fas fa-layer-group mr-2"></i>Laporan</div></div>
								
								<hr>
								<div class="row">
									<div class="col-md-4">
										<form class="form-horizontal" method="get" action="">
											<div class="col-md-12">
												<h5 class="line-height-report"><b>Data Absensi Perpustakaan</b></h5><br>
										        <label>Filter Berdasarkan</label><br>
										        <select class="custom-select d-block w-100" name="filter" id="filter">
										            <option value="">Pilih</option>
										            <option value="1">Per Tanggal</option>
										            <option value="2">Per Bulan</option>
										            <option value="3">Per Tahun</option>
										        </select>
										        <br /><br />

										        <div id="form-tanggal">
										            <label>Tanggal</label><br>
										            <input type="text" name="tanggal" class="form-control input-tanggal" autocomplete="off" />
										            <br /><br />
										        </div>

										        <div id="form-bulan">
										            <label>Bulan</label><br>
										            <select class="custom-select d-block w-100" name="bulan">
										                <option value="">Pilih</option>
										                <option value="1">Januari</option>
										                <option value="2">Februari</option>
										                <option value="3">Maret</option>
										                <option value="4">April</option>
										                <option value="5">Mei</option>
										                <option value="6">Juni</option>
										                <option value="7">Juli</option>
										                <option value="8">Agustus</option>
										                <option value="9">September</option>
										                <option value="10">Oktober</option>
										                <option value="11">November</option>
										                <option value="12">Desember</option>
										            </select>
										            <br /><br />
										        </div>

										        <div id="form-tahun">
										            <label>Tahun</label><br>
										            <select class="custom-select d-block w-100" name="tahun">
										                <option value="">Pilih</option>
										                <?php
											                $query = "SELECT YEAR(tgl_kunjung) AS tahun FROM tb_absensi GROUP BY YEAR(tgl_kunjung)"; 
											                $sql = mysqli_query($con, $query); 
											                while($data = mysqli_fetch_array($sql)){ 
											                    echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
											                }
										                ?>
										            </select>
										            <br /><br />
										        </div>

										        <button type="submit" class="btn btn-success btn-sm">Tampilkan</button>
										        <a href="laporan.php" class="btn btn-outline-success btn-sm">Reset Filter</a>
										    </div>
									    </form>
									</div>
									<div class="col-md-8">
									    <?php
									    if(isset($_GET['filter']) && ! empty($_GET['filter'])){
									        $filter = $_GET['filter'];

									        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
									            $tgl = date('d-m-y', strtotime($_GET['tanggal']));

									            echo '<b>Data Absensi Perpustakaan Tanggal '.$tgl.'</b><br /><br />';
									            echo '<a href="laporan-absensi.php?filter=1&tanggal='.$_GET['tanggal'].'" class="btn btn-primary btn-sm">Cetak PDF</a><br /><br />';

									            $no = 1;
									            $query = "SELECT * FROM tb_absensi WHERE DATE(tgl_kunjung)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
									        }else if($filter == '2'){ 
									            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

									            echo '<b>Data Absensi Perpustakaan Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';
									            echo '<a href="laporan-absensi.php?filter=2&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'" class="btn btn-primary btn-sm">Cetak PDF</a><br /><br />';

									            $no = 1;
									            $query = "SELECT * FROM tb_absensi WHERE MONTH(tgl_kunjung)='".$_GET['bulan']."' AND YEAR(tgl_kunjung)='".$_GET['tahun']."'"; 
									        }else{ 
									            echo '<b>Data Absensi Perpustakaan Tahun '.$_GET['tahun'].'</b><br /><br />';
									            echo '<a href="laporan-absensi.php?filter=3&tahun='.$_GET['tahun'].'" class="btn btn-primary btn-sm">Cetak PDF</a><br /><br />';

									            $no = 1;
									            $query = "SELECT * FROM tb_absensi WHERE YEAR(tgl_kunjung)='".$_GET['tahun']."'"; 
									        }
									    }else{ 
									        $query = "SELECT * FROM tb_absensi ORDER BY tgl_kunjung LIMIT 5 "; 
									    }
									    ?>

										<table class="table table-striped-table-hover">
											<tr>
											   	<th>No.</th>
											    <th>Nama</th>
											    <th>Tgl Kunjung</th>
											    <th>Jam kunjung</th>
											</tr>

											<?php
											   
												$no = 1;							   
											    $sql = mysqli_query($con, $query); 
											    $row = mysqli_num_rows($sql);

											    if($row > 0){ 
											        while($data = mysqli_fetch_array($sql)){
											            $tgl_p = date('d-m-Y', strtotime($data['tgl_kunjung']));
											?>
											<tr>
											    <td><?php echo $no++; ?></td>
											    <td><?php echo $data['nama']; ?></td>
											    <td><?php echo $tgl_p; ?></td>
											    <td><?php echo $data['jam_kunjung']; ?></td>
											</tr>
											<?php 
											    } 
											    }else{
											        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
											    }
											?>
										</table>
									</div>
								</div>
								<hr>

								<div class="row">
									<div class="col-md-4">
										<form class="form-horizontal" method="get" action="">
											<div class="col-md-12">
												<h5 class="line-height-report"><b>Data Peminjaman Buku</b></h5><br>
										        <label>Filter Berdasarkan</label><br>
										        <select class="custom-select d-block w-100" name="filter2" id="filter2">
										            <option value="">Pilih</option>
										            <option value="1">Per Tanggal</option>
										            <option value="2">Per Bulan</option>
										            <option value="3">Per Tahun</option>
										        </select>
										        <br /><br />

										        <div id="form-tanggal2">
										            <label>Tanggal</label><br>
										            <input type="text" name="tanggal2" class="form-control input-tanggal" autocomplete="off" />
										            <br /><br />
										        </div>

										        <div id="form-bulan2">
										            <label>Bulan</label><br>
										            <select class="custom-select d-block w-100" name="bulan2">
										                <option value="">Pilih</option>
										                <option value="1">Januari</option>
										                <option value="2">Februari</option>
										                <option value="3">Maret</option>
										                <option value="4">April</option>
										                <option value="5">Mei</option>
										                <option value="6">Juni</option>
										                <option value="7">Juli</option>
										                <option value="8">Agustus</option>
										                <option value="9">September</option>
										                <option value="10">Oktober</option>
										                <option value="11">November</option>
										                <option value="12">Desember</option>
										            </select>
										            <br /><br />
										        </div>

										        <div id="form-tahun2">
										            <label>Tahun</label><br>
										            <select class="custom-select d-block w-100" name="tahun2">
										                <option value="">Pilih</option>
										                <?php
											                $query = "SELECT YEAR(tgl_pinjam) AS tahun2 FROM tb_transaksi GROUP BY YEAR(tgl_pinjam)"; 
											                $sql = mysqli_query($con, $query); 
											                while($data = mysqli_fetch_array($sql)){ 
											                    echo '<option value="'.$data['tahun2'].'">'.$data['tahun2'].'</option>';
											                }
										                ?>
										            </select>
										            <br /><br />
										        </div>

										        <button type="submit" class="btn btn-success btn-sm">Tampilkan</button>
										        <a href="laporan.php" class="btn btn-outline-success btn-sm">Reset Filter</a>
										    </div>
									    </form>
									</div>
									<div class="col-md-8">
									    <?php
									    if(isset($_GET['filter2']) && ! empty($_GET['filter2'])){
									        $filter2 = $_GET['filter2'];

									        if($filter2 == '1'){ // Jika filter nya 1 (per tanggal)
									            $tgl = date('d-m-y', strtotime($_GET['tanggal2']));

									            echo '<b>Data Transaksi Peminjaman Buku Tanggal '.$tgl.'</b><br /><br />';
									            echo '<a href="laporan-pinjam.php?filter2=1&tanggal2='.$_GET['tanggal2'].'" class="btn btn-primary btn-sm">Cetak PDF</a><br /><br />';

									            $no2 = 1;
									            $query2 = "SELECT * FROM tb_transaksi WHERE DATE(tgl_pinjam)='".$_GET['tanggal2']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
									        }else if($filter2 == '2'){ 
									            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

									            echo '<b>Data Transaksi Peminjaman Buku Bulan '.$nama_bulan[$_GET['bulan2']].' '.$_GET['tahun2'].'</b><br /><br />';
									            echo '<a href="laporan-pinjam.php?filter2=2&bulan2='.$_GET['bulan2'].'&tahun2='.$_GET['tahun2'].'" class="btn btn-primary btn-sm">Cetak PDF</a><br /><br />';
									            
									            $no2 = 1;
									            $query2 = "SELECT * FROM tb_transaksi WHERE MONTH(tgl_pinjam)='".$_GET['bulan2']."' AND YEAR(tgl_pinjam)='".$_GET['tahun2']."'";
									        }else{ 
									            echo '<b>Data Transaksi Peminjaman Buku Tahun '.$_GET['tahun2'].'</b><br /><br />';
									            echo '<a href="laporan-pinjam.php?filter2=3&tahun2='.$_GET['tahun2'].'" class="btn btn-primary btn-sm">Cetak PDF</a><br /><br />';

									            $no2 = 1;
									            $query2 = "SELECT * FROM tb_transaksi WHERE YEAR(tgl_pinjam)='".$_GET['tahun2']."'"; 
									        }
									    }else{ 
											    $query2 = "SELECT * FROM tb_transaksi ORDER BY tgl_pinjam LIMIT 5"; 
									    }
									    ?>
										<table class="table table-striped-table-hover">
											<tr>
											    <th>No.</th>
											    <th>Judul</th>
											    <th>Peminjam</th>
											    <th>Tgl Pinjam</th>
											    <th>Tgl Kembali</th>
											</tr>

											<?php
											 	
											 	$no2 = 1;
											    $sql2 = mysqli_query($con, $query2); 
											    $row2 = mysqli_num_rows($sql2);


											    if($row2 > 0){ 
											        while($data2 = mysqli_fetch_array($sql2)){
											            $tgl_p2 = date('d-m-Y', strtotime($data2['tgl_pinjam']));
											?>
											<tr>
											    <td><?php echo $no2++; ?></td>
											    <td><?php echo $data2['judul']; ?></td>
											    <td><?php echo $data2['peminjam']; ?></td>
											    <td><?php echo $tgl_p2; ?></td>
											    <td><?php echo $data2['tgl_kembali']; ?></td>
											</tr>
											<?php 
											    }
											    }else{
											        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
											    }
											?>
										</table>
									</div>
								</div>
								<hr>

								<div class="row">
									<div class="col-md-4">
										<form class="form-horizontal" method="get" action="">
											<div class="col-md-12">
												<h5 class="line-height-report"><b>Data Buku</b></h5><br>
										        <label>Filter Berdasarkan</label><br>
										        <select class="custom-select d-block w-100" name="filter3" id="filter3">
										            <option value="">Pilih</option>
										            <option value="1">Per Tanggal</option>
										            <option value="2">Per Bulan</option>
										            <option value="3">Per Tahun</option>
										        </select>
										        <br /><br />

										        <div id="form-tanggal3">
										            <label>Tanggal</label><br>
										            <input type="text" name="tanggal3" class="form-control input-tanggal" autocomplete="off" />
										            <br /><br />
										        </div>

										        <div id="form-bulan3">
										            <label>Bulan</label><br>
										            <select class="custom-select d-block w-100" name="bulan3">
										                <option value="">Pilih</option>
										                <option value="1">Januari</option>
										                <option value="2">Februari</option>
										                <option value="3">Maret</option>
										                <option value="4">April</option>
										                <option value="5">Mei</option>
										                <option value="6">Juni</option>
										                <option value="7">Juli</option>
										                <option value="8">Agustus</option>
										                <option value="9">September</option>
										                <option value="10">Oktober</option>
										                <option value="11">November</option>
										                <option value="12">Desember</option>
										            </select>
										            <br /><br />
										        </div>

										        <div id="form-tahun3">
										            <label>Tahun</label><br>
										            <select class="custom-select d-block w-100" name="tahun3">
										                <option value="">Pilih</option>
										                <?php
											                $query = "SELECT YEAR(tgl_input) AS tahun3 FROM tb_buku GROUP BY YEAR(tgl_input)"; 
											                $sql = mysqli_query($con, $query); 
											                while($data = mysqli_fetch_array($sql)){ 
											                    echo '<option value="'.$data['tahun3'].'">'.$data['tahun3'].'</option>';
											                }
										                ?>
										            </select>
										            <br /><br />
										        </div>

										        <button type="submit" class="btn btn-success btn-sm">Tampilkan</button>
										        <a href="laporan.php" class="btn btn-outline-success btn-sm">Reset Filter</a>
										    </div>
									    </form>
									</div>
									<div class="col-md-8">
									    <?php
									    if(isset($_GET['filter3']) && ! empty($_GET['filter3'])){
									        $filter3 = $_GET['filter3'];

									        if($filter3 == '1'){ 
									            $tgl = date('d-m-y', strtotime($_GET['tanggal3']));

									            echo '<b>Data Buku Tanggal '.$tgl.'</b><br /><br />';
									            echo '<a href="laporan-buku.php?filter3=1&tanggal3='.$_GET['tanggal3'].'" class="btn btn-primary btn-sm">Cetak PDF</a><br /><br />';

									            $no3 = 1;
									            $query3 = "SELECT * FROM tb_buku WHERE DATE(tgl_input)='".$_GET['tanggal3']."'"; 
									        }else if($filter3 == '2'){ 
									            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

									            echo '<b>Data Buku Bulan '.$nama_bulan[$_GET['bulan3']].' '.$_GET['tahun3'].'</b><br /><br />';
									            echo '<a href="laporan-buku.php?filter3=2&bulan3='.$_GET['bulan3'].'&tahun3='.$_GET['tahun3'].'" class="btn btn-primary btn-sm">Cetak PDF</a><br /><br />';

									            $no3 = 1;
									            $query3 = "SELECT * FROM tb_buku WHERE MONTH(tgl_input)='".$_GET['bulan3']."' AND YEAR(tgl_input)='".$_GET['tahun3']."'"; 
									        }else{ 
									            echo '<b>Data Buku Tahun '.$_GET['tahun3'].'</b><br /><br />';
									            echo '<a href="laporan-buku.php?filter3=3&tahun3='.$_GET['tahun3'].'" class="btn btn-primary btn-sm">Cetak PDF</a><br /><br />';

									            $no3 = 1;
									            $query3 = "SELECT * FROM tb_buku WHERE YEAR(tgl_input)='".$_GET['tahun3']."'"; 
									        }
									    }else{ 
									    	 $query3 = "SELECT * FROM tb_buku ORDER BY tgl_input LIMIT 5";
									    }
									    ?>
										<table class="table table-striped-table-hover">
											<tr>
											   	<th>No.</th>
											    <th>Kode Buku</th>
											    <th>Judul Buku</th>
											    <th>Asal Buku</th>
											    <th>Jumlah Buku</th>
											    <th>Tgl Input</th>
											</tr>

											<?php

											    $no3 = 1;
											    $sql3 = mysqli_query($con, $query3); 
											    $row3 = mysqli_num_rows($sql3);

											    if($row3 > 0){ 
											        while($data3 = mysqli_fetch_array($sql3)){
											            $tgl_p3 = date('d-m-Y', strtotime($data3['tgl_input']));
											?>
											<tr>
											    <td><?php echo $no3++; ?></td>
											    <td><?php echo $data3['kd_buku']; ?></td>
											    <td><?php echo $data3['judul']; ?></td>
											    <td><?php echo $data3['asal']; ?></td>
											    <td><?php echo $data3['jumlah']; ?></td>
											    <td><?php echo $tgl_p3; ?></td>
											        </tr>
											    <?php 
											        }
											    }else{
											        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
											    }
											    ?>
										</table>
									</div>
								</div><hr>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
    $(document).ready(function(){ 
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd'
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); 

        $('#filter').change(function(){ 
            if($(this).val() == '1'){ 
                $('#form-bulan, #form-tahun').hide(); 
                $('#form-tanggal').show();
            }else if($(this).val() == '2'){ 
                $('#form-tanggal').hide();
                $('#form-bulan, #form-tahun').show();
            }else{ 
                $('#form-tanggal, #form-bulan').hide(); 
                $('#form-tahun').show(); 
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); 
        })
    })
</script>

<script>
    $(document).ready(function(){ 
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd'
        });

        $('#form-tanggal2, #form-bulan2, #form-tahun2').hide(); 

        $('#filter2').change(function(){ 
            if($(this).val() == '1'){ 
                $('#form-bulan2, #form-tahun2').hide(); 
                $('#form-tanggal2').show();
            }else if($(this).val() == '2'){ 
                $('#form-tanggal2').hide();
                $('#form-bulan2, #form-tahun2').show();
            }else{ 
                $('#form-tanggal2, #form-bulan2').hide(); 
                $('#form-tahun2').show(); 
            }

            $('#form-tanggal2 input, #form-bulan2 select, #form-tahun2 select').val(''); 
        })
    })
</script>

<script>
    $(document).ready(function(){ 
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd'
        });

        $('#form-tanggal3, #form-bulan3, #form-tahun3').hide(); 

        $('#filter3').change(function(){ 
            if($(this).val() == '1'){ 
                $('#form-bulan3, #form-tahun3').hide(); 
                $('#form-tanggal3').show();
            }else if($(this).val() == '2'){ 
                $('#form-tanggal3').hide();
                $('#form-bulan3, #form-tahun3').show();
            }else{ 
                $('#form-tanggal3, #form-bulan3').hide(); 
                $('#form-tahun3').show(); 
            }

            $('#form-tanggal3 input, #form-bulan3 select, #form-tahun3 select').val(''); 
        })
    })
</script>
<script src="../plugin/jquery-ui/jquery-ui.min.js"></script>
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
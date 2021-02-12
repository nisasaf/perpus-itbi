<?php
include "koneksi.php";
require('../fpdf17/fpdf.php');


$pdf = new FPDF('L', 'mm','A4');
$pdf->AddPage();

$pdf->Image('../gambar/logo.png',30,10,25);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,18,'PERPUSTAKAAN',0,1,'C');
$pdf->SetFont('Helvetica','B',14);
$pdf->SetTextColor(165, 20, 16);
$pdf->Cell(0,0,'INSTITUT TEKNOLOGI DAN BISNIS INDONESIA',0,1,'C');
$pdf->SetLineWidth(1);
$pdf->Line(10,41,287,41);
$pdf->SetLineWidth(0);
$pdf->Line(10,42,287,42);
$pdf->Ln(5);
$pdf->Cell(50,10,'',0,1);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0);
$pdf->Cell(0,12,'DATA ABSENSI ANGGOTA PERPUSTAKAAN',0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,8,'No.',1,0,'C');
$pdf->Cell(60,8,'Nama',1,0,'C');
$pdf->Cell(58,8,'Prodi',1,0,'C');
$pdf->Cell(45,8,'Kelas',1,0,'C');
$pdf->Cell(37,8,'Tanggal Kunjung',1,0,'C');
$pdf->Cell(37,8,'Jam Kunjung',1,1,'C');


if(isset($_GET['filter']) && ! empty($_GET['filter'])){
	$filter = $_GET['filter']; 

		if($filter == '1'){ 
			$tgl = date('d-m-y', strtotime($_GET['tanggal']));

			$query = "SELECT * FROM tb_absensi WHERE DATE(tgl_kunjung)='".$_GET['tanggal']."'"; 

		}else if($filter == '2'){ 
			$nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

			$query = "SELECT * FROM tb_absensi WHERE MONTH(tgl_kunjung)='".$_GET['bulan']."' AND YEAR(tgl_kunjung)='".$_GET['tahun']."'"; 
		}else{ 

			$query = "SELECT * FROM tb_absensi WHERE YEAR(tgl_kunjung)='".$_GET['tahun']."'"; 
		}
}else{ 

	$query = "SELECT * FROM tb_absensi ORDER BY tgl_kunjung"; 
}

$sql = mysqli_query($con, $query); 
$row = mysqli_num_rows($sql); 
$no = 1;
while($data = mysqli_fetch_array($sql)){ 
$implode1 = array($data['kelas'], $data['waktu']);
$a = implode(" ", $implode1);
$implode2 = array('Semester', $data['semester']);
$b = implode(" ", $implode2);
$implode3 = array($a, $b);
$tgl_p = date('d-m-Y', strtotime($data['tgl_kunjung']));  

$pdf->SetFont('Arial','',11);
$pdf->Cell(10,8,$no++,1,0,'L');
$pdf->Cell(60,8,$data['nama'],1,0,'L');
$pdf->Cell(58,8,$data['prodi'],1,0,'L');
$pdf->Cell(45,8,implode("/", $implode3),1,0,'L');
$pdf->Cell(37,8,$tgl_p,1,0,'L');
$pdf->Cell(37,8,$data['jam_kunjung'],1,1,'L');

}

function bulan(){
	$month = date('m');
					 
	switch($month){

		case '01':
			$bulan = "Januari";
		break;
					 
		case '02':			
			$bulan = "Februari";
		break;
					 
		case '03':
			$bulan = "Maret";
		break;
					 
		case '04':
			$bulan = "April";
		break;
					 
		case '05':
			$bulan = "Mei";
		break;
					 
		case '06':
			$bulan = "Juni";
		break;
					 
		case '07':
			$bulan = "Juli";
		break;

		case '08':
			$bulan = "Agustus";
		break;

		case '09':
			$bulan = "September";
		break;

		case '10':
			$bulan = "Oktober";
		break;

		case '11':
			$bulan = "November";
		break;

		case '12':
			$bulan = "Desember";
		break;
							
		default:
			$bulan = "Tidak di ketahui";		
		break;
	}
					 
	return $bulan;
					 
}

$tanggal = date('d');
$tahun = date('Y');

$pdf->SetFont('Arial','',11);
$pdf->Cell(0,15,'',0,1);
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(0,12,'Medan'.', '.$tanggal.' '.bulan().' '.$tahun,0,1,'R');
$pdf->Cell(0,0,'Ka.'.' Bid. '.' Perpustakaan',0,1,'R');
$pdf->Cell(0,14,'Institut'.' Teknologi'.' Indonesia',0,1,'R');
$pdf->Cell(0,20,'',0,1);
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(0,0,'Rahma'.' Ninda     ',0,1,'R');

$pdf->Ln(5);

$pdf->ln(1);
$pdf->SetFont('Arial','B',7);

$pdf->Cell(30,0.7,"Di cetak pada : ".date("d/m/Y"),0,0,'C');
$pdf->Output("laporan_pengunjung", "I");
?>
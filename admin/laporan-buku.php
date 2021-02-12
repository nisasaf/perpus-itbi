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
$pdf->Cell(0,12,'DATA BUKU',0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,8,'No.',1,0,'C');
$pdf->Cell(30,8,'Kode Buku',1,0,'C');
$pdf->Cell(55,8,'Judul Buku',1,0,'C');
$pdf->Cell(48,8,'Penulis',1,0,'C');
$pdf->Cell(35,8,'Penerbit',1,0,'C');
$pdf->Cell(30,8,'Sumber',1,0,'C');
$pdf->Cell(30,8,'Jumlah',1,0,'C');
$pdf->Cell(39,8,'Tanggal Input',1,1,'C');


if(isset($_GET['filter3']) && ! empty($_GET['filter3'])){
  $filter3 = $_GET['filter3']; 

    if($filter3 == '1'){ 
      $tgl = date('d-m-y', strtotime($_GET['tanggal3']));

      $query3 = "SELECT * FROM tb_buku WHERE DATE(tgl_input)='".$_GET['tanggal3']."'"; 

    }else if($filter3 == '2'){ 
      $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

      $query3 = "SELECT * FROM tb_buku WHERE MONTH(tgl_input)='".$_GET['bulan3']."' AND YEAR(tgl_input)='".$_GET['tahun3']."'"; 
    }else{ 

      $query3 = "SELECT * FROM tb_buku WHERE YEAR(tgl_input)='".$_GET['tahun3']."'"; 
    }
}else{ 

  $query3 = "SELECT * FROM tb_buku ORDER BY tgl_input"; 
}

$sql3 = mysqli_query($con, $query3); 
$row3 = mysqli_num_rows($sql3); 
$no = 1;
while($data3 = mysqli_fetch_array($sql3)){ 
$tgl_p3 = date('d-m-Y', strtotime($data3['tgl_input']));  

$pdf->SetFont('Arial','',11);
$pdf->Cell(10,8,$no++,1,0,'L');
$pdf->Cell(30,8,$data3['kd_buku'],1,0,'L');
$pdf->Cell(55,8,$data3['judul'],1,0,'L');
$pdf->Cell(48,8,$data3['penulis'],1,0,'L');
$pdf->Cell(35,8,$data3['penerbit'],1,0,'L');
$pdf->Cell(30,8,$data3['asal'],1,0,'L');
$pdf->Cell(30,8,$data3['jumlah'],1,0,'L');
$pdf->Cell(39,8,$tgl_p3,1,1,'L');

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
$pdf->Output("laporan_peminjaman", "I");
?>
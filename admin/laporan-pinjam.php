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
$pdf->Cell(0,12,'DATA PEMINJAMAN',0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,8,'No.',1,0,'C');
$pdf->Cell(25,8,'Kode Buku',1,0,'C');
$pdf->Cell(90,8,'Judul Buku',1,0,'C');
$pdf->Cell(25,8,'NIM',1,0,'C');
$pdf->Cell(45,8,'Peminjam',1,0,'C');
$pdf->Cell(43,8,'Tanggal Pinjam',1,0,'C');
$pdf->Cell(39,8,'Jam Kembali',1,1,'C');


if(isset($_GET['filter2']) && ! empty($_GET['filter2'])){
  $filter2 = $_GET['filter2']; 

    if($filter2 == '1'){ 
      $tgl = date('d-m-y', strtotime($_GET['tanggal2']));

      $query2 = "SELECT * FROM tb_transaksi WHERE DATE(tgl_pinjam)='".$_GET['tanggal2']."'"; 

    }else if($filter2 == '2'){ 
      $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

      $query2 = "SELECT * FROM tb_transaksi WHERE MONTH(tgl_pinjam)='".$_GET['bulan2']."' AND YEAR(tgl_pinjam)='".$_GET['tahun2']."'"; 
    }else{ 

      $query2 = "SELECT * FROM tb_transaksi WHERE YEAR(tgl_pinjam)='".$_GET['tahun2']."'"; 
    }
}else{ 

  $query2 = "SELECT * FROM tb_transaksi ORDER BY tgl_pinjam"; 
}

$sql2 = mysqli_query($con, $query2); 
$row2 = mysqli_num_rows($sql2); 
$no = 1;
while($data2 = mysqli_fetch_array($sql2)){ 
$tgl_p2 = date('d-m-Y', strtotime($data2['tgl_pinjam']));  

$pdf->SetFont('Arial','',11);
$pdf->Cell(10,8,$no++,1,0,'L');
$pdf->Cell(25,8,$data2['kd_buku'],1,0,'L');
$pdf->Cell(90,8,$data2['judul'],1,0,'L');
$pdf->Cell(25,8,$data2['nim'],1,0,'L');
$pdf->Cell(45,8,$data2['peminjam'],1,0,'L');
$pdf->Cell(43,8,$tgl_p2,1,0,'L');
$pdf->Cell(39,8,$data2['tgl_kembali'],1,1,'L');

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
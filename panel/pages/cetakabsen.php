<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<?php 
require('fpdf/fpdf.php'); 
include "../../config/server.php";
// pendefinisian folder font pada FPDF
// seperti sebelunya, kita membuat class anakan dari class FPDF
 class PDF extends FPDF{

function Header(){

$sqlad = mysql_query("select * from cbt_admin");

$ad = mysql_fetch_array($sqlad);
$namsek = strtoupper($ad['XSekolah']);
$kepsek = $ad['XKepSek'];
$logsek = $ad['XLogo'];

   $this->Image('../../images/'.$logsek,1,1,1.5); // logo
   $this->SetTextColor(0,0,0); // warna tulisan
   $this->SetFont('Arial','B','12'); // font yang digunakan
   // membuat cell dg panjang 19 dan align center 'C'
   $this->Cell(3,1,''); // cell dengan panjang 1
   $this->Cell(13,1,'DAFTAR HADIR PESERTA UBK '. $namsek. '',0,0,'L');
   $this->Ln(0.5);
   $this->SetFont('Arial','','12');
   $this->SetFillColor(192,192,192); // warna isi   
   $this->Cell(3,1,''); // cell dengan panjang 1 
   $this->Cell(13,1,'Kelas : '. $_REQUEST['kelas']. ', Tahun Ajaran : ' . $_COOKIE['beetahun'],0,0,'L');
   $this->Ln(0.5);
   $this->Cell(3,1,''); // cell dengan panjang 1 
   $this->Cell(13,1,'Sesi : '. $_REQUEST['sesi']. ', Ruang : ' . $_REQUEST['ruang'],0,0,'L');
   $this->Ln(1);
   $this->SetFont('Arial','B','9');
   $this->SetFillColor(192,192,192); // warna isi
   $this->Ln(0.5);
   $this->SetTextColor(0,0,0); // warna teks untuk th
   $this->Cell(1,1,'No','LTB',0,'C',1); // cell dengan panjang 1
   $this->Cell(2,1,'No. Ujian','LTB',0,'C',1); // cell dengan panjang 1
   $this->Cell(2,1,'NIS','LTB',0,'C',1); // cell dengan panjang 2
   $this->Cell(8,1,'Nama Siswa','LTB',0,'C',1); // cell dengan panjang 3
   $this->Cell(6,1,'Tanda Tangan','LTBR',0,'C',1); // cell dengan panjang 3
   
   // panjang cell bisa disesuaikan
   $this->Ln();
  }

  function Footer(){
   $this->SetY(-2,5);
   $this->Cell(0,1,'CBT BEESMART  - Halaman : '. $this->PageNo(),0,0,'C');
  } 
 }
if(isset($_REQUEST['kelas'])){ 
 $q = mysql_query("SELECT * FROM cbt_siswa where XKodeKelas = '$_REQUEST[kelas]' and  XKodeJurusan = '$_REQUEST[jur]'  and  XSesi = '$_REQUEST[sesi]' and  XRuang = '$_REQUEST[ruang]'");
 } else {
 $q = mysql_query("select * from cbt_siswa  ");
 } 
 $i = 0;
 
 while($d=mysql_fetch_array($q)){
  $cell[$i][0]=$d[0];
  $cell[$i][1]=$d[1];
  $cell[$i][2]=$d[2];
  $cell[$i][3]=$d[3];  
  $cell[$i][4]=$d[4];    
  $i++;
 }
 // orientasi Potrait
 // ukuran cm
 // kertas A4
 $pdf = new PDF('P','cm','A4');
 $pdf->Open();
 $pdf->AliasNbPages();
 $pdf->AddPage();

 $pdf->SetFont('Arial','','8');
 //perulangan untuk membuat tabel
 for($j=0;$j<$i;$j++){
  $pdf->Cell(1,1,$j+1,'LB',0,'C');
  $pdf->Cell(2,1,$cell[$j][1],'LB',0,'C');
  $pdf->Cell(2,1,$cell[$j][2],'LB',0,'C');  
  $pdf->Cell(8,1,$cell[$j][4],'LBR',0,'L');
	if ($j % 2 == 0) {
  	$pdf->Cell(3,1,$j+1,'B',0,'L'); 	
	$pdf->Cell(3,1," ",'BR',0,'L');      
  	} else {
  	$pdf->Cell(3,1," ",'B',0,'L'); 	
	$pdf->Cell(3,1,$j+1,'BR',0,'L');      
	}	
  $pdf->Ln();
 }

 $pdf->Output(); // ditampilkan

?>
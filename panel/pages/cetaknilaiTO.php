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

$sqk = mysql_query("select * from cbt_mapel where XKodeMapel = '$_REQUEST[mapz]'");
$rs = mysql_fetch_array($sqk);
$rs1 = strtoupper("$rs[XNamaMapel]");
$NilaiKKMe = $rs['XKKM'];

   $this->Image('../../images/'.$logsek,1,1,2.0); // logo
   $this->SetTextColor(0,0,0); // warna tulisan
   $this->SetFont('Arial','B','12'); // font yang digunakan
   // membuat cell dg panjang 19 dan align center 'C'
   $this->Cell(3,1,''); // cell dengan panjang 1
   $this->Cell(13,1,'DAFTAR NILAI TRYOUT '. $namsek. '',0,0,'L',0);
   $this->SetFont('Arial','','10');     
   $this->Cell(0,1,'BSMART - Hal. : '. $this->PageNo(),0,0,'R');
   
   $this->Ln(0.6);
   $this->SetFont('Arial','','10');     
   $this->Cell(3,1,''); // cell dengan panjang 1   
   $this->Cell(4,1,"Mata Pelajaran ",0,0,'L');
   $this->Cell(3,1,": ".$rs1,0,0,'L');   
   $this->Ln(0.5);
   $this->Cell(3,1,''); // cell dengan panjang 1   
   $this->Cell(4,1,"Kelas | Jurusan ",0,0,'L');
   $this->Cell(3,1,": ".$_REQUEST['kelz']." | ".$_REQUEST['jurz'],0,0,'L'); 
   $this->Ln(0.5);
   $this->Cell(3,1,''); // cell dengan panjang 1   
   $this->Cell(4,1,"Tahun Akademik ",0,0,'L');
   $this->Cell(3,1,": ".$_COOKIE['beetahun']." Semester : ".$_REQUEST['semz'],0,0,'L');    
   $this->Ln(0.5);
   $this->Ln(1);
   $this->SetFont('Arial','B','9');
   $this->SetFillColor(192,192,192); // warna isi
   
   $this->SetTextColor(0,0,0); // warna teks untuk th
   $this->Cell(0.8,1,'No','LT',0,'C',1); // cell dengan panjang 1
   $this->Cell(1.7,1,'NIS','LT',0,'C',1); // cell dengan panjang 1
   $this->Cell(5.9,1,'Nama Siswa','LT',0,'C',1); // cell dengan panjang 3
   $this->Cell(7.5,1,'Try Out','LTB',0,'C',1); // cell dengan panjang 2   
   $this->Cell(1.5,1,'Rata2','LT',0,'C',1); // cell dengan panjang 1
   $this->Cell(1.5,1,'KKM','LTR',0,'C',1); // cell dengan panjang 1
   
   // panjang cell bisa disesuaikan
   $this->Ln();      
     
   $this->SetTextColor(0,0,0); // warna teks untuk th
   $this->Cell(0.8,1,'','LB',0,'C',1); // cell dengan panjang 1
   $this->Cell(1.7,1,'','LB',0,'C',1); // cell dengan panjang 1
   $this->Cell(5.9,1,' ','LB',0,'C',1); // cell dengan panjang 8
   $this->Cell(1.5,1,'TO1','LTB',0,'C',1); // cell dengan panjang 2   
   $this->Cell(1.5,1,'TO2','LTB',0,'C',1); // cell dengan panjang 2      
   $this->Cell(1.5,1,'TO3','LTBR',0,'C',1); // cell dengan panjang 3
   $this->Cell(1.5,1,'TO4','LTBR',0,'C',1); // cell dengan panjang 3
   $this->Cell(1.5,1,'TO5','LTB',0,'C',1); // cell dengan panjang 2           
   $this->Cell(1.5,1,'','LB',0,'C',1); // cell dengan panjang 1
   $this->Cell(1.5,1,'','LBR',0,'C',1); // cell dengan panjang 1

   // panjang cell bisa disesuaikan
   $this->Ln();
   
   
  }

  function Footer(){
$sqlad = mysql_query("select * from cbt_admin");
$ad = mysql_fetch_array($sqlad);
$namsek = strtoupper($ad['XSekolah']);
$kepsek = $ad['XKepSek'];
$this->SetY(26.5); 
   $this->Cell(2,1,''); 
   $this->Cell(0,1,'Kepala Sekolah : ',0,0,'L');
   $this->Cell(0,1,'Guru  :                            ',0,0,'R');

	$this->SetY(28);  
   	$this->Cell(2,1,'');
	$this->Cell(0,1, '('.$kepsek.')',0,0,'L');
	$this->Cell(0,1,'( ____________________ )              ',0,0,'R');
	
  /*
   $this->SetY(-2.5,5);
   $this->Cell(3,1,'');
   $this->Cell(0,1,'Kepala Sekolah : ',0,0,'L');
   $this->Cell(0,1,'Guru  :                            ',0,0,'R');
   $this->SetY(-1.5,5);
   $this->Cell(3,1,'');
   $this->Cell(0,1, '('.$kepsek.')',0,0,'L');
   $this->Cell(0,1,'Guru  : ',0,0,'R');
  */ 
  } 
 }
 /*
 if(isset($_REQUEST['kelz'])){ 
 $q = mysql_query("select * from cbt_siswa  where XKodeKelas = '$_REQUEST[kelz]' and  XKodeJurusan = '$_REQUEST[jurz]'");
 } else {
 $q = mysql_query("select * from cbt_siswa  ");
 } 
 */
 
 $i = 0;
$nomz = 1;
if(isset($_REQUEST['kelz'])){ 
$cekQuery1 = mysql_query("SELECT * FROM cbt_siswa where XKodeKelas = '$_REQUEST[kelz]' and  XKodeJurusan = '$_REQUEST[jurz]'");
}else{
$cekQuery1 = mysql_query("SELECT * FROM cbt_siswa");
}
$jumlahTO = 0;
while($f= mysql_fetch_array($cekQuery1)){

$sto1 = mysql_query("
SELECT sum(XNilai) as totTO1, count(XNilai) as jujum2 FROM cbt_nilai where  (XKodeKelas = '$_REQUEST[kelz]' or XKodeKelas='ALL') and XNIK = '$f[XNIK]' and XKodeUjian = 'TO1' 
and	XKodeMapel = '$_REQUEST[mapz]' and XSemester = '$_REQUEST[semz]' and XSetId='$_COOKIE[beetahun]'");
$to1 = mysql_fetch_array($sto1);
$tot1 = $to1['totTO1'];
if($tot1==""){ 
$TOP1 = "";
} else {
$TOP1 = number_format($tot1, 2, ',', '.');
}

$sto2 = mysql_query("
SELECT sum(XNilai) as totTO2, count(XNilai) as jujum2 FROM cbt_nilai where  (XKodeKelas = '$_REQUEST[kelz]' or XKodeKelas='ALL') and XNIK = '$f[XNIK]' and XKodeUjian = 'TO2' 
and	XKodeMapel = '$_REQUEST[mapz]' and XSemester = '$_REQUEST[semz]' and XSetId='$_COOKIE[beetahun]'");
$to2 = mysql_fetch_array($sto2);
$tot2 = $to2['totTO2'];
if($tot2==""){ 
$TOP2 = "";
} else {
$TOP2 = number_format($tot2, 2, ',', '.');
}

$sto3 = mysql_query("
SELECT sum(XNilai) as totTO3, count(XNilai) as jujum2 FROM cbt_nilai where  (XKodeKelas = '$_REQUEST[kelz]' or XKodeKelas='ALL') and XNIK = '$f[XNIK]' and XKodeUjian = 'TO3' 
and	XKodeMapel = '$_REQUEST[mapz]' and XSemester = '$_REQUEST[semz]' and XSetId='$_COOKIE[beetahun]'");
$to3 = mysql_fetch_array($sto3);
$tot3 = $to3['totTO3'];
if($tot3==""){ 
$TOP3 = "";
} else {
$TOP3 = number_format($tot3, 2, ',', '.');
}

$sto4 = mysql_query("
SELECT sum(XNilai) as totTO4, count(XNilai) as jujum2 FROM cbt_nilai where  (XKodeKelas = '$_REQUEST[kelz]' or XKodeKelas='ALL') and XNIK = '$f[XNIK]' and XKodeUjian = 'TO4' 
and	XKodeMapel = '$_REQUEST[mapz]' and XSemester = '$_REQUEST[semz]' and XSetId='$_COOKIE[beetahun]'");
$to4 = mysql_fetch_array($sto4);
$tot4 = $to4['totTO4'];
if($tot4==""){ 
$TOP4 = "";
} else {
$TOP4 = number_format($tot4, 2, ',', '.');
}

$sto5 = mysql_query("
SELECT sum(XNilai) as totTO5, count(XNilai) as jujum2 FROM cbt_nilai where  (XKodeKelas = '$_REQUEST[kelz]' or XKodeKelas='ALL') and XNIK = '$f[XNIK]' and XKodeUjian = 'TO5' 
and	XKodeMapel = '$_REQUEST[mapz]' and XSemester = '$_REQUEST[semz]' and XSetId='$_COOKIE[beetahun]'");
$to5 = mysql_fetch_array($sto5);
$tot5 = $to5['totTO5'];
if($tot5==""){ 
$TOP5 = "";
} else {
$TOP5 = number_format($tot5, 2, ',', '.');
}

$sqk = mysql_query("select * from cbt_mapel where XKodeMapel = '$_REQUEST[mapz]'");
$rs = mysql_fetch_array($sqk);
$NilaiKKMe = $rs['XKKM'];

$jto = mysql_query("
SELECT * FROM cbt_nilai where XNomerUjian = '$f[XNomerUjian]' and XKodeUjian like 'TO%' 
and	XKodeMapel = '$_REQUEST[mapz]' and XSemester = '$_REQUEST[semz]' and XSetId='$_COOKIE[beetahun]'");

$jumlahTO = mysql_num_rows($jto);

$TAkhire = $tot1+$tot2+$tot3+$tot4+$tot5;
if($jumlahTO==0){$TOTAkhire = "";$NilaiKKM = "";} else {$TOTAkhire = number_format(($TAkhire/$jumlahTO), 2, ',', '.');; $NilaiKKM = $NilaiKKMe;}

//if($TAkhire == 0){$TOTAkhire = "";$NilaiKKM = "";} else {$TOTAkhire = number_format(($TAkhire/$jumlahTO), 2, ',', '.')}

 
//if($totUH1==''){$TotAkhir = "";}

//$tampilKKM = number_format($NilaiKKM, 2, ',', '.');
	
  $cell[$i][0]=$f[0];
  $cell[$i][1]=$f[2];
  $cell[$i][2]=$f[4];
  $cell[$i][3] =$TOP1;  
  $cell[$i][4] =$TOP2; 
  $cell[$i][5] =$TOP3;  
  $cell[$i][6] =$TOP4;
  $cell[$i][7] =$TOP5; 
  $cell[$i][8]= $TOTAkhire;  
  $cell[$i][9]= $NilaiKKM;      
  $i++;
 }
 // orientasi Potrait
 // ukuran cm
 // kertas A4
 $pdf = new PDF('P','cm','A4');
 $pdf->Open();
 $pdf->AliasNbPages();
 $pdf->AddPage();
 $pdf->SetAutoPageBreak('true',3);

 $pdf->SetFont('Arial','','8');
 //perulangan untuk membuat tabel
 for($j=0;$j<$i;$j++){
  $pdf->Cell(0.8,1,$j+1,'LB',0,'C');
  $pdf->Cell(1.7,1,$cell[$j][1],'LB',0,'C');
  $pdf->Cell(5.9,1,$cell[$j][2],'LB',0,'L');
  $pdf->Cell(1.5,1,$cell[$j][3],'LB',0,'C');  
  $pdf->Cell(1.5,1,$cell[$j][4],'LB',0,'L');
  $pdf->Cell(1.5,1,$cell[$j][5],'LB',0,'C');  
  $pdf->Cell(1.5,1,$cell[$j][6],'LB',0,'L');
  $pdf->Cell(1.5,1,$cell[$j][7],'LB',0,'C');  
  $pdf->Cell(1.5,1,$cell[$j][8],'LB',0,'C');
  $pdf->Cell(1.5,1,$cell[$j][9],'LBR',0,'C');  
 
  $pdf->Ln();
 }

 $pdf->Output(); // ditampilkan

?>
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

   $this->Image('../../images/'.$logsek,1,1,2.0); // logo
   $this->SetTextColor(0,0,0); // warna tulisan
   $this->SetFont('Arial','B','12'); // font yang digunakan
   // membuat cell dg panjang 19 dan align center 'C'
   $this->Cell(3,1,''); // cell dengan panjang 1
   $this->Cell(13,1,'DAFTAR NILAI '. $namsek. '',0,0,'L',0);
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
   $this->Cell(3,1,": ".$_REQUEST['kelas']." | ".$_REQUEST['jur'],0,0,'L'); 
   $this->Ln(0.5);
   $this->Cell(3,1,''); // cell dengan panjang 1   
   $this->Cell(4,1,"Tahun Akademik ",0,0,'L');
   $this->Cell(3,1,": ".$_COOKIE['beetahun'],0,0,'L');    
   $this->Ln(0.5);
   $this->Ln(1);
   $this->SetFont('Arial','B','9');
   $this->SetFillColor(192,192,192); // warna isi
   
   $this->SetTextColor(0,0,0); // warna teks untuk th
   $this->Cell(0.8,1,'No','LT',0,'C',1); // cell dengan panjang 1
   $this->Cell(1.7,1,'NIS','LT',0,'C',1); // cell dengan panjang 1
   $this->Cell(5,1,'Nama Siswa','LT',0,'C',1); // cell dengan panjang 3
   $this->Cell(5,1,'Semester 1','LTB',0,'C',1); // cell dengan panjang 2   
   $this->Cell(5,1,'Semester 2','LTBR',0,'C',1); // cell dengan panjang 3
   $this->Cell(1,1,'NA','LT',0,'C',1); // cell dengan panjang 1
   $this->Cell(1,1,'KKM','LTR',0,'C',1); // cell dengan panjang 1
   
   // panjang cell bisa disesuaikan
   $this->Ln();      
     
   $this->SetTextColor(0,0,0); // warna teks untuk th
   $this->Cell(0.8,1,'','LB',0,'C',1); // cell dengan panjang 1
   $this->Cell(1.7,1,'','LB',0,'C',1); // cell dengan panjang 1
   $this->Cell(5,1,' ','LB',0,'C',1); // cell dengan panjang 3
   $this->Cell(1,1,'UH','LTB',0,'C',1); // cell dengan panjang 2   
   $this->Cell(1,1,'TG','LTB',0,'C',1); // cell dengan panjang 2      
   $this->Cell(1,1,'UTS','LTBR',0,'C',1); // cell dengan panjang 3
   $this->Cell(1,1,'UAS','LTBR',0,'C',1); // cell dengan panjang 3
   $this->Cell(1,1,'NILAI','LTB',0,'C',1); // cell dengan panjang 2   
   $this->Cell(1,1,'UH','LTB',0,'C',1); // cell dengan panjang 2   
   $this->Cell(1,1,'TG','LTB',0,'C',1); // cell dengan panjang 2      
   $this->Cell(1,1,'UTS','LTBR',0,'C',1); // cell dengan panjang 3
   $this->Cell(1,1,'UAS','LTBR',0,'C',1); // cell dengan panjang 3
   $this->Cell(1,1,'NILAI','LTB',0,'C',1); // cell dengan panjang 2         
   $this->Cell(1,1,'','LB',0,'C',1); // cell dengan panjang 1
   $this->Cell(1,1,'','LBR',0,'C',1); // cell dengan panjang 1

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
if(isset($_REQUEST['kelas'])){ 

 $q = mysql_query("select * from cbt_siswa  where XKodeKelas = '$_REQUEST[kelas]' and  XKodeJurusan = '$_REQUEST[jur]'");
 } else {
 $q = mysql_query("select * from cbt_siswa  ");
 } 
 $i = 0;
	$per = mysql_query("SELECT * from cbt_mapel where XKodeMapel = '$_REQUEST[mapz]'");
	$p = mysql_fetch_array($per);
	$perUH = $p['XPersenUH'];
	$perUTS = $p['XPersenUTS'];
	$perUAS = $p['XPersenUAS'];
	$NilaiKKM = number_format($p['XKKM'], 2, ',', '.');
 
 while($d=mysql_fetch_array($q)){
 
 /********* Semester 1 ***************/
 
	$utg = mysql_query("SELECT sum(XNilaiTugas) as totUG, count(XNilaiTugas) as jujumG FROM cbt_tugas where XNIK = '$d[XNIK]' and 
	XKodeMapel = '$_REQUEST[mapz]' and XSemester = '1' and XSetId='$_COOKIE[beetahun]'");
	$tug = mysql_fetch_array($utg);
	if(isset($tug['totUG'])){$totUG1 = number_format(($tug['totUG']/$tug['jujumG']), 2, ',', '.');
	$TUG1 = ($tug['totUG']/$tug['jujumG']);
	} else {$totUG1="";$TUG1="";}

	$uh = mysql_query("
	SELECT sum(XNilai) as totUH, count(XNilai) as jujum FROM `cbt_jawaban` j left join cbt_ujian u on u.XTokenUjian = j.XTokenUjian WHERE XUserJawab = '$d[XNomerUjian]' 
	and u.XKodeUjian = 'UH' and u.XKodeMapel = '$_REQUEST[mapz]' and u.XSemester = '1' and u.XSetId='$_COOKIE[beetahun]'");
	$tuh = mysql_fetch_array($uh);
	

	if(isset($tuh['totUH'])){$totUH1 = number_format(($tuh['totUH']/$tuh['jujum'])*100, 2, ',', '.');
	$TUH1 = ($tuh['totUH']/$tuh['jujum']);
	} else {$totUH1="";$TUH1 = "";}
	
	$uts = mysql_query("SELECT sum(XNilai) as totUTS FROM cbt_nilai where XNIK = '$d[XNIK]' and XKodeUjian = 'UTS' and XKodeMapel = 
	'$_REQUEST[mapz]' and XSemester = '1' and XSetId='$_COOKIE[beetahun]'");
	$tuts = mysql_fetch_array($uts);
	if(isset($tuts['totUTS'])){$totUTS1 = number_format($tuts['totUTS'], 2, ',', '.');
	$TUTS1 = $tuts['totUTS'];
	} else {$totUTS1="";$TUTS1="";}	

	$uas = mysql_query("SELECT sum(XNilai) as totUAS FROM cbt_nilai where XNIK = '$d[XNIK]' and XKodeUjian = 'UAS' and XKodeMapel = 
	'$_REQUEST[mapz]' and XSemester = '1' and XSetId='$_COOKIE[beetahun]'");
	$tuas = mysql_fetch_array($uas);
	if(isset($tuas['totUAS'])){$totUAS1 = number_format($tuas['totUAS'], 2, ',', '.');
	$TUAS1 = $tuas['totUAS'];
	} else {$totUAS1="";$TUAS1="";}	

	//nilai akhir semester1
	//NR = 60% (RU&T)+ 20% (UTS)  + 20% (UAS)
if(!$totUH1==""){
	$NUH1 = $TUH1;
	$NUG1 = $TUG1;	
	if($NUG1==""){$NH1   = $NUH1;} else {$NH1   = ($NUH1+$NUG1)/2; }//Nilai Harian
	$NUT1 = $TUTS1;	
	$NUA1 = $TUAS1;	
	
	//$NA1  = ($NH1*($perUH/100))+($NUT1*($perUTS/100))+($NUA1*($perUAS/100)); // bila dihitung dari presentase
	$NA1  = ($NH1*($perUH))+($NUT1*($perUTS))+($NUA1*($perUAS)); // bila dihitung dari presentase
	//$NA1  = ( ($NH1*2)+$NUT1+$NUA1 )/4 ; //
	$totNA1 = 	number_format($NA1, 2, ',', '.');

} else { $NA1 = ""; $totNA1 = "";}


 /********* Semester 2 ***************/

	$utg2 = mysql_query("SELECT sum(XNilaiTugas) as totUG2, count(XNilaiTugas) as jujumG2 FROM cbt_tugas where XNIK = '$d[XNIK]' and 
	XKodeMapel = '$_REQUEST[mapz]' and XSemester = '2' and XSetId='$_COOKIE[beetahun]'");

	$tug2 = mysql_fetch_array($utg2);
	if(isset($tug2['totUG2'])){$totUG2 = number_format(($tug2['totUG2']/$tug2['jujumG2']), 2, ',', '.');
	$TUG2 = ($tug2['totUG2']/$tug2['jujumG2']);
	} else {$totUG2="";$TUG2 ="";}


	$uh2 = mysql_query("SELECT sum(XNilai) as totUH2, count(XNilai) as jujum2 FROM cbt_nilai where XNIK = '$d[XNIK]' and XKodeUjian = 'UH' 
	and	XKodeMapel = '$_REQUEST[mapz]' and XSemester = '2' and XSetId='$_COOKIE[beetahun]'");

	$tuh2 = mysql_fetch_array($uh2);
	if(isset($tuh2['totUH2'])){$totUH2 = number_format(($tuh2['totUH2']/$tuh2['jujum2']), 2, ',', '.');
	$TUH2 = ($tuh2['totUH2']/$tuh2['jujum2']);} else {$totUH2="";$TUH2 ="";}

	$uts2 = mysql_query("SELECT sum(XNilai) as totUTS2 FROM cbt_nilai where XNIK = '$d[XNIK]' and XKodeUjian = 'UTS' and XKodeMapel = '$_REQUEST[mapz]' and XSemester = '2' and XSetId='$_COOKIE[beetahun]'");
	$tuts2 = mysql_fetch_array($uts2);
	if(isset($tuts2['totUTS2'])){$totUTS2 = number_format($tuts2['totUTS2'], 2, ',', '.');
	$TUTS2 = $tuts2['totUTS2'];
	} else {$totUTS2="";$TUTS2="";}	

	$uas2 = mysql_query("SELECT sum(XNilai) as totUAS2 FROM cbt_nilai where XNIK = '$d[XNIK]' and XKodeUjian = 'UAS' and XKodeMapel = '$_REQUEST[mapz]' and XSemester = '2' and XSetId='$_COOKIE[beetahun]'");
	$tuas2 = mysql_fetch_array($uas2);
	if(isset($tuas2['totUAS2'])){$totUAS2 = number_format($tuas2['totUAS2'], 2, ',', '.');
	$TUAS2 = $tuas2['totUAS2'];
	} else {$totUAS2="";$TUAS2="";}	

if(!$totUH2==""){
	$NUH2 = $TUH2;
	$NUG2 = $TUG2;	
	$NH2   = ($NUH2+$NUG2)/2; //Nilai Harian
	$NUT2 = $TUTS2;	
	$NUA2 = $TUAS2;	
	
	$NA2  = ($NH2*($perUH/100))+($NUT2*($perUTS/100))+($NUA2*($perUAS/100)); // bila dihitung dari presentase
	//$NA1  = ( ($NH1*2)+$NUT1+$NUA1 )/4 ; //
	$totNA2 = 	number_format($NA2, 2, ',', '.');
	
} else { $totNA2 = "";}

if(!isset($NA2)){ $NA2 = 0;}

	if($NA2==""){$TotAkhir = ($NA1+$NA2);} else {$TotAkhir = ($NA1+$NA2)/2;}
	
$TotAkhire = number_format($TotAkhir, 2, ',', '.');

//if($totUH1==''){$TotAkhir = "";}

//$tampilKKM = number_format($NilaiKKM, 2, ',', '.');
	
  $cell[$i][0]=$d[0];
  $cell[$i][1]=$d[2];
  $cell[$i][2]=$d[4];
  $cell[$i][3] =$totUH1;  
  $cell[$i][4] =$totUG1; 
  $cell[$i][5] =$totUTS1;  
  $cell[$i][6] =$totUAS1;
  $cell[$i][7] =$totNA1; 
  $cell[$i][8] =$totUH2;  
  $cell[$i][9] =$totUG2; 
  $cell[$i][10]=$totUTS2;  
  $cell[$i][11]=$totUAS2;
  $cell[$i][12]=$totNA2;  
  $cell[$i][13]=$TotAkhire;  
  $cell[$i][14]=$NilaiKKM;      
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
  $pdf->Cell(5,1,$cell[$j][2],'LB',0,'L');
  $pdf->Cell(1,1,$cell[$j][3],'LB',0,'C');  
  $pdf->Cell(1,1,$cell[$j][4],'LB',0,'L');
  $pdf->Cell(1,1,$cell[$j][5],'LB',0,'C');  
  $pdf->Cell(1,1,$cell[$j][6],'LB',0,'L');
  $pdf->Cell(1,1,$cell[$j][7],'LB',0,'C');  
  $pdf->Cell(1,1,$cell[$j][8],'LB',0,'L');
  $pdf->Cell(1,1,$cell[$j][9],'LB',0,'C');  
  $pdf->Cell(1,1,$cell[$j][10],'LB',0,'L');
  $pdf->Cell(1,1,$cell[$j][11],'LB',0,'C');  
  $pdf->Cell(1,1,$cell[$j][12],'LBR',0,'L');   
  $pdf->Cell(1,1,$cell[$j][13],'LB',0,'C');  
  $pdf->Cell(1,1,$cell[$j][14],'LBR',0,'L');   
  $pdf->Ln();
 }

 $pdf->Output(); // ditampilkan

?>
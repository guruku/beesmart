<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<html class="home-bg">
<head>
<title>CBT BEESMART  | Cetak Hasil Ujian</title>
  <script type="text/javascript"
  src="../../MathJax/MathJax.js?config=AM_HTMLorMML-full"></script>
<!-- script untuk refresh/reload mathjax setiap content baru !-->
<script>
  MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
</script>
</head>
<body>
    <link href="css/nedna.css" rel="stylesheet">
<style>@media print {
    footer {page-break-after: always; top:20px}
	@page {
	  size: A4;
	  margin-bottom: 50px;
	  
	}

}
</style>
<style type="text/css" media="screen">
	.pageNumber { content: counter(page) }
#print-footer {
    display: none;
}
</style>
<style type="text/css" media="print">
#print-footer {
    display: block;
    position: fixed;
    bottom: 0;
    right:0;
	font:Arial, Helvetica, sans-serif; 
	font-size:13px;
	color:#ccc
}
</style>

<?php

include "../../config/server.php";
?>
<?php
$hasil = mysql_query("SELECT *,u.XStatusUjian as ujsta
FROM cbt_siswa s
LEFT JOIN `cbt_siswa_ujian` u ON u.XNomerUjian = s.XNomerUjian
LEFT JOIN cbt_ujian c ON (u.XKodeSoal = c.XKodeSoal and u.XTokenUjian = c.XTokenUjian)
LEFT JOIN cbt_paketsoal p ON (u.XKodeSoal = c.XKodeSoal and u.XTokenUjian = c.XTokenUjian)
WHERE c.XKodeSoal = '$_REQUEST[soal]' and p.XKodeSoal = '$_REQUEST[soal]' and u.XNomerUjian = '$_REQUEST[siswa]'");
$baris = 4;
$no = 0;	
while($p = mysql_fetch_array($hasil)){
	$var_token = "$p[XTokenUjian]";
	$var_soal = "$p[XKodeSoal]";
	$var_mapel = "$p[XKodeMapel]";	
	$var_jumsoal = "$p[XJumSoal]";
	$var_pil = "$p[XPilGanda]";	
	$var_esai = "$p[XEsai]";	
	$per_pil = "$p[XPersenPil]";	
	$per_esai = "$p[XPersenEsai]";	
	$tglujian = "$p[XTglUjian]";		
}		
$var_siswa = "$_REQUEST[siswa]";

	$sqlujian = mysql_query("SELECT * FROM `cbt_jawaban` j left join cbt_soal s on s.XNomerSoal = j.XNomerSoal WHERE j.XKodeSoal = '$var_soal' and j.XUserJawab = '$var_siswa'
	and XTokenUjian = '$var_token'");
	
	$sqlmapel = mysql_query("select * from cbt_ujian c left join cbt_mapel m on m.XKodeMapel = c.XKodeMapel where c.XKodeSoal = '$var_soal'"); 
	$u = mysql_fetch_array($sqlmapel);
	$namamapel = $u['XNamaMapel'];
	$kodemapel = $u['XKodeMapel'];
	
	$sqlsiswa = mysql_query("SELECT * FROM `cbt_siswa` WHERE XNomerUjian= '$var_siswa'");
	$s = mysql_fetch_array($sqlsiswa);
	$namsis = $s['XNamaSiswa'];
	$namkel = $s['XKodeKelas'];
	$namjur = $s['XKodeJurusan'];
	$grup = "$s[XKodeKelas] - $s[XKodeJurusan]";
	$nomsis = $s['XNIK'];

$no = $no +1;

	$sqldijawab = mysql_num_rows(mysql_query(" SELECT * FROM `cbt_jawaban` WHERE XKodeSoal = '$var_soal' and XUserJawab = '$var_siswa' and XJawaban != '' and XTokenUjian = '$var_token'"));

$sqljumlah = mysql_query("select sum(XNilaiEsai) as hasil from cbt_jawaban where XKodeSoal = '$var_soal' and XUserJawab = '$var_siswa' and XTokenUjian = '$var_token'");
$o = mysql_fetch_array($sqljumlah);

$nilai_esai = $o['hasil'];

$sqljawaban = mysql_query("SELECT count( XNilai ) AS HasilUjian FROM `cbt_jawaban` WHERE XKodeSoal = '$var_soal' and XUserJawab = '$_REQUEST[siswa]' and XNilai = '1' and XTokenUjian = '$var_token'");
	$sqj = mysql_fetch_array($sqljawaban);
	$jumbenar = $sqj['HasilUjian'];
	$hasil_pil = $jumbenar;	
	$nilai_pil = round((($jumbenar/$var_pil)*$per_pil),2);	
	//$total_pil = round(($nilai_pil/$per_pil)*100,2);	
	$total_pil = $nilai_pil;	
	$tot_pil = number_format($total_pil,2,',','.');	

$sqljawaban = mysql_query("SELECT sum( XNilaiEsai ) AS HasilEsai FROM `cbt_jawaban` WHERE XKodeSoal = '$var_soal' and XUserJawab = '$_REQUEST[siswa]' and XJenisSoal = '2' and XTokenUjian = '$var_token'");
	$sqj = mysql_fetch_array($sqljawaban);
	if($var_esai<1){$total_esai = 0; $hasil_esai = 0; $nilai_esai = 0;} else {
	$hasil_esai = $sqj['HasilEsai'];
	$nilai_esai = round(($hasil_esai*($per_esai/100)),2);	
	//$total_esai = round(($nilai_esai/$per_esai)*100,2);	
	$total_esai = $nilai_esai;	
	$tot_esai = round($nilai_esai,2);	
	}
		
	
	$total_nilai = number_format(($total_pil+$total_esai),2,',','.');
/*	
	$sqlnilai = mysql_query(" SELECT * FROM cbt_nilai WHERE XKodeSoal = '$_REQUEST[soal]' and XNomerUjian = '$_REQUEST[siswa]' and XTokenUjian = '$var_token'");
	$sqn = mysql_fetch_array($sqlnilai);
	
	$hasil_pil = $sqn['XNilai'];	
	$nilai_pil = $sqn['XNilai']*($sqn['XPersenPil']/100);	
	$hasil_esai = $sqn['XEsai'];	
	$nilai_esai = $sqn['XEsai']*($sqn['XPersenEsai']/100);	
	$total_nilai =$nilai_esai+$nilai_pil;
*/
$hal = 1;
if(isset($_REQUEST['soal'])){
$var_soal = "$_REQUEST[soal]";}
if(isset($_REQUEST['siswa'])){
$var_siswa = "$_REQUEST[siswa]";
}

$sqlsoal = mysql_num_rows(mysql_query("select * from cbt_soal where XKodeSoal = '$var_soal'")); 
$sqltampil = mysql_query("select * from cbt_ujian where XKodeSoal = '$var_soal'"); 
$t1 = mysql_fetch_array($sqltampil);
$t = $t1['XJumSoal'];

$sqlbenar = mysql_query("select * from cbt_nilai where XKodeSoal = '$var_soal' and XNomerUjian = '$var_siswa'"); 
$b1 = mysql_fetch_array($sqlbenar);
$b = $b1['XBenar'];


if($t > $sqlsoal){$jumsoal = $sqlsoal;} else {$jumsoal = $t;}
$nilai = ($b/$jumsoal)*100;
$nilaine = number_format($nilai, 2, ',', '.');


$sqlujian = mysql_query("select * from cbt_ujian c left join cbt_mapel m on m.XKodeMapel = c.XKodeMapel where c.XKodeSoal = '$var_soal'"); 
$u = mysql_fetch_array($sqlujian);
$namamapel = $u['XNamaMapel'];
$xtokenujian = $u['XTokenUjian'];
$kodeujian = $u['XKodeUjian'];

if($kodeujian == "UH"){ $kodeujian = "Harian";} 
elseif($kodeujian == "UTS"){ $kodeujian = "UTS";} 
elseif($kodeujian == "UAS"){ $kodeujian = "UAS";} 
else {$kodeujian = "TRY OUT";}

$nom = 1;			
$betul = 0;					

$sqlsiswa = mysql_query("SELECT * FROM `cbt_siswa` s left join cbt_kelas k on k.XKodeKelas = s.XKodeKelas WHERE XNomerUjian= '$var_siswa'");
$s = mysql_fetch_array($sqlsiswa);
$namsis = $s['XNamaSiswa'];
$namkel = $s['XNamaKelas'];
$nomsis = $s['XNIK'];
$namjur = $s['XKodeJurusan'];
$fotsis = $s['XFoto'];
if(str_replace(" ","",$fotsis)==""){
$foto = "nouser.png";} else { $foto = "$fotsis";}

?>

<style>

.semua {
    float: left;
    width: 100%;
}
.left {
    float: left;
    width: 79%;
}
.right {
    float: right;
    width: 20%;
}
.group:after {
    content:"";
    display: table;
    clear: both;
}
img {
    max-width: 50%;
    height: auto;
}
/* sets base style for each page */
html {
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}

/* set background image per page */
.home-bg {
background: url(images/bsmart1.jpg) no-repeat center center fixed;
}
</style>

<body>

<div class="group">
    <div class="left">
             <div class="panel panel-default">
                                          <div class="panel-heading">
                                           <h3 class="panel-title">Hasil Ujian CBT : </h3>
                                          </div>
                                          <div class="panel-body">
                                            <table border="0" width="100%">                              
                                             <tr>
              <td rowspan="6">
              <img src="images/tut.jpg" width="80%" />
              <!-- <img src="../../fotosiswa/<?php echo $foto; ?>" width="80%" /></td></td> !-->
                <td width="30%">Nomer Ujian </td><td width="50%">: <?php echo "$var_siswa [$xtokenujian]"; ?></td>
                
              </tr>
                                                <tr><td>Nomer Induk (NIS)</td><td>: <?php echo $nomsis; ?></td></tr>
                                                <tr><td>Nama Lengkap </td><td>: <?php echo $namsis; ?></td></tr>
                                                <tr><td>Kelas | Jurusan </td><td>: <?php echo "$namkel | $namjur "; ?></td></tr>
                                                <tr><td>Mata Pelajaran</td><td>: <?php echo $namamapel; ?></td></tr>
                                                <tr><td>Tgl Pelaksanaan</td><td>: <?php echo $tglujian; ?></td></tr>                                                  
                                            </table>    
                                          </div>
            </div>
     </div>
      <div class="right"><div class="panel panel-default">
      									  <div class="panel-heading">
                                           <h3 class="panel-title" >Nilai Ujian : </h3>
                                          </div>
                                          <div class="panel-body">
                                            <table border="0" width="100%" bgcolor="#00CCCC">                              
                                            <tr><td valign="top" align="center">
							                <div style="font-size:42px" id="nilaiskor"> <?php echo $total_nilai; ?></div></td>
              								</tr>
                                            </table>    
                                          </div>
                         </div>
      					<div class="panel panel-default" style="margin-top:-10px;">
      									  <div class="panel-body">
                                           <h3 class="panel-title"><?php echo "Ujian : $kodeujian"; ?></h3>
                                          </div>
                         </div>

	  </div>
     
</div>
<!--
<div class="group">
    <div class="left">
             <div class="panel panel-default">
                                          <div class="panel-heading"><h3 class="panel-title">Hasil Ujian : </h3></div>
            

<div class="panel-body">
<table width="100%" border="1"><tr><td>Hasil Pilihan Ganda</td><td>Hasil Soal Esai</td><td>Nilai Pilihan Ganda</td><td>Nilai Soal Esai</td><td>Nilai Akhir</tdh></tr>	
<tr><td><?php echo $nilai_pil; ?></td><td><?php echo $nilai_esai ; ?></td><td><?php echo $tot_pil; ?></td><td><?php echo $total_esai; ?></td><td><?php echo $total_nilai; ?></td></tr>
</table>
</div> </div>
    </div>
</div>
!-->
<?php
//koneksi database
include "../../config/server.php";

$var_soal = "$_REQUEST[soal]";
$var_siswa = "$_REQUEST[siswa]";

$sqlsoal = mysql_num_rows(mysql_query("select * from cbt_soal where XKodeSoal = '$var_soal'")); 
$sqltampil = mysql_query("select * from cbt_ujian where XKodeSoal = '$var_soal'"); 
$t1 = mysql_fetch_array($sqltampil);
$t = $t1['XJumSoal'];

$sqlbenar = mysql_query("select * from cbt_nilai where XKodeSoal = '$var_soal' and XNomerUjian = '$var_siswa'"); 
$b1 = mysql_fetch_array($sqlbenar);
$b = $b1['XBenar'];


if($t > $sqlsoal){$jumsoal = $sqlsoal;} else {$jumsoal = $t;}


$nomer = 1;
$sql = mysql_query("
SELECT * FROM `cbt_jawaban` j left join cbt_soal s on s.XNomerSoal = j.XNomerSoal 
left join cbt_ujian u on (u.XKodeSoal = s.XKodeSoal and u.XTokenUjian = j.XTokenUjian)
WHERE j.XKodeSoal = '$var_soal' and  s.XKodeSoal = '$var_soal' and  j.XUserJawab = '$var_siswa'
and j.XJenisSoal = '1'
 order by j.Urut");
		while($r = mysql_fetch_array($sql)){
$jumpil = $r['XJumPilihan'];		
		$audiofile = $r['XAudioTanya']; 
		$vidfile = $r['XVideoTanya']; 
		
		echo "<table width=100% border=0><tr><td width=50px>$nomer.</td><td colspan=2>$r[XTanya] </td></tr>
		<tr><td width=50px colspan=3>&nbsp;</td></tr>
		";
		
		if(str_replace("  ","",$audiofile!=="")){
		echo "<tr><td width=50px colspan=3>File Listening : $audiofile</td></tr>";
		}
		if(str_replace("  ","",$vidfile!=="")){
		echo "<tr><td width=50px colspan=3>File Video : $vidfile</td></tr>";
		}
		?>
		<?php
		if(str_replace("  ","",$r['XGambarTanya']!=="")){
		
		echo "
		</p><p><tr><td width=50px colspan=3>&nbsp; </td></tr>
		<tr><td colspan=3><img src=../../pictures/$r[XGambarTanya] width=200px></td></tr>";}
		
		echo "</p><p><tr><td width=50px colspan=3>&nbsp;</td></tr>";
		
	$PilA = $r['XA'];
	$PilJwb = "XJawab$PilA";
	$GbrJwb = "XGambarJawab$PilJwb";	
	$FileGbr = "XGambarJawab$PilA";	
	if($r[$FileGbr]==""){$GbrJwb=""; $lebar = "width=0px";}else{$GbrJwb = "<img src='../../pictures/$r[$FileGbr]' width=80px>"; $lebar = "width=90px";}	
	echo "<tr><td width=50px align=center> A. </td>"; 
	$sqlpil = mysql_query("SELECT $PilJwb as pilsoal FROM `cbt_soal` WHERE XKodeSoal = '$var_soal' and XNomerSoal = '$r[XNomerSoal]'");
	$jwb = mysql_fetch_array($sqlpil);
	$jawab = $jwb['pilsoal'];
	echo "<td $lebar>$GbrJwb</td><td>$jawab</td></tr>";

	$PilB = $r['XB'];
	$PilJwb = "XJawab$PilB";
	$GbrJwb = "XGambarJawab$PilJwb";	
	$FileGbr = "XGambarJawab$PilB";	
	if($r[$FileGbr]==""){$GbrJwb=""; $lebar = "width=0px";}else{$GbrJwb = "<img src='../../pictures/$r[$FileGbr]' width=80px>"; $lebar = "width=90px";}	
	echo "<tr><td width=50px align=center> B. </td>"; 
	$sqlpil = mysql_query("SELECT $PilJwb as pilsoal FROM `cbt_soal` WHERE XKodeSoal = '$var_soal' and XNomerSoal = '$r[XNomerSoal]'");
	$jwb = mysql_fetch_array($sqlpil);
	$jawab = $jwb['pilsoal'];
	echo "<td  $lebar>$GbrJwb</td><td>$jawab</td></tr>";	

	$PilC = $r['XC'];
	$PilJwb = "XJawab$PilC";
	$GbrJwb = "XGambarJawab$PilJwb";
	$FileGbr = "XGambarJawab$PilC";	
	if($r[$FileGbr]==""){$GbrJwb=""; $lebar = "width=0px";}else{$GbrJwb = "<img src='../../pictures/$r[$FileGbr]' width=80px>"; $lebar = "width=90px";}	
	echo "<tr><td width=50px align=center> C. </td>"; 
		$sqlpil = mysql_query("SELECT $PilJwb as pilsoal FROM `cbt_soal` WHERE XKodeSoal = '$var_soal' and XNomerSoal = '$r[XNomerSoal]'");
		$jwb = mysql_fetch_array($sqlpil);
		$jawab = $jwb['pilsoal'];
	echo "<td $lebar>$GbrJwb</td><td>$jawab</td></tr>";	


	$PilD = $r['XD'];
	$PilJwb = "XJawab$PilD";
	$GbrJwb = "XGambarJawab$PilJwb";
	$FileGbr = "XGambarJawab$PilD";	
	if($r[$FileGbr]==""){$GbrJwb=""; $lebar = "width=0px";}else{$GbrJwb = "<img src='../../pictures/$r[$FileGbr]' width=80px>"; $lebar = "width=90px";}	
	echo "<tr><td width=50px align=center> D. </td>"; 
		$sqlpil = mysql_query("SELECT $PilJwb as pilsoal FROM `cbt_soal` WHERE XKodeSoal = '$var_soal' and XNomerSoal = '$r[XNomerSoal]'");
		$jwb = mysql_fetch_array($sqlpil);
		$jawab = $jwb['pilsoal'];
	echo "<td $lebar>$GbrJwb</td><td>$jawab</td></tr>";

	if($jumpil ==5){	
	$PilE = $r['XE'];
	$PilJwb = "XJawab$PilE";
	$GbrJwb = "XGambarJawab$PilJwb";
	$FileGbr = "XGambarJawab$PilE";	
	if($r[$FileGbr]==""){$GbrJwb=""; $lebar = "width=0px";}else{$GbrJwb = "<img src='../../pictures/$r[$FileGbr]' width=80px>"; $lebar = "width=90px";}	
	echo "<tr><td width=50px align=center> E. </td>"; 
		$sqlpil = mysql_query("SELECT $PilJwb as pilsoal FROM `cbt_soal` WHERE XKodeSoal = '$var_soal' and XNomerSoal = '$r[XNomerSoal]'");
		$jwb = mysql_fetch_array($sqlpil);
		$jawab = $jwb['pilsoal'];
	echo "<td>$GbrJwb</td><td>$jawab</td></tr>";
	}


	if($r['XKunciJawaban']==$r['XA']){$jwbsiswa = "A";}
	elseif($r['XKunciJawaban']==$r['XB']){$jwbsiswa = "B";}	
	elseif($r['XKunciJawaban']==$r['XC']){$jwbsiswa = "C";}
	elseif($r['XKunciJawaban']==$r['XD']){$jwbsiswa = "D";}	
	elseif($r['XKunciJawaban']==$r['XE']){$jwbsiswa = "E";}
	else{$jwbsiswa = "S";}
	
	if($jwbsiswa==$r['XJawaban']){$ikon = "images/benar.gif"; $betul++;}else{$ikon = "images/salah.gif";}
echo "<tr><td colspan=3><br>Kunci Jawaban : $jwbsiswa, Jawaban Siswa : $r[XJawaban]&nbsp; &nbsp;  <img src=$ikon width=30px></td></tr>";	
echo "<tr><td colspan=3><hr></td></tr>";
		
		$nomer++;
$namsis = $s['XNamaSiswa'];
$namkel = $s['XNamaKelas'];
$nomsis = $s['XNIK'];
$namjur = $s['XKodeJurusan'];		
			echo "<div id='print-footer'><div>Hasil Ujian $nomsis : $namsis ($namkel | $namjur)</div></div>"; ?>
            
            <?php 

		}
		

?>
</div>
<?php
$var_soal = "$_REQUEST[soal]";
$var_siswa = "$_REQUEST[siswa]";

//Soal Pilihan Ganda
$sqlsoal = mysql_num_rows(mysql_query("select * from cbt_soal where XKodeSoal = '$var_soal' and XJenisSoal = '2'")); 
$sqltampil = mysql_query("select * from cbt_ujian where XKodeSoal = '$var_soal'"); 
$t1 = mysql_fetch_array($sqltampil);
//$t = $t1['XJumSoal'];
$t = $t1['XPilGanda'];

$sqlbenar = mysql_query("select * from cbt_nilai where XKodeSoal = '$var_soal' and XNomerUjian = '$var_siswa'"); 
$b1 = mysql_fetch_array($sqlbenar);
$b = $b1['XBenar'];

/*
if($t > $sqlsoal){$jumsoal = $sqlsoal;} else {$jumsoal = $t;}
$nilai = ($b/$jumsoal)*100;
$nilaine = number_format($nilai, 2, ',', '.');
*/
if($t > $sqlsoal){$jumsoal = $sqlsoal;} else {$jumsoal = $t;}
if(!$jumsoal<1){$nilai = ($b/$jumsoal)*100;
$nilaine = number_format($nilai, 2, ',', '.');
}



$sqlujian = mysql_query("select * from cbt_ujian c left join cbt_mapel m on m.XKodeMapel = c.XKodeMapel where c.XKodeSoal = '$var_soal'"); 
$u = mysql_fetch_array($sqlujian);
$namamapel = $u['XNamaMapel'];
$xtokenujian = $u['XTokenUjian'];

$nom = 1;			
$betul = 0;					

$sqlsiswa = mysql_query("SELECT * FROM `cbt_siswa` s left join cbt_kelas k on k.XKodeKelas = s.XKodeKelas WHERE XNomerUjian= '$var_siswa'");
$s = mysql_fetch_array($sqlsiswa);
$namsis = $s['XNamaSiswa'];
$namkel = $s['XNamaKelas'];
$nomsis = $s['XNIK'];
$namjur = $s['XKodeJurusan'];
$fotsis = $s['XFoto'];
if(str_replace(" ","",$fotsis)==""){
$foto = "nouser.png";} else { $foto = "$fotsis";}

?>
<table>
<?php
$sql = mysql_query("
SELECT * FROM `cbt_jawaban` j left join cbt_soal s on s.XNomerSoal = j.XNomerSoal 
left join cbt_ujian u on (u.XKodeSoal = s.XKodeSoal and u.XTokenUjian = j.XTokenUjian)
WHERE j.XKodeSoal = '$var_soal' and  s.XKodeSoal = '$var_soal' and  j.XUserJawab = '$var_siswa' 
and j.XJenisSoal = '2' and j.XTokenUjian = '$xtokenujian' order by j.Urut");

while($r = mysql_fetch_array($sql)){
$jumpil = $r['XJumPilihan'];
$nosoal = $r['XNomerSoal'];
$nil = $r['XNilaiEsai'];

echo "<tr><td width=50px>$nomer.</td><td>$r[XTanya] </td></tr>
<tr><td width=50px colspan=2>&nbsp;</td></tr>
";

?>

<?php
if(str_replace("  ","",$r['XGambarTanya']!=="")){
echo "
<tr><td width=30px colspan=2>&nbsp; </td></tr>
<tr><td colspan=2><img src=../../pictures/$r[XGambarTanya] width=150px></td></tr>";}
echo "<tr><td width=50px colspan=2>&nbsp;</td></tr>";

$jawab = $r['XJawabanEsai'];
echo "
<tr><td width=30px colspan=2><b>Jawaban : </b></td></tr>
<tr><td colspan=2>$jawab</td></tr>

<tr><td width=50px colspan=2>&nbsp;</td></tr>
<tr><td colspan=1><b>Nilai : </b></td><td>";	
?>
<span style="height:50px; width:60px; font-size:36px; padding-left:5px;color:#32689a"><?php echo "$nil"; ?></span>
<?php
echo "</td></tr><tr><td colspan=2><hr></td></tr>";



$nomer++;


}
?>    </div>
    </div>
</table>   
</body>
</html>
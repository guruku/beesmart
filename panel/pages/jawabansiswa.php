<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>

.left {
    float: left;
    width: 75%;
}
.right {
    float: right;
    width: 23%;
}
.group:after {
    content:"";
    display: table;
    clear: both;
}
img {
    max-width: 100%;
    height: auto;
}
@media screen and (max-width: 480px) {
    .left, 
    .right {
        float: none;
        width: auto;
		margin-top:10px;		
    }
	
}
</style>
<script type="text/javascript" src="jquery.gdocsviewer.min.js"></script> 

<script type="text/javascript"> 
/*<![CDATA[*/
$(document).ready(function() {
	$('a.embed').gdocsViewer({width: 600, height: 750});
	$('#embedURL').gdocsViewer();
});
/*]]>*/
</script> 
    <link href="css/nedna.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script type="text/javascript"
  src="../../MathJax/MathJax.js?config=AM_HTMLorMML-full"></script>

<!-- script untuk refresh/reload mathjax setiap content baru !-->
   <script>
  MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
</script>
<!-- script untuk refresh/reload mathjax setiap content baru !-->
<iframe src="<?php echo "print_jawaban.php?soal=$_REQUEST[soal]&siswa=$_REQUEST[siswa]"; ?>" style="display:none;" name="frame"></iframe>
<a href=?modul=analisajawaban&soal=<?php echo $_REQUEST['soal']; ?>>
                                        <button type="button" class="btn btn-success btn-small" style="margin-top:5px; margin-bottom:5px"><i class="glyphicon glyphicon-th-list"></i> Kembali ke Daftar</i></button></a>
<button type="button" class="btn btn-default btn-small" onClick="frames['frame'].print()" style="margin-top:5px; margin-bottom:5px"><i class="glyphicon glyphicon-print"></i> Cetak Hasil Ujian
</button>

<body style="width:90%; margin:0 auto;margin-top:50px; ">

<br />
<?php
include "../../config/server.php";
?>
<?php
$hasil = mysql_query("SELECT *,u.XStatusUjian as ujsta FROM cbt_siswa s
LEFT JOIN `cbt_siswa_ujian` u ON u.XNomerUjian = s.XNomerUjian
LEFT JOIN cbt_ujian c ON (u.XKodeSoal = c.XKodeSoal and u.XTokenUjian = c.XTokenUjian)
LEFT JOIN cbt_paketsoal p ON (u.XKodeSoal = c.XKodeSoal and u.XTokenUjian = c.XTokenUjian)
WHERE c.XKodeSoal = '$_REQUEST[soal]' and p.XKodeSoal = '$_REQUEST[soal]' and u.XNomerUjian = '$_REQUEST[siswa]'
and c.XTokenUjian = '$_REQUEST[token]'");

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

//echo "$var_siswa ... $var_token";	
	$sqlujian = mysql_query("SELECT * FROM `cbt_jawaban` j left join cbt_soal s on s.XNomerSoal = j.XNomerSoal WHERE j.XKodeSoal = '$var_soal' and j.XUserJawab = '$var_siswa'
	and XTokenUjian = '$_REQUEST[token]'");
	
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

$nilai_esai = round($o['hasil'],2);
	
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

//echo "$jumbenar - $var_pil";
/*echo "SELECT * FROM cbt_nilai WHERE XKodeSoal = '$_REQUEST[soal]' and XNomerUjian = '$_REQUEST[siswa]'";

	$sqlnilai = mysql_query("SELECT * FROM cbt_nilai WHERE XKodeSoal = '$_REQUEST[soal]' and XNomerUjian = '$_REQUEST[siswa]'");
	$sqn = mysql_fetch_array($sqlnilai);
	
	$hasil_pil = $sqn['XNilai'];	
	$nilai_pil = $sqn['XNilai']*($sqn['XPersenPil']/100);	
	$hasil_esai = $sqn['XEsai'];	
	$nilai_esai = $sqn['XEsai']*($sqn['XPersenEsai']/100);	
	$total_nilai =$nilai_esai+$nilai_pil;
*/
	
?>

<?php
$var_soal = "$_REQUEST[soal]";
$var_siswa = "$_REQUEST[siswa]";

//Soal Pilihan Ganda
$sqlsoal = mysql_num_rows(mysql_query("select * from cbt_soal where XKodeSoal = '$var_soal' and XJenisSoal = '1'")); 
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
$nilai = ($b/$jumsoal)*100;
$nilaine = number_format($nilai, 2, ',', '.');

$xtokenujian = $var_token;
$sqlujian = mysql_query("select * from cbt_ujian c left join cbt_mapel m on m.XKodeMapel = c.XKodeMapel where c.XKodeSoal = '$var_soal' and c.XTokenUjian = '$var_token'"); 
$u = mysql_fetch_array($sqlujian);
$namamapel = $u['XNamaMapel'];
$kodeujian = $u['XKodeUjian'];

if($kodeujian == "UH"){ $kodeujian = "Harian";} 
elseif($kodeujian == "UTS"){ $kodeujian = "UTS";} 
elseif($kodeujian == "UAS"){ $kodeujian = "UAS";} 
else {$kodeujian = "TRY OUT";}
//$xtokenujian = $u['XTokenUjian'];

$nom = 1;			
$betul = 0;					

$sqlsiswa = mysql_query("SELECT * FROM `cbt_siswa` s left join cbt_kelas k on k.XKodeKelas = s.XKodeKelas WHERE XNomerUjian= '$var_siswa'");
$s = mysql_fetch_array($sqlsiswa);
$namsis = $s['XNamaSiswa'];
$namkel = $s['XNamaKelas'];
$nomsis = $s['XNIK'];
$namjur = $s['XKodeJurusan'];
$fotsis = $s['XFoto'];
$var_sesi = $s['XSesi'];
	
if(str_replace(" ","",$fotsis)==""){
$foto = "nouser.png";} else { $foto = "$fotsis";}

?>
<div class="group">
    <div class="left">
             <div class="panel panel-default">
                                          <div class="panel-heading">
                                           <h3 class="panel-title">Data Peserta Ujian : </h3>
                                          </div>
                                          <div class="panel-body">
                                            <table border="0" width="100%">                              
                                             <tr>
              <td rowspan="6" width="150px"><img src="../../fotosiswa/<?php echo $foto; ?>" width="60%" /></td></td>
                <td width="20%">Nomer Ujian </td><td width="50%">: <?php echo "$var_siswa ($xtokenujian | Sesi $var_sesi)"; ?></td>
                
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
      <div class="right">

      					<div class="panel panel-default">
      									  <div class="panel-heading">
                                           <h3 class="panel-title">Nilai Ujian : </h3>
                                          </div>
                                          <div class="panel-body">
                                            <table border="0" width="100%">                              
                                            <tr><td valign="top" align="center">
							                <div style="font-size:82px" id="nilaiskor"> <?php echo $total_nilai; ?></div></td>
              								</tr>
                                            </table>    
                                          </div>
                         </div>
      					<div class="panel panel-default">
      									  <div class="panel-body">
                                           <h3 class="panel-title"><?php echo "Ujian : $kodeujian"; ?></h3>
                                          </div>
                         </div>


	  </div>
     
</div>

<div class="panel panel-default">
<div class="panel-heading">Perolehan Nilai Siswa
</div>
<div class="panel-body">
<table width="100%" border="0"><tr><th>Hasil Pilihan Ganda</th><th>Hasil Soal Esai</th><th>Nilai Pilihan Ganda</th><th>Nilai Soal Esai</th><th>Nilai Akhir</th></tr>	
<tr><td><?php echo $hasil_pil; ?></td><td><?php echo $hasil_esai; ?></td><td><?php echo $nilai_pil; ?></td><td><?php echo $nilai_esai; ?></td><td><?php echo $total_nilai; ?></td></tr>
</table></div>
</div>

<link href="../dist/skin/blue.monday/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../lib/jquery.min.js"></script>
<script type="text/javascript" src="../dist/jplayer/jquery.jplayer.min.js"></script>

 <div class="panel panel-default">
                              <div class="panel-heading">
                                <table><tr><td><h3 class="panel-title">Hasil CBT Online Siswa : Soal Pilihan Ganda &nbsp;</h3></td>
                                <td>
                               
                                </td></tr>
                                </table>
                              </div>

                              <div class="panel-body">
<table>
<?php
$nomer = 1;
$sql = mysql_query("
SELECT * FROM `cbt_jawaban` j left join cbt_soal s on s.XNomerSoal = j.XNomerSoal 
left join cbt_ujian u on (u.XKodeSoal = s.XKodeSoal and u.XTokenUjian = j.XTokenUjian)
WHERE j.XKodeSoal = '$var_soal' and  s.XKodeSoal = '$var_soal' and  j.XUserJawab = '$var_siswa' 
and j.XJenisSoal = '1' and j.XTokenUjian = '$xtokenujian' order by j.Urut");


while($r = mysql_fetch_array($sql)){
$jumpil = $r['XJumPilihan'];

echo "<tr><td width=50px>$nomer.</td><td colspan=2>$r[XTanya] </td></tr>
<tr><td width=50px colspan=3>&nbsp;</td></tr>
";

?>


<?php
if(str_replace("  ","",$r['XGambarTanya']!=="")){
echo "
<tr><td width=50px colspan=3>&nbsp; </td></tr>
<tr><td colspan=3><img src=../../pictures/$r[XGambarTanya] width=50%></td></tr>";}

echo "<tr><td width=50px colspan=3>&nbsp;</td></tr>";

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


}
?>    </div>
    </div>
</table>                              
	</div>                           
    </div>



<?php
$var_soal = "$_REQUEST[soal]";
$var_siswa = "$_REQUEST[siswa]";

?>
<input type="hidden" id="soale" name="soale" value="<?php echo "$_REQUEST[soal]"; ?>" />
<input type="hidden" id="siswae" name="siswae" value="<?php echo "$_REQUEST[siswa]"; ?>" />
<input type="hidden" id="tokene" name="tokene" value="<?php echo "$xtokenujian"; ?>" />

 <div class="panel panel-default">
                              <div class="panel-heading">
                                <table><tr><td><h3 class="panel-title">Hasil CBT Online Siswa :  Soal Esai &nbsp;</h3></td>
                                <td>
                               
                                </td></tr>
                                </table>
                              </div>

                              <div class="panel-body">
<table>
<?php
$nomer = 1;
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
<tr><td colspan=2><b>Entry Nilai</b></td></tr>
<tr><td colspan=2>";	
?>
<span style="height:50px; width:60px; font-size:36px; padding-left:5px;color:#32689a"><?php echo "$nil"; ?></span>
<?php
echo "</td></tr><tr><td colspan=2><hr></td></tr>";



$nomer++;


}
?>    </div>
    </div>
</table>                              
	</div>                           
    </div>



</body>
</html>


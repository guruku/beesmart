<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<html>
<head>
<title>CBT BeeSMART | Cetak Kartu</title>
<script type="text/javascript" src="jquery.gdocsviewer.min.js"></script> 

<script type="text/javascript"> 
/*<![CDATA[*/
$(document).ready(function() {
	$('a.embed').gdocsViewer({width: 600, height: 750});
	$('#embedURL').gdocsViewer();
});
/*]]>*/
</script> 
</head>
<body>
<iframe src="<?php echo "cetaknilai.php?kelas=$_REQUEST[iki3]&jur=$_REQUEST[jur3]&mapz=$_REQUEST[map3]"; ?>" style="display:none;" name="frame"></iframe>
<button type="button" class="btn btn-default btn-sm" onClick="frames['frame'].print()" style="margin-top:10px; margin-bottom:5px"><i class="glyphicon glyphicon-print"></i> Cetak 
</button> 
<?php echo "Cetak Hasil Try Out Kelas : '$_REQUEST[iki3]', Jurusan : '$_REQUEST[jur3]'"; ?>

<?php

//koneksi database
include "../../config/server.php";


$sqlad = mysql_query("select * from cbt_admin");
$ad = mysql_fetch_array($sqlad);
$namsek = strtoupper($ad['XSekolah']);
$kepsek = $ad['XKepSek'];
$logsek = $ad['XLogo'];
$BatasAwal = 50;
 if(isset($_REQUEST['iki3'])){ 
$cekQuery = mysql_query("SELECT * FROM cbt_siswa where XKodeKelas = '$_REQUEST[iki3]' and  XKodeJurusan = '$_REQUEST[jur3]' ");
}else{
$cekQuery = mysql_query("SELECT * FROM cbt_siswa ");
}
$jumlahData = mysql_num_rows($cekQuery);
$jumlahn = 20;
$n = ceil($jumlahData/$jumlahn);
$nomz = 1;
for($i=1;$i<=$n;$i++){ ?>
	<div style="background:#999; width:100%; height:1275px;" ><br>
	<div style="background:#fff; width:90%; margin:0 auto; padding:30px; height:90%;">
    <table border="0" width="100%">
    <tr>
    							<?php 
								$sqk = mysql_query("select * from cbt_tes where XKodeUjian = '$_REQUEST[tes3]'");
								$rs = mysql_fetch_array($sqk);
                             	$rs1 = strtoupper("$rs[XNamaUjian]");
								
								if($_REQUEST['tes3']=='A'){$namaujian = "HASIL SEMUA UJIAN ";} else {$namaujian = "HASIL UJIAN TRYOUT";}
								?>                                

    <td rowspan="4" width="150"><img src="../../images/<?php echo "$logsek"; ?>" width="100"></td>
    <td colspan="2"><font size="+2"><b><?php echo "$namaujian"; ?></b></font></td>
    </tr>
    <tr>
   								 <?php 
								$sqk = mysql_query("select * from cbt_mapel where XKodeMapel = '$_REQUEST[map3]'");
								$rs = mysql_fetch_array($sqk);
                             	$rs1 = strtoupper("$rs[XNamaMapel]");
								?>   
    <td width="20%">Mata Pelajaran</td><td>: <b><?php echo $rs1; ?></b></td>
    </tr>
    <tr>
    <td>Kelas | Jurusan</td><td>: <b><?php echo $_REQUEST['iki3']; ?> | <?php echo $_REQUEST['jur3']; ?></b></td>
    </tr>

  <tr>
    <td>Tahun Akademik </td><td>: <?php echo $_COOKIE['beetahun']; ?></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  </table><br>
  
  <table border="1" width="100%" style="text-align:center">
  <tr bgcolor="#CCCCCC" height="30"><th width="5%" style="text-align:center" rowspan="2">No.</th><th width="10%" style="text-align:center" rowspan="2">NIS</th><th width="25%" 
  rowspan="2" style="text-align:center">Nama Siswa</th>
  <th align="center"   width="25%" style="text-align:center" colspan="5">TRYOUT</th>
  <th align="center"   width="5%" style="text-align:center" rowspan="2">Rata2</th>
  <th align="center"   width="5%" style="text-align:center" rowspan="2">KKM</th>
</tr>
  <tr>
  <td height="30" width="5%">TO1</td><td height="30" width="5%">TO2</td><td width="5%">TO3</td><td width="5%">TO4</td><td width="5%">TO5</td>
</tr>
<?php

$mulai = $i-1;
$batas = ($mulai*$jumlahn);
$startawal = $batas;
$batasakhir = $batas+$jumlahn;

$s = $i-1;

$per = mysql_query("SELECT * from cbt_mapel where XKodeMapel = '$_REQUEST[map3]'");
$p = mysql_fetch_array($per);

$perUH = $p['XPersenUH'];
$perUTS = $p['XPersenUTS'];
$perUAS = $p['XPersenUAS'];
$NilaiKKM = $p['XKKM'];
?>
<?php
if(isset($_REQUEST['iki3'])){ 
$cekQuery1 = mysql_query("SELECT * FROM cbt_siswa where XKodeKelas = '$_REQUEST[iki3]' and  XKodeJurusan = '$_REQUEST[jur3]' limit $batas,$jumlahn");
}else{
$cekQuery1 = mysql_query("SELECT * FROM cbt_siswa limit $batas,$jumlahn");
}
$jumlahTO = 0;
while($f= mysql_fetch_array($cekQuery1)){

$sto1 = mysql_query("
SELECT sum(XNilai) as totTO1, count(XNilai) as jujum2 FROM cbt_nilai where  (XKodeKelas = '$_REQUEST[iki3]' or XKodeKelas='ALL') and XNIK = '$f[XNIK]' and XKodeUjian = 'TO1' 
and	XKodeMapel = '$_REQUEST[map3]' and XSetId='$_COOKIE[beetahun]'");
$to1 = mysql_fetch_array($sto1);
$tot1 = $to1['totTO1'];
if($tot1==""){ 
$jumlahTO = $jumlahTO+0;
$TOP1 = "";
} else {
$jumlahTO = $jumlahTO+1;
$TOP1 = number_format($tot1, 2, ',', '.');
}
echo "$tot1|";

$sto2 = mysql_query("
SELECT sum(XNilai) as totTO2, count(XNilai) as jujum2 FROM cbt_nilai where  (XKodeKelas = '$_REQUEST[iki3]' or XKodeKelas='ALL') and XNIK = '$f[XNIK]' and XKodeUjian = 'TO2' 
and	XKodeMapel = '$_REQUEST[map3]' and XSetId='$_COOKIE[beetahun]'");
$to2 = mysql_fetch_array($sto2);
$tot2 = $to2['totTO2'];
if($tot2==""){ 
$jumlahTO = $jumlahTO+0;
$TOP2 = "";
} else {
$jumlahTO = $jumlahTO+1;
$TOP2 = number_format($tot2, 2, ',', '.');
}

$sto3 = mysql_query("
SELECT sum(XNilai) as totTO3, count(XNilai) as jujum2 FROM cbt_nilai where  (XKodeKelas = '$_REQUEST[iki3]' or XKodeKelas='ALL') and XNIK = '$f[XNIK]' and XKodeUjian = 'TO3' 
and	XKodeMapel = '$_REQUEST[map3]' and XSetId='$_COOKIE[beetahun]'");
$to3 = mysql_fetch_array($sto3);
$tot3 = $to3['totTO3'];
if($tot3==""){ 
$jumlahTO = $jumlahTO+0;
$TOP3 = "";
} else {
$jumlahTO = $jumlahTO+1;
$TOP3 = number_format($tot3, 2, ',', '.');
}

$sto4 = mysql_query("
SELECT sum(XNilai) as totTO4, count(XNilai) as jujum2 FROM cbt_nilai where  (XKodeKelas = '$_REQUEST[iki3]' or XKodeKelas='ALL') and XNIK = '$f[XNIK]' and XKodeUjian = 'TO4' 
and	XKodeMapel = '$_REQUEST[map3]' and XSetId='$_COOKIE[beetahun]'");
$to4 = mysql_fetch_array($sto4);
$tot4 = $to4['totTO4'];
if($tot4==""){ 
$jumlahTO = $jumlahTO+0;
$TOP4 = "";
} else {
$jumlahTO = $jumlahTO+1;
$TOP4 = number_format($tot4, 2, ',', '.');
}

$sto5 = mysql_query("
SELECT sum(XNilai) as totTO5, count(XNilai) as jujum2 FROM cbt_nilai where  (XKodeKelas = '$_REQUEST[iki3]' or XKodeKelas='ALL') and XNIK = '$f[XNIK]' and XKodeUjian = 'TO5' 
and	XKodeMapel = '$_REQUEST[map3]' and XSetId='$_COOKIE[beetahun]'");
$to5 = mysql_fetch_array($sto5);
$tot5 = $to5['totTO5'];
if($tot5==""){ 
$jumlahTO = $jumlahTO+0;
$TOP5 = "";
} else {
$jumlahTO = $jumlahTO+1;
$TOP5 = number_format($tot5, 2, ',', '.');
}

$TAkhire = $tot1+$tot2+$tot3+$tot4+$tot5;
if($TAkhire == 0){$TOTAkhire = "";} else {$TOTAkhire = number_format(($TAkhire/$jumlahTO), 2, ',', '.');}

	  echo "<tr height=30px><td>&nbsp;$nomz </td><td>&nbsp;$f[XNIK]</td><td align=left>&nbsp;$f[XNamaSiswa]</td>
	  <td>&nbsp;$TOP1</td><td>&nbsp;$TOP2</td><td>&nbsp;$TOP3</td><td>&nbsp;$TOP4</td><td>&nbsp;$TOP5</td>
	  <td>$TOTAkhire</td>
  	  <td></td>	  
	  </tr>";

  $nomz++;
?>
<?php } ?>        
        </table>
    </div>
    </div>
<?php } ?>            
</body>
</html>
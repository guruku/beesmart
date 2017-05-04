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
<iframe src="<?php echo "cetakabsen.php?kelas=$_REQUEST[iki1]&jur=$_REQUEST[jur1]&sesi=$_REQUEST[sesi1]&ruang=$_REQUEST[ruang1]"; ?>" style="display:none;" name="frame"></iframe>
<button type="button" class="btn btn-default btn-sm" onClick="frames['frame'].print()" style="margin-top:10px; margin-bottom:5px"><i class="glyphicon glyphicon-print"></i> Cetak 
</button>

<?php
//koneksi database
include "../../config/server.php";
$BatasAwal = 50;
 if(isset($_REQUEST['iki1'])){ 
$cekQuery = mysql_query("SELECT * FROM cbt_siswa where XKodeKelas = '$_REQUEST[iki1]' and  XKodeJurusan = '$_REQUEST[jur1]'  and  XSesi = '$_REQUEST[sesi1]' and  XRuang = '$_REQUEST[ruang1]'  ");
}else{
$cekQuery = mysql_query("SELECT * FROM cbt_siswa ");
}
$sqlad = mysql_query("select * from cbt_admin");
$ad = mysql_fetch_array($sqlad);
$namsek = strtoupper($ad['XSekolah']);
$kepsek = $ad['XKepSek'];
$logsek = $ad['XLogo'];

$jumlahData = mysql_num_rows($cekQuery);
$jumlahn = 22;
$n = ceil($jumlahData/$jumlahn);
$nomz = 1;
for($i=1;$i<=$n;$i++){ ?>
	<div style="background:#999; height:1275px;" ><br>
	<div style="background:#fff; width:70%; margin:0 auto; padding:30px; height:90%;">
    <table border="0" width="100%">
        	 <tr>
    <td rowspan="4" width="150"><img src="../../images/<?php echo "$logsek"; ?>" width="120"></td>
    <td><b>DAFTAR HADIR PESERTA UBK SESI : 
	<?php echo "$_REQUEST[sesi1]"; ?> - RUANG : <?php echo "$_REQUEST[ruang1]"; ?><br><?php echo $namsek; ?></b></td>
  </tr>
  <tr>
    <td>Tahun Akademik : <?php echo $_COOKIE['beetahun']; ?></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  </table><br>
  
  <table border="1" width="100%">
  <tr bgcolor="#CCCCCC" height="40"><th align="center" width="5%">No.</th><th align="center"  width="13%">No. Ujian</th><th align="center"   width="10%">NIS</th><th align="center" width="37%">Nama Siswa</th><th colspan="2" align="center"   width="40%">Tanda Tangan</th></tr>
<?php
$mulai = $i-1;
$batas = ($mulai*$jumlahn);
$startawal = $batas;
$batasakhir = $batas+$jumlahn;

$s = $i-1;

?>
<?php
 if(isset($_REQUEST['iki1'])){ 
$cekQuery1 = mysql_query("SELECT * FROM cbt_siswa where XKodeKelas = '$_REQUEST[iki1]' and  XKodeJurusan = '$_REQUEST[jur1]'  and  XSesi = '$_REQUEST[sesi1]' and  XRuang = '$_REQUEST[ruang1]' limit $batas,$jumlahn");
}else{
$cekQuery1 = mysql_query("SELECT * FROM cbt_siswa limit $batas,$jumlahn");
}
while($f= mysql_fetch_array($cekQuery1)){
 if ($nomz % 2 == 0) {
	  echo "<tr height=30px><td>&nbsp;$nomz</td><td>&nbsp;$f[XNomerUjian]</td><td>&nbsp;$f[XNIK]</td><td>&nbsp;$f[XNamaSiswa]</td><td align='center'>&nbsp;$nomz.</td></tr>";
	  } else {
	  echo "<tr height=30px><td>&nbsp;$nomz</td><td>&nbsp;$f[XNomerUjian]</td><td>&nbsp;$f[XNIK]</td><td>&nbsp;$f[XNamaSiswa]</td><td align='left'>&nbsp;$nomz.</td></tr>";
	  }
  $nomz++;
?>
<?php } ?>        
        </table>
    </div>
    </div>
<?php } ?>            
</body>
</html>
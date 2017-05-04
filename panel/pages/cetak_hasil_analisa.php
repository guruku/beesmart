<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<html>
<head>
<title>CBT BeeSMART | Cetak Kartu</title>
</head>
<body>
            <div class="row" style="width:106%">
						<div class="panel-heading" style="background-color:#ebeaea; margin-left:-15px; margin-right:-100px; width:100%; border-bottom:thin solid #d5d5d5">
                          <i class="fa fa-desktop"></i> &nbsp; |  &nbsp; Analisa Hasil Ujian  <button type="button" style="text-align:right;" class="btn btn-default btn-sm" onClick="frames['frame'].print()""><i class="glyphicon glyphicon-print"></i> Download 
</button>
                        </div>
                <!-- /.col-lg-12 -->
            </div>
<iframe src="<?php echo "cetakabsen.php?kelas=$_REQUEST[iki3]&jur=$_REQUEST[jur3]"; ?>" style="display:none;" name="frame"></iframe>
<button type="button" class="btn btn-default btn-sm" onClick="frames['frame'].print()" style="margin-top:10px; margin-bottom:5px"><i class="glyphicon glyphicon-print"></i> Cetak 
</button>

<?php

//koneksi database
include "../../config/server.php";
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
    <table border="0" width="100%">
    <tr>
    							<?php 
								$sqk = mysql_query("select * from cbt_tes where XKodeUjian = '$_REQUEST[tes3]'");
								$rs = mysql_fetch_array($sqk);
                             	$rs1 = strtoupper("$rs[XNamaUjian]");
								
								if($_REQUEST['tes3']=='A'){$namaujian = "HASIL SEMUA UJIAN ";} else {$namaujian = "HASIL UJIAN $rs1";}
								?>                                

    <td rowspan="4" width="150"><img src="images/tut.jpg" width="100"></td>
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
  <th align="center"   width="25%" style="text-align:center" colspan="3">Semester 1</th><th width="25%" style="text-align:center" colspan="3">Semester 2</th><th align="center"   width="10%" style="text-align:center" rowspan="2">Nilai Akhir</th></tr>
  <tr>
  <td height="30" width="5%">UH</td><td width="5%">UTS</td><td width="5%">UAS</td>
  <td width="5%">UH</td><td width="5%">UTS</td><td width="5%">UAS</td>  
</tr>
<?php

$mulai = $i-1;
$batas = ($mulai*$jumlahn);
$startawal = $batas;
$batasakhir = $batas+$jumlahn;

$s = $i-1;

?>
<?php
if(isset($_REQUEST['iki3'])){ 
$cekQuery1 = mysql_query("SELECT * FROM cbt_siswa where XKodeKelas = '$_REQUEST[iki3]' and  XKodeJurusan = '$_REQUEST[jur3]' limit $batas,$jumlahn");
}else{
$cekQuery1 = mysql_query("SELECT * FROM cbt_siswa limit $batas,$jumlahn");
}
while($f= mysql_fetch_array($cekQuery1)){
	$uh = mysql_query("SELECT sum(XNilai) as totUH FROM cbt_nilai where XKodeKelas = '$_REQUEST[iki3]' and XNIK = '$f[XNIK]' and XKodeUjian = 'UH' and XKodeMapel = '$_REQUEST[map3]' and XSemester = '1' and XSetId='$_COOKIE[beetahun]'");
	$tuh = mysql_fetch_array($uh);
	if(isset($tuh['totUH'])){$totUH1 = number_format($tuh['totUH'], 2, ',', '.');} else {$totUH1="";}

	$uts = mysql_query("SELECT sum(XNilai) as totUTS FROM cbt_nilai where XKodeKelas = '$_REQUEST[iki3]' and XNIK = '$f[XNIK]' and XKodeUjian = 'UTS' and XKodeMapel = '$_REQUEST[map3]' and XSemester = '1' and XSetId='$_COOKIE[beetahun]'");
	$tuts = mysql_fetch_array($uts);
	if(isset($tuts['totUTS'])){$totUTS1 = number_format($tuts['totUTS'], 2, ',', '.');} else {$totUTS1="";}	


	$uas = mysql_query("SELECT sum(XNilai) as totUAS FROM cbt_nilai where XKodeKelas = '$_REQUEST[iki3]' and XNIK = '$f[XNIK]' and XKodeUjian = 'UAS' and XKodeMapel = '$_REQUEST[map3]' and XSemester = '1' and XSetId='$_COOKIE[beetahun]'");
	$tuas = mysql_fetch_array($uas);
	if(isset($tuas['totUAS'])){$totUAS1 = number_format($tuas['totUAS'], 2, ',', '.');} else {$totUAS1="";}	

	$uh2 = mysql_query("SELECT sum(XNilai) as totUH2 FROM cbt_nilai where XKodeKelas = '$_REQUEST[iki3]' and XNIK = '$f[XNIK]' and XKodeUjian = 'UH' and XKodeMapel = '$_REQUEST[map3]' and XSemester = '2' and XSetId='$_COOKIE[beetahun]'");
	$tuh2 = mysql_fetch_array($uh2);
	$totUH2 = $tuh2['totUH2'];

	$uts2 = mysql_query("SELECT sum(XNilai) as totUTS2 FROM cbt_nilai where XKodeKelas = '$_REQUEST[iki3]' and XNIK = '$f[XNIK]' and XKodeUjian = 'UTS' and XKodeMapel = '$_REQUEST[map3]' and XSemester = '2' and XSetId='$_COOKIE[beetahun]'");
	$tuts2 = mysql_fetch_array($uts2);
	$totUTS2 = $tuts2['totUTS2'];

	$uas2 = mysql_query("SELECT sum(XNilai) as totUAS2 FROM cbt_nilai where XKodeKelas = '$_REQUEST[iki3]' and XNIK = '$f[XNIK]' and XKodeUjian = 'UAS' and XKodeMapel = '$_REQUEST[map3]' and XSemester = '2' and XSetId='$_COOKIE[beetahun]'");
	$tuas2 = mysql_fetch_array($uas2);
	$totUAS2 = $tuas2['totUAS2'];	
	
	  echo "<tr height=30px><td>&nbsp;$nomz</td><td>&nbsp;$f[XNIK]</td><td align=left>&nbsp;$f[XNamaSiswa]</td>
	  <td>&nbsp;$totUH1</td><td>&nbsp;$totUTS1</td><td>&nbsp;$totUAS1</td>
	  <td>&nbsp;$totUH2</td><td>&nbsp;$totUTS2</td><td>&nbsp;$totUAS2</td>
	  
	  <td>&nbsp;</td></tr>";
  $nomz++;
?>
<?php } ?>        
        </table>
    </div>
    </div>
<?php } ?>            
</body>
</html>
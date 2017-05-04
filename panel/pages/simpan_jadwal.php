<?php 
include "../../config/server.php";	
				  	
// $sqlubah2 = mysql_query("update cbt_ujian set XStatusUjian = '0'");
 
							  $tgl = substr($_REQUEST['txt_waktu'],0,10);
							  $jam = substr($_REQUEST['txt_waktu'],11,5);
							  $jam = "$jam:00";

//=========================
// Tentukan Durasi Ujian
//=========================

$minutes = $_REQUEST['txt_durasi'];
$d = floor ($minutes / 1440);
$h = floor (($minutes - $d * 1440) / 60);
$m = $minutes - ($d * 1440) - ($h * 60);

$hi = strlen($h);
$mi = strlen($m);
if($hi<2){$hi = "0".$h;}else{$hi=$h;}
if($mi<2){$mi = "0".$m;}else{$mi=$m;}
$jame = "$hi:$mi:00";
//


//=========================
// Tentukan Batas Keterlambatan Masuk Ujian
//=========================
$xlambat = $_REQUEST['txt_telat'];
if($xlambat==""){$xlambat = 0;}
elseif($xlambat>0){$xlambat = 1;}

if($xlambat==0){
$minutest = $_REQUEST['txt_durasi'];
}else{
$minutest = $_REQUEST['txt_telat'];
}

$dt = floor ($minutest / 1440);
$ht = floor (($minutest - $dt * 1440) / 60);
$mt = $minutest - ($dt * 1440) - ($ht * 60);

$hit = strlen($ht);
$mit = strlen($mt);
if($hit<2){$hit = "0".$ht;}else{$hit=$ht;}
if($mit<2){$mit = "0".$mt;}else{$mit=$mt;}
$jamet = "$hit:$mit:00";

//$telatujian = date('H:i:s',strtotime('+$hit hour +$mit minutes +00 seconds',strtotime($jamujiane)));
  $xjumlahjam = $jamet;
  $xjam = substr($xjumlahjam,0,2);
  $xmnt = substr($xjumlahjam,3,2);
  $xdtk = substr($xjumlahjam,6,2);
  
$jatahjam = $xjam;
$jatahmnt = $xmnt;
$menit = $jatahmnt+($jatahjam*60);
$timestamp = strtotime($jam) + $menit*60;
$tjam = date('H', $timestamp);
$tmnt = date('i', $timestamp);
$tdtk = date('s', $timestamp);


$telatujian = "$tjam:$tmnt:$tdtk";


//=========================
// Ambil Paket Soal
//=========================
$loop = mysql_query("select * from cbt_paketsoal where XStatusSoal ='Y' and XKodeSoal = '$_REQUEST[txt_kodesoal]'");
while($s = mysql_fetch_array($loop)){
$val_jumsoal = $s['XJumSoal'];
$val_pilganda = $s['XPilGanda'];
$val_esai = $s['XEsai'];

	$sqlubah = mysql_num_rows(mysql_query("select * from cbt_ujian where XKodeSoal = '$_REQUEST[txt_kodesoal]' and  XKodeUjian = '$_REQUEST[txt_ujian]' and XSemester = '$_REQUEST[txt_semester]' and XKodeKelas = '$s[XKodeKelas]' and XKodeJurusan = '$s[XKodeJurusan]' and XKodeMapel = '$s[XKodeMapel]' and XSetId = '$_COOKIE[beetahun]' "));
	
	/*
	if($sqlubah>0){
	$sqlubah2 = mysql_query("update cbt_ujian set XStatusUjian = '0' where XKodeSoal = '$_REQUEST[txt_kodesoal]' and  XKodeUjian = '$_REQUEST[txt_ujian]' and XSemester =  
	'$_REQUEST[txt_semester]' and XKodeKelas = '$s[XKodeKelas]' and XKodeJurusan = '$s[XKodeJurusan]' and XKodeMapel = '$s[XKodeMapel]' and XSetId = '$_COOKIE[beetahun]'");
	}
	*/
	
//=========================
// Ambil Bank Soal
//=========================

$jumsoal = mysql_num_rows(mysql_query("select * from cbt_soal where  XKodeSoal = '$_REQUEST[txt_kodesoal]'"));
$val_banksoal =  "$jumsoal"; 


if($val_jumsoal==0){$ambilsoal = $val_banksoal;} 
elseif($val_jumsoal>$val_banksoal){$ambilsoal = $val_banksoal;} 
else {$ambilsoal = $val_jumsoal;}
//  $sqlubah = mysql_query("insert into cbt_sampah (anu) values ('$_REQUEST[txt_ujian]')");
//================================
//
//=================================
$sqls = mysql_query("select u.*,m.*,u.Urut as Urutan,u.XKodeKelas as kokel from cbt_ujian u left join cbt_mapel m on m.XKodeMapel = u.XKodeMapel 
left join cbt_paketsoal p on p.XKodeSoal = u.XKodeSoal where u.XStatusUjian='1'");
								while($ss = mysql_fetch_array($sqls)){ 
$time1 = "$ss[XJamUjian]";
$time2 = "$ss[XLamaUjian]";

$secs = strtotime($time2)-strtotime("00:00:00");
$jamhabis = date("H:i:s",strtotime($time1)+$secs);	
$sekarang = date("H:i:s");	
$tglsekarang = date("Y-m-d");	
$tglujian = "$ss[XTglUjian]";	
		}
	
$sqlcek = mysql_num_rows(mysql_query("select * from cbt_ujian where XTokenUjian = '$_REQUEST[txt_token]'"));
	if($sqlcek>0){echo "<div class='alert alert-danger alert-dismissable' id='ndelik'>Simpan Data Gagal Token Sudah ada.</div>     ";
	} else {
				$sqlinsert = mysql_query("insert into cbt_ujian 						  
				(XKodeKelas,XKodeUjian,XSemester,XKodeJurusan,XJumPilihan,XAcakSoal,XKodeMapel,
				 XTokenUjian,XTglUjian,XJamUjian,XLamaUjian,XBatasMasuk,XJumSoal
				,XKodeSoal,XStatusUjian,XGuru,XSetId,XSesi,XPilGanda,XEsai,XLambat) values 		
				('$s[XKodeKelas]','$_REQUEST[txt_ujian]','$_REQUEST[txt_semester]','$s[XKodeJurusan]','$s[XJumPilihan]',
				'$s[XAcakSoal]','$s[XKodeMapel]','$_REQUEST[txt_token]','$tgl','$jam','$jame','$telatujian','$ambilsoal',
				'$s[XKodeSoal]','1','$s[XGuru]','$_COOKIE[beetahun]','$_REQUEST[txt_sesi]','$val_pilganda','$val_esai','$xlambat')");
				echo "<div class='alert alert-success alert-dismissable' id='ndelik'>
                                Simpan Data Sukses. 
                            </div>     ";

	}
}

?>
                              

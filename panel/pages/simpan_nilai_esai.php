<?php include "../../config/server.php";
	
if(isset($_REQUEST['nomere'])){$nomer= $_REQUEST['nomere'];}
if(isset($_REQUEST['siswae'])){$siswa= $_REQUEST['siswae'];}
if(isset($_REQUEST['tokene'])){$token= $_REQUEST['tokene'];}
if(isset($_REQUEST['soale'])){$soal= $_REQUEST['soale'];}
$tgl = date("Y-m-d");
$jam = date("H:i:s");

if(isset($_REQUEST['jawabe'])){
$nilai = str_replace(" ","",$_REQUEST['jawabe']);
}
$sqljenis = mysql_query("select * from cbt_jawaban where XNomerSoal='$nomer' and XKodeSoal = '$soal' and XUserJawab = '$siswa' and XTokenUjian = '$token'");
$uji = mysql_fetch_array($sqljenis);
$jenis = $uji['XJenisSoal'];
if($jenis==2){
	if($nilai==""||$nilai=="0"){$nilai = 0 ;}	
	$sql = mysql_query("update cbt_jawaban set XNilaiEsai = '$nilai' where XNomerSoal='$nomer' and XKodeSoal = '$soal' and XUserJawab = '$siswa' and XTokenUjian = '$token'");

} 

$sqljumlah = mysql_query("select sum(XNilaiEsai) as hasil from cbt_jawaban where XKodeSoal = '$soal' and XUserJawab = '$siswa' and XTokenUjian = '$token'");
$o = mysql_fetch_array($sqljumlah);
$tampil = round($o['hasil'],2);

$sqlnilai = mysql_query("select * from cbt_nilai where XKodeSoal = '$soal' and XNomerUjian = '$siswa' and XTokenUjian = '$token'");
$on = mysql_fetch_array($sqlnilai);
$NilP = $on['XNilai'];


$sqlpaket = mysql_query("select * from cbt_paketsoal where XKodeSoal = '$soal'");
$oj = mysql_fetch_array($sqlpaket);
$pakP = round($oj['XPersenPil'],2);
$pakE = round($oj['XPersenEsai'],2);

$subP = ($NilP*($pakP/100));
$subE = ($tampil*($pakE/100));
$Total = $subP+$subE;

$sqljo = mysql_query("update cbt_nilai set XEsai = '$tampil',XPersenPil = '$pakP',XPersenEsai = '$pakE',XTotalNilai = '$Total' where XKodeSoal = '$soal' and XNomerUjian = '$siswa' and XTokenUjian = '$token'");

echo $tampil;
?>
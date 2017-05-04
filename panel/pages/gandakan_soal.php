<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<?php
include "../../config/server.php";
$tgl = date("Y-m-d");

$sqlcek = mysql_query("select * from cbt_paketsoal where XKodeSoal = '$_REQUEST[txt_namax]'");
$jumcek = mysql_num_rows($sqlcek);
if($jumcek<1){

			$jumsoal = $_REQUEST['txt_jumsoalz1']+$_REQUEST['txt_jumsoalz2'];
			$sql = mysql_query("insert into cbt_paketsoal 
			(XKodeMapel,XLevel,XKodeSoal,XJumPilihan,XTglBuat,XGuru,XKodeKelas,XKodeJurusan,XJumSoal,XPilGanda,XEsai,XPersenPil,XPersenEsai) values 			
			('$_REQUEST[txt_mapelx]','$_REQUEST[txt_levelx]','$_REQUEST[txt_namax]','$_REQUEST[txt_jawabx]','$tgl',			
			'$_COOKIE[beelogin]','$_REQUEST[txt_kelasx]','$_REQUEST[txt_jurusanx]','$jumsoal',
			'$_REQUEST[txt_jumsoalz1]','$_REQUEST[txt_jumsoalz2]','$_REQUEST[txt_bobotsoalz1]','$_REQUEST[txt_bobotsoalz2]')");
			
			$sqlsoal = mysql_query("select * from cbt_soal where XKodeSoal = '$_REQUEST[txt_ujianx]'");
			$jumsql = mysql_num_rows($sqlsoal);
			if($jumsql>0){
				while($r = mysql_fetch_array($sqlsoal)){
				$str_tanya = str_replace("'","\'",$r['XTanya']);
					 $query = mysql_query("INSERT INTO cbt_soal (XNomerSoal, XKodeMapel, XKodeSoal, XTanya, XJawab1, XGambarJawab1, XJawab2,XGambarJawab2, 
					 XJawab3,XGambarJawab3, XJawab4,XGambarJawab4, XJawab5,XGambarJawab5, XAudioTanya, XVideoTanya, XGambarTanya, XKunciJawaban,XJenisSoal,XAcakSoal,
					 XAcakOpsi,XKategori) 
					 VALUES ('$r[XNomerSoal]','$r[XKodeMapel]','$_REQUEST[txt_namax]','$str_tanya','$r[XJawab1]','$r[XGambarJawab1]','$r[XJawab2]','$r[XGambarJawab2]',
					'$r[XJawab3]','$r[XGambarJawab3]','$r[XJawab4]','$r[XGambarJawab4]','$r[XJawab5]','$r[XGambarJawab5]','$r[XAudioTanya]',
					 '$r[XVideoTanya]','$r[XGambarTanya]','$r[XKunciJawaban]','$r[XJenisSoal]','$r[XAcakSoal]','$r[XAcakOpsi]','$r[XKategori]')");
				}
			}
echo "1.Soal Sukses di Gandakan";			
} else {
echo "2.Duplikasi Soal TIDAK BERHASIL, Kode Bank Soal SUDAH ADA";
}
?>

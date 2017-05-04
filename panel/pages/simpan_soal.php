<?php 
include "../../config/server.php";
if($_REQUEST['aksi']=="simpan"){
$sqlcek = mysql_query("select * from cbt_paketsoal where Urut = '$_REQUEST[txt_mapel]'");
$sta = mysql_fetch_array($sqlcek);

$jum = $_REQUEST['txt_status'];
if($jum=="AKTIF"){
$sqlpasaif = mysql_query("update cbt_paketsoal set XStatusSoal = 'N' where Urut = '$_REQUEST[txt_mapel]'");
}
	$sqlcek = mysql_num_rows(mysql_query("select * from cbt_paketsoal where XKodeMapel= '$sta[XKodeMapel]' and  XKodeJurusan= '$sta[XKodeJurusan]' and XKodeKelas= 
	'$sta[XKodeKelas]'	and XLevel= '$sta[XLevel]'	and XKodeSoal= '$_REQUEST[txt_soal]' and XStatusSoal = 'Y'"));
	
	if($sqlcek<1){
		$status = $sta['XStatusSoal']; 
		if($status=="Y"){ $ubah = "N"; } 
		elseif($status=="N"){ $ubah = "Y"; } 
		$sqlpasaif = mysql_query("update cbt_paketsoal set XStatusSoal = '$ubah' where Urut = '$_REQUEST[txt_mapel]'");
		}
	echo "$sqlcek";
	} else {
	echo "$sqlcek";
	}




if($_REQUEST['aksi']=="acak"){
$sqlcek = mysql_query("select * from cbt_paketsoal where Urut = '$_REQUEST[txt_mapel]'");
$sta = mysql_fetch_array($sqlcek);
$status = $sta['XAcakSoal']; 
if($status=="Y"){ $ubah = "N"; } 
elseif($status=="N"){ $ubah = "Y"; } 
$sqlpasaif = mysql_query("update cbt_paketsoal set XAcakSoal = '$ubah' where Urut = '$_REQUEST[txt_mapel]'");
}	


if($_REQUEST['putar']==0){
$sql = mysql_query("update cbt_audio set XMulai = '$_REQUEST[putar]', XPutar = '2'");
} else {
$sql = mysql_query("update cbt_audio set XMulai = '$_REQUEST[anu]'");
}
	
	?>
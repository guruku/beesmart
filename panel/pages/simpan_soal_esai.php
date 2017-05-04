
<?php include "../../config/server.php";
header('Content-type: text/html; charset=utf-8');
$sss= str_replace("'","\'",$_REQUEST['txt_tanya']);
 	$sql0 = mysql_query("update cbt_soal set XTanya = '$sss', 
	XGambarTanya='$_REQUEST[txt_gbr]',
	XAudioTanya='$_REQUEST[txt_aud]',
	XVideoTanya='$_REQUEST[txt_vid]	
	where XKodeSoal = '$_REQUEST[txt_soal]' and Urut = '$_REQUEST[txt_nom]'");
	//echo "update cbt_soal set XTanya = '$sss' where XKodeSoal = '$_REQUEST[txt_soal]' and Urut = '$_REQUEST[txt_nom]'";
	

?>

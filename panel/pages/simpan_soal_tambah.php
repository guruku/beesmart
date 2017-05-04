<?php include "../../config/server.php";
$sss= str_replace("'","\'",$_REQUEST['txt_tanya']);
$sss= str_replace("  ","",$sss);

$file = $_REQUEST['txt_gbr'];
$file = basename($file);
$file = str_replace( "\\", '/',$file);
$file = basename($file);

$filea = $_REQUEST['txt_audio'];
$filea = basename($filea);
$filea = str_replace( "\\", '/',$filea);
$filea = basename($filea);

$filev = $_REQUEST['txt_video'];
$filev = basename($filev);
$filev = str_replace( "\\", '/',$filev);
$filev = basename($filev);

$gambar = $file;
$audio = $filea;
$video = $filev;

	$img = rand(1000,100000)."-".$_FILES['fileUpload']['name'];
	$img_loc = $_FILES['fileUpload']['tmp_name'];
	$folder="upl_gambar/";
	$proses = move_uploaded_file($img_loc,$folder.$img);
	
	$img = rand(1000,100000)."-".$_FILES['fileUpload2']['name'];
	$img_loc = $_FILES['fileUpload2']['tmp_name'];
	$folder="upl_audio/";
	$proses2 = move_uploaded_file($img_loc,$folder.$img);

	$img = rand(1000,100000)."-".$_FILES['fileUpload3']['name'];
	$img_loc = $_FILES['fileUpload3']['tmp_name'];
	$folder="upl_video/";
	$proses3 = move_uploaded_file($img_loc,$folder.$img);


$sql0 = mysql_query("insert into cbt_soal (XTanya,XJawab1,XJawab2,XJawab3,XJawab4,XJawab5,XKunciJawaban,XGambarJawab1,XGambarJawab2,XGambarJawab3,XGambarJawab4,XGambarJawab5,XKodeSoal,XNomerSoal,XKodeMapel,XGambarTanya,XAudioTanya,XVideoTanya,XJenisSoal,XKategori,XAcakSoal,XAcakOpsi) values 
('$sss','$_REQUEST[txt_jawab1]','$_REQUEST[txt_jawab2]','$_REQUEST[txt_jawab3]','$_REQUEST[txt_jawab4]','$_REQUEST[txt_jawab5]',
'$_REQUEST[txt_kunci]','$_REQUEST[txt_gbr1]','$_REQUEST[txt_gbr2]','$_REQUEST[txt_gbr3]','$_REQUEST[txt_gbr4]','$_REQUEST[txt_gbr5]','$_REQUEST[txt_soal]',
'$_REQUEST[txt_nomax]','$_REQUEST[txt_mapel]','$gambar','$audio','$video','$_REQUEST[txt_kate]','$_REQUEST[txt_kes]','$_REQUEST[txt_aca]','$_REQUEST[txt_ops]')");

//$sql0 = mysql_query("insert into cbt_soal (XTanya) values ('$sss')");

?>

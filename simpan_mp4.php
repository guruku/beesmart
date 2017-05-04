<?php
include "config/server.php";
if($_REQUEST['aksi']=="pause"){
$sql = mysql_query("update cbt_jawaban set XMulaiV = '$_REQUEST[waktu]' where XUserJawab ='$_COOKIE[PESERTA]' and XKodeSoal = '$_REQUEST[soal]' and urut = '$_REQUEST[nomer]' and XTokenUjian = '$_REQUEST[token]'");
}
elseif($_REQUEST['aksi']=="habis"){
$sql = mysql_query("update cbt_jawaban set XMulaiV = '$_REQUEST[waktu]', XPutarV='1' where XUserJawab ='$_COOKIE[PESERTA]' and XKodeSoal = '$_REQUEST[soal]' and urut = '$_REQUEST[nomer]' and XTokenUjian = '$_REQUEST[token]'");
}

?>

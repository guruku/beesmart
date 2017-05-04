<?php
include "../../config/server.php";
$sql = mysql_query("update cbt_ujian set 
XPengawas = '$_REQUEST[txt_pengawas]',
XNIPPengawas = '$_REQUEST[txt_nippengawas]'
where XTokenUjian = '$_REQUEST[txt_tokenx]'");

echo "Ubah data berhasil !"; 
?>
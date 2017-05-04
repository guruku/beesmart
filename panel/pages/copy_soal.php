<?php
include "../../config/server.php";
$id=$_POST['txt_mapel'];
$sql = mysql_query("select * from cbt_soal where Urut='$id'");
$s = mysql_fetch_array($sql);


$sql1 = "delete from cbt_soal where XKodeSoal = '$soal'";
mysql_query( $sql1);

$sql2 = "delete from cbt_paketsoal where Urut='$id'";
mysql_query( $sql2);

?>
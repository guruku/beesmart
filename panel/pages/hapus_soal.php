<?php
include "../../config/server.php";
$id=$_POST['txt_soal'];
$sql = mysql_query("select * from cbt_soal where XKodeSoal='$id'");
$s = mysql_fetch_array($sql);
$soal = str_replace(" ","",$s['XKodeSoal']);

$sql1 = "delete from cbt_soal where XKodeSoal = '$soal'";
mysql_query( $sql1);

$sql2 = "delete from cbt_paketsoal where XKodeSoal='$id'";
mysql_query( $sql2);

$sql3 = "delete from cbt_ujian where XKodeSoal='$id'";
mysql_query( $sql3);

$sql4 = "delete from cbt_jawaban where XKodeSoal='$id'";
mysql_query( $sql4);

$sql5 = "delete from cbt_siswa_ujian where XKodeSoal='$id'";
mysql_query( $sql5);

$sql6 = "delete from cbt_nilai where XKodeSoal='$id'";
mysql_query( $sql6);

?>
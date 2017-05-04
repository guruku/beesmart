<?php
include "../../config/server.php";
$id=$_REQUEST['nomer'];
$sql = mysql_query("select * from cbt_soal where XKodeSoal = '$_REQUEST[soal]'  and Urut = '$id'");
$s = mysql_num_rows($sql);
$soal = str_replace(" ","",$_REQUEST['soal']);
if($s>0){
$sql1 = "delete from cbt_soal where XKodeSoal = '$soal' and Urut = '$id'";
mysql_query( $sql1);
}
echo "select * from cbt_soal where XKodeSoal = '$_REQUEST[soal]'  and Urut = '$id'";
?>
<?php ini_set('max_execution_time',0); 
include "../../config/server_pusat.php";

$sql1 = mysql_query("select * from cbt_soal where XGambarTanya !='' group by XGambarTanya");
$jum1 = mysql_num_rows($sql1);

$sql2 = mysql_query("select * from cbt_soal where XAudioTanya !='' group by XAudioTanya");
$jum2 = mysql_num_rows($sql2);

$sql3 = mysql_query("select * from cbt_soal where XVideoTanya !='' group by XVideoTanya");
$jum3 = mysql_num_rows($sql3);

$sql4 = mysql_query("select * from cbt_soal where XGambarJawab1 !='' group by XGambarJawab1");
$jum4 = mysql_num_rows($sql4);

$sql5 = mysql_query("select * from cbt_soal where XGambarJawab2 !='' group by XGambarJawab2");
$jum5 = mysql_num_rows($sql5);

$sql6 = mysql_query("select * from cbt_soal where XGambarJawab3 !='' group by XGambarJawab3");
$jum6 = mysql_num_rows($sql6);

$sql7 = mysql_query("select * from cbt_soal where XGambarJawab4 !='' group by XGambarJawab4");
$jum7 = mysql_num_rows($sql7);

$sql8 = mysql_query("select * from cbt_soal where XGambarJawab5 !='' group by XGambarJawab5");
$jum8 = mysql_num_rows($sql8);

$total = $jum1+$jum2+$jum3+$jum4+$jum5+$jum6+$jum7+$jum8;

$jum2A = $jum2+$jum3;

$jum2B = $jum4+$jum5+$jum6+$jum7+$jum8;

echo "Jumlah : $jum4+$jum5+$jum6+$jum7+$jum8 = $jum2B<br>";



?>
<script src="../../../js/jquery.js"></script>



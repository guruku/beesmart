<?php 
include "config/server.php";
$sql = mysql_query("CREATE TEMPORARY TABLE cbt_ujian_baru AS SELECT * FROM cbt_jawaban where XTokenUjian = 'QWVUW'");
$sql1 = mysql_query("select * from cbt_ujian_baru where XUserJawab = 'U003'"); 
while($r = mysql_fetch_array($sql1)){
echo "$r[XTokenUjian]-$r[XJawabanEsai]-$r[XJawaban]<br>";
}


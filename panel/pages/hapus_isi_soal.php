<?php
include "../../config/server.php";
$sql1 = "delete from cbt_soal where XKodeSoal = '$_REQUEST[txt_mapel]'";
mysql_query( $sql1);


?>
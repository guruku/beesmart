<?php 
include "../../config/server.php";	
?>
<?php
$sqlselesai = mysql_query("update cbt_ujian set XStatusUjian = '9' where Urut = '$_REQUEST[txt_ujian]'");
?>


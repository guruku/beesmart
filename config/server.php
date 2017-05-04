<?php
// 1. Connect ke database
$sqlconn=@mysql_connect("localhost:3306","root","");
// 2. Pilih database
date_default_timezone_set("Asia/Jakarta");
mysql_select_db("beesmartv3", $sqlconn);
$mode = "lokal"; // pilih 'lokal' atau 'pusat'
?>

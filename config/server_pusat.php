<?php
// 1. Connect ke database
//$sqlconn=mysql_connect("localhost:3306","root","");
// 2. Pilih database
include "ipserver.php";
//tambahkan IPPublic ke Remote MySQL di CPanel hosting
$link = @mysql_connect($host_name, $user_name, $password);
mysql_select_db('beesmartv3', $link) or die('Koneksi2 CBT BEESMART belum di setting');
//echo "Koneksi Terbuka";

date_default_timezone_set("Asia/Jakarta");
mysql_select_db("beesmartv3", $sqlconn);


?>

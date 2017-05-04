<?php 
include "../../config/server.php";
/*
$sql = mysql_query("ALTER TABLE `cbt_paketsoal` CHANGE `XKodeSoal` `XKodeSoal` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL;");
echo "Update cbt_paketsoal Selesai<br>";
$sql = mysql_query("ALTER TABLE `cbt_jawaban` CHANGE `XKodeSoal` `XKodeSoal` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL;");
echo "Update cbt_jawaban Selesai<br>";
$sql = mysql_query("ALTER TABLE `cbt_nilai` CHANGE `XKodeSoal` `XKodeSoal` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL;");
echo "Update cbt_nilai Selesai<br>";
$sql = mysql_query("ALTER TABLE `cbt_soal` CHANGE `XKodeSoal` `XKodeSoal` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL;");
echo "Update cbt_soal Selesai<br>";
$sql = mysql_query("ALTER TABLE `cbt_siswaujian` CHANGE `XKodeSoal` `XKodeSoal` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL;");
echo "Update cbt_siswaujian Selesai<br>";
$sql = mysql_query("ALTER TABLE `cbt_ujian` CHANGE `XKodeSoal` `XKodeSoal` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL;");
echo "Update cbt_ujian Selesai<br>";
*/
$sql = mysql_query("ALTER TABLE `cbt_soal_ujian` ADD `XAgama` VARCHAR(20) NOT NULL AFTER `XJamPeriksa`;");
echo "Update cbt_ujian Selesai<br>";


?>

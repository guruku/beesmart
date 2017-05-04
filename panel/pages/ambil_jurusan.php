<?php
include "../../config/server.php";
$level = $_GET['txt_level'];
$kelas = $_GET['txt_kelas'];

echo "<option selected>-- Pilih Jurusan --</option>\n";
//$soal = mysql_query("select * from cbt_ujian where  XKodeKelas = '$level' and XKodeMapel = '$mapel' order by XKodeSoal");
$soal = mysql_query("select XKodeJurusan from cbt_soal where XKodeKelas = '$kelas' and  XLevelKelas = '$level' order by XKodeJurusan");
while($k = mysql_fetch_array($soal)){
echo "<option value=\"".$k['XKodeJurusan']."\">".$k['XKodeJurusan']."</option>\n";
}

?>
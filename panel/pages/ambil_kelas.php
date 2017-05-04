<?php
include "../../config/server.php";
$jur = $_REQUEST['txt_jur'];
$kelas = $_GET['txt_kelas'];

$sql = mysql_query("select * from cbt_admin");
$xadm = mysql_fetch_array($sql);
$skull= $xadm['XSekolah'];
$skul_pic= $xadm['XLogo']; 
$skul_tkt= $xadm['XTingkat']; 

//echo "<option selected>-- Pilih Jurusan --</option>\n";
//$soal = mysql_query("select * from cbt_ujian where  XKodeKelas = '$level' and XKodeMapel = '$mapel' order by XKodeSoal");
$soal = mysql_query("select XKodeJurusan from cbt_kelas where XKodeJurusan = '$jur' and  XLevelKelas = '$skul_tkt' order by XKodeKelas");
while($k = mysql_fetch_array($soal)){
echo "<option value=\"".$k['XKodeKelas']."\">".$k['XKodeKelas']."</option>\n";
}

?>
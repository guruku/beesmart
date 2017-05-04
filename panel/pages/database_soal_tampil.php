<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<?php
include "../../config/server.php";
if($_REQUEST['aksi']=="tampil"){
$sql0 = mysql_query("select p.*,m.*,p.Urut as Urutan from cbt_paketsoal p left join cbt_mapel m on m.XKodeMapel = p.XKodeMapel where p.XGuru = '$_COOKIE[beelogin]' order by p.Urut desc");
?>

<table width="100%">
<tr>
<th>No.</th>
<th>Bank Soal</th>
<th>Mata Pelajaran</th>
<th>Level</th>
<th>Jum.Soal</th>
<th align="center">Pil.Jawab</th>
<th>Acak</th>
</tr>

<?Php
$no=1;

while($xadm = mysql_fetch_array($sql0)){
$sqlsoal = mysql_num_rows(mysql_query("select * from cbt_soal where XKodeSoal = '$xadm[XKodeSoal]'"));
if($sqlsoal<1){$kata="disabled";}  else {$kata="";}
echo "<tr height=40 style='border=0; border-bottom:thin solid #dcddde'><td>$no</td><td>$xadm[XKodeSoal]</td><td>$xadm[XNamaMapel]</td><td>$xadm[XLevel]</td>
<td align=center>$sqlsoal</td><td>$xadm[XJumPilihan]</td><td>$xadm[XAcakSoal]</td></tr>";?>
<!--
<td>
<a href=?modul=edit_soal&soal=$xadm[XKodeSoal]><button type='button' class='btn btn-info'>Periksa</button></a>
<a href=?modul=upl_soal&soal=$xadm[XKodeSoal]&mapel=$xadm[XKodeMapel]><button type='button' class='btn btn-default'>Upload</button></a>
</td></tr>"; ?>
!-->

<?php
$no++;

}
?>

</table>

<?php } ?>

<style>.tombol  
/* Or better yet try giving an ID or class if possible*/
{
 border: 0;
 background: #66bda8;
 box-shadow:none;
 color:#FFF;
 text-decoration:none;
 padding:5px;
 width:80px;
 border-radius: 0px;
}</style>

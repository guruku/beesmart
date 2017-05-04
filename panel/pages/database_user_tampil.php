<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<?php
include "../../config/server.php";
$sql0 = mysql_query("select * from cbt_user order by Urut");
?>

<table width="100%">
<tr>
<th>No.</th>
<th>User</th>
<th>Nama</th>
<th>Level</th>
<th>Status</th>
</tr>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="jquery-1.4.js"></script>
<?Php
$no=1;
while($xadm = mysql_fetch_array($sql0)){
if($xadm['login']=="1"){$rol = "Admin";} else { $rol = "Guru";}
echo "<tr height=40 style='border=0; border-bottom:thin solid #dcddde'><td>$no</td><td>$xadm[Username]</td><td>$xadm[Nama]</td>"; ?>
<td><?php echo "$rol"; ?></td><td>

<script>    
$(document).ready(function(){
	$('#btnDelete').on('click', function(){
	alert();
	});
});
</script>
<a href="?modul=buat_user&aksion=hapus&urut=<?php echo $xadm['Urut']; ?>"><button type="button" class="btn btn-danger btn-small"><i class="fa fa-times"></i></button></a>
</td>

</tr>
<?php
$no++;
}
?>

</table>

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


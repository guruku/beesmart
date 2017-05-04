<?php
include "../../config/server.php";
$tgl = date("Y-m-d");
 if($_REQUEST['txt_role']=="admin"){$tipe = "1";} else {$tipe="0";}
  
$pass  = md5($_REQUEST['txt_pass']);
$sql = mysql_query("insert into cbt_user (Username,Password,NIP,Nama,HP,FacebookID,login,Status) values ('$_REQUEST[txt_user]','$pass','$_REQUEST[txt_nik]','$_REQUEST[txt_nama]','$_REQUEST[txt_hp]','$_REQUEST[txt_email]','$tipe','1')");

?>

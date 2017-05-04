<?php
include "../../config/server.php";
$uploaddir = '../../video/'; 
$namafile = basename($_FILES['uploadfile3']['name']);
$file = $uploaddir . basename($_FILES['uploadfile3']['name']); 
 if (move_uploaded_file($_FILES['uploadfile3']['tmp_name'], $file)) { 
//$sql = mysql_query("update cbt_admin set XLogo = '$namafile'");
  echo "success"; 
} else {
//	echo "error";
}

?>
<?php
include "../../config/server.php";
$uploaddir = '../../audio/'; 
$namafile = basename($_FILES['uploadfile2']['name']);
$file = $uploaddir . basename($_FILES['uploadfile2']['name']); 
 if (move_uploaded_file($_FILES['uploadfile2']['tmp_name'], $file)) { 
//$sql = mysql_query("update cbt_admin set XLogo = '$namafile'");
  echo "success"; 
} else {
//	echo "error";
}

?>
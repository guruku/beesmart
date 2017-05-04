<?php
include "../../config/server.php";
$uploaddir = '../../pictures/'; 
$namafile = basename($_FILES['uploadfile8']['name']);
$file = $uploaddir . basename($_FILES['uploadfile8']['name']); 
 if (move_uploaded_file($_FILES['uploadfile8']['tmp_name'], $file)) { 
//$sql = mysql_query("update cbt_admin set XLogo = '$namafile'");
  echo "success"; 
} else {
//	echo "error";
}

?>
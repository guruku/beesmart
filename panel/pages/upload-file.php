<?php
include "../../config/server.php";
$uploaddir = '../../images/'; 
$namafile = basename($_FILES['uploadfile']['name']);
$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
 if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
$sql = mysql_query("update cbt_admin set XLogo = '$namafile'");
  echo "success"; 
} else {
//	echo "error";
}

?>
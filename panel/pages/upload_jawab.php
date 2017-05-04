<?php
include "../../config/server.php";
$uploaddir = '../../pictures/'; 
$nomer = $_REQUEST['jno');
$files = "uploadfile$nomer";

$namafile = basename($_FILES[$files]['name']);
$file = $uploaddir . basename($_FILES[$files]['name']); 
 if (move_uploaded_file($_FILES[$files]['tmp_name'], $file)) { 
//$sql = mysql_query("update cbt_admin set XLogo = '$namafile'");
  echo "success"; 
} else {
//	echo "error";
}

?>
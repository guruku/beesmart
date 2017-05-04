<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<?php
include "../../config/server.php";
$uploaddir = '../../images/'; 


$namafile1 = basename($_FILES['uploadfile1']['name']);
$file1 = $uploaddir . basename($_FILES['uploadfile1']['name']); 
 if (move_uploaded_file($_FILES['uploadfile1']['tmp_name'], $file1)) { 
$sql = mysql_query("update cbt_admin set XBanner = '$namafile1'");
  echo "success"; 
} else {
	echo "error";
}

?>
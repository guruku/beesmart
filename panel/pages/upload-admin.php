<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<?php
include "../../config/server.php";
$uploaddir = '../../images/'; 


$namafile2 = basename($_FILES['uploadfile2']['name']);
$file2 = $uploaddir . basename($_FILES['uploadfile2']['name']); 
 if (move_uploaded_file($_FILES['uploadfile2']['tmp_name'], $file2)) { 
$sql = mysql_query("update cbt_admin set XPicAdmin = '$namafile2'");
  echo "success"; 
} else {
	echo "error";
}

?>
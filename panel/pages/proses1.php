
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_POST['btn-upload']))
{
	$img = rand(1000,100000)."-".$_FILES['fileUpload']['name'];
	$img_loc = $_FILES['fileUpload']['tmp_name'];
	$folder="upl_gambar/";
	if(move_uploaded_file($img_loc,$folder.$img))
	{
		echo "<script>alert('Upload Sukses!!!');</script>";
	}
	else
	{
		echo "<script>alert('Upload Gagal');</script>";
	} 
	
	$img = rand(1000,100000)."-".$_FILES['fileUpload2']['name'];
	$img_loc = $_FILES['fileUpload2']['tmp_name'];
	$folder="upl_video/";
	if(move_uploaded_file($img_loc,$folder.$img))
	{
		echo "<script>alert('Upload Video Sukses!!!');</script>";
	}
	else
	{
		echo "<script>alert('Upload Video Gagal');</script>";
	} 

}
?>
</body>
</html>

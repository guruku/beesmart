<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
 <?php
//error_reporting(0);
//session_start();
include "../../config/server.php"; 
$session_id='1'; //$session id
define ("MAX_SIZE","700000"); // 700MB MAX file size
function getExtension($str) 
{

         $i = strrpos($str,".");
         if (!$i) { return ""; } 

         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

	$valid_formats = array("dbf","txt","rar","zip","ai","flv","pdf","PDF","cdr","psd","mov","mp4","MP4","mp3","ppt","pptx","doc","docx","xls","xlsx","jpg", "png", "gif", "bmp","jpeg","tiff","avi");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			//$name= ereg_replace(",","_",$name);			
			if(strlen($name))
				{
					 $ext = getExtension($name);
					if(in_array($ext,$valid_formats))
					{
					if ($size < (600(1024*1024)))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", "bee"), 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							$tmp = str_replace(",", "_", $tmp);
							$tmp = str_replace(" ", "_", $tmp);	
							//$var =$_FILES['Filedata']['name'];
							
							$path = "../../pictures/";
							if($ext=='MP3'||$ext=='mp3'){$path = "../../audio/";}
							if($ext=='MP4'||$ext=='mp4'){$path = "../../video/";}							
							if($ext=='jpeg'||$ext=='jpg'||$ext=='JPEG'||$ext=='JPG'||$ext=='PNG'||$ext=='png'||$ext=='GIF'||$ext=='gif'){$path = "../../pictures/";}													
											
							//if(move_uploaded_file($tmp, $path.$actual_image_name))
							if(move_uploaded_file($tmp, $path.$name))
								{
								//mysqli_query($db,"UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'");
								
									$tip = str_replace(" ","",$ext);
									if($tip == '' ){
									$ficon = "kosong.png";}
									else if($tip == 'xls' || $tip == 'xlsx'){
									$ficon = "xls.png";}
									else if($tip == 'doc' || $tip == 'docx'){
									$ficon = "doc.png";}
									else if($tip == 'ppt' || $tip == 'pptx'){
									$ficon = "ppt.png";}
									else if($tip == 'mp3' || $tip == 'wav'){
									$ficon = "mp3.png";}
									else if($tip == '3gp' || $tip == 'avi' || $tip == 'mov'  || $tip == 'mp4'){
									$ficon = "vid.png";}
									if($tip == 'jpg' || $tip == 'png' || $tip == 'jpeg' || $tip == 'gif'|| $tip == 'bmp'|| $tip == 
									'tiff'){
									echo "<td><img src='../../pictures/".$name."'  class='preview'>$name</td>";} else {
									echo "<td><img src='images/$ficon'  class='preview'>$name</td>";}
									echo "</tr></table>";
								}
							else
								echo "Fail upload folder with read access.";
						}
						else
						echo "Image file size max 1 MB";					
						}
						else
						echo "Invalid file format..";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
		}

?>
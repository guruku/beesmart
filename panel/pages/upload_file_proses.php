 <?php
error_reporting(0);
session_start();
//include('db.php');

$session_id='1'; //$session id
define ("MAX_SIZE","9000000"); 
function getExtension($str)
{
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}


$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","mp3","mp4","avi");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") 
{
	
    $uploaddir = "uploads/"; //a directory inside
	
    foreach ($_FILES['photos']['name'] as $name => $value)
    {
	
        $filename = stripslashes($_FILES['photos']['name'][$name]);
        $size=filesize($_FILES['photos']['tmp_name'][$name]);
        //get the extension of the file in a lower case format
          $ext = getExtension($filename);
          $ext = strtolower($ext);
     	
         if(in_array($ext,$valid_formats))
         {
		 	   if($ext=='mp4'||$ext=='avi'||$ext=='MP4'||$ext=='AVI'){
			   $uploaddir = "../../video/"; //a directory inside
			   }
			   elseif($ext=='mp3'||$ext=='wav'||$ext=='MP3'||$ext=='WAV'){
			   $uploaddir = "../../audio/"; //a directory inside
			   }
			   else{
			   $uploaddir = "../../pictures/"; //a directory inside
			   }
	       //if ($size < (MAX_SIZE*1024))
		   if($size<(300000*(1024*1024)))
	       {
		   //$image_name=time().$filename;
		   $image_name=$filename;
		   $eks = getExtension($image_name);
           $ext1 = strtolower($eks);
		  
		   	   if($ext1=='mp4'||$ext1=='avi'){
			   echo "<img src='../../images/vid.png' class='imgList'>"; 
			   $fold = "video";} 
			   elseif($ext1=='mp3'||$ext1=='wav'){
			   echo "<img src='../../images/mp3.png' class='imgList'>";
			   $fold = "audio";} 
			   else {
			   echo "<img src='".$uploaddir.$image_name."' class='imgList'>";
			   $fold = "pictures";}

		   
		   //echo "<img src='".$uploaddir.$image_name."' class='imgList'>";
		   $newname=$uploaddir.$image_name;
           
           if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) 
           {
	       $time=time();
	       //mysql_query("INSERT INTO cbt_upload_file(image_name,user_id_fk,created) VALUES('$image_name','$session_id','$time')");
		   include "../../config/server.php";
		   $ye = mysql_query("INSERT INTO cbt_upload_file(XNamaFile,XFolder) VALUES('$image_name','$fold')");
	       }
	       else
	       {
	        echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
            }

	       }
		   else
		   {
			echo '<span class="imgList">You have exceeded the size limit!</span>';
          
	       }
       
          }
          else
         { 
	     	echo '<span class="imgList">Unknown extension!</span>';
           
	     }
           
     }
}

?>
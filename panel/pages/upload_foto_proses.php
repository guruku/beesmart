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


$valid_formats = array("jpg","gif", "jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") 
{
	
    //$uploaddir = "uploads/"; //a directory inside
	
    foreach ($_FILES['photos']['name'] as $name => $value)
    {
	
        $filename = stripslashes($_FILES['photos']['name'][$name]);
        $size=filesize($_FILES['photos']['tmp_name'][$name]);
        //get the extension of the file in a lower case format
          $ext = getExtension($filename);
          $ext = strtolower($ext);
     	
         if(in_array($ext,$valid_formats))
         {
			   $uploaddir = "../../fotosiswa/"; //a directory inside
	       //if ($size < (MAX_SIZE*1024))
		   if($size<(300000*(1024*1024)))
	       {
		   //$image_name=time().$filename;
		   $image_name=$filename;
		   $eks = getExtension($image_name);
           $ext1 = strtolower($eks);
			   echo "<img src='".$uploaddir.$image_name."' class='imgList'>";

		   
		   //echo "<img src='".$uploaddir.$image_name."' class='imgList'>";
		   $newname=$uploaddir.$image_name;
           
           if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) 
           {
	       $time=time();
	       //mysql_query("INSERT INTO user_uploads(image_name,user_id_fk,created) VALUES('$image_name','$session_id','$time')");
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
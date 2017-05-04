<?php 
//session_start();
//$session_id='1'; //$session id
?>
<html>
<head>
<title>CBT BEESMART | UPLOAD</title>
</head>

<script src="js/jquery.min.js"></script>
<script src="js/jquery.wallform.js"></script>
<script>
var $jnoc = jQuery.noConflict(); 
 $jnoc(document).ready(function() { 
		
            $jnoc('#photoimg').die('click').live('change', function()			{ 
			           //$("#preview").html('');
			    
				$jnoc("#imageform").ajaxForm({target: '#preview', 
				     beforeSubmit:function(){ 
					
					console.log('ttest');
					$jnoc("#imageloadstatus").show();
					$jnoc("#imageloadbutton").hide();
					 }, 
					success:function(){ 
				    console.log('test');
					 $jnoc("#imageloadstatus").hide();
					 $jnoc("#imageloadbutton").show();
					}, 
					error:function(){ 
					console.log('xtest');
					$jnoc("#imageloadstatus").hide();
					$jnoc("#imageloadbutton").show();
					} }).submit();
					
		
			});
        }); 
</script>

<style>

body
{
font-family:arial;
}

#preview
{
color:#cc0000;
font-size:12px
}
.imgList 
{
max-height:150px;
margin-left:5px;
border:1px solid #dedede;
padding:4px;	
float:left;	
}

</style>
<body>

<div class="row">
<div class="panel panel-default panel-small" style="margin-top:20px; width:95%">
                        <div class="panel-heading" >
                        Upload File Pendukung Soal.
						</div>
    <div class="panel-body">       

<form id="imageform" method="post" enctype="multipart/form-data" action='upload_file_proses.php' style="clear:both">
		<div class="alert alert-danger"  id="ndelik" style="width:90%">
        <ul>
        	<li>Pastikan File PHP.ini sudah di Set (upload_max_filesize=3000M, post_max_size = 3000M) !!!!</li>
        	<li>Pergunakan huruf dan angkat (A-Z, a-z, 0-9) untuk Nama File </li>            
        	<li>Tidak boleh memakai Spasi</li>                        
        </ul>
        </div>

        Upload File pendukung soal, semua file akan dimasukkan ke masing-masing folder 
        <br><ul>
        <li> mp3 : ke folder audio </li>
        <li> mp4 : ke folder video </li>
        <li> jpg : ke folder pictures (bisa juga dengan extensi png) </li>
        </ul>
        <br>
 
<div id='imageloadstatus' style='display:none'><img src="loader.gif" alt="Uploading...."/></div>
<div id='imageloadbutton'>
<input type="file" name="photos[]" id="photoimg" multiple="true" />
</div>
</form><br>
<div id='preview'></div>
	</div>
</div>
</div>
</body>
</html>
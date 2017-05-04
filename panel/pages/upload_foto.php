<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<html>
<head>
<title>Ajax Image Upload </title>
</head>

<script src="js/jquery.min.js"></script>
<script src="js/jquery.wallform.js"></script>
<script>
$.noConflict();
jQuery( document ).ready(function( $ ) {

// $(document).ready(function() { 
		
            $('#photoimg').die('click').live('change', function()			{ 
			           //$("#preview").html('');
			    
				$("#imageform").ajaxForm({target: '#preview', 
				     beforeSubmit:function(){ 
					
					console.log('ttest');
					$("#imageloadstatus").show();
					 $("#imageloadbutton").hide();
					 }, 
					success:function(){ 
				    console.log('test');
					 $("#imageloadstatus").hide();
					 $("#imageloadbutton").show();
					}, 
					error:function(){ 
					console.log('xtest');
					 $("#imageloadstatus").hide();
					$("#imageloadbutton").show();
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
	<div class="panel panel-default panel-small" style="margin-top:20px;">
                        <div class="panel-heading" >
                        Upload Foto peserta Ujian
						</div>
    <div class="panel-body">                        
    <br>
    <div id='preview'></div>
    </div>
            <div class="panel-footer">                        
            <form id="imageform" method="post" enctype="multipart/form-data" action='upload_foto_proses.php' style="clear:both">
            <div id='imageloadstatus' style='display:none'><img src="images/loading.gif" alt="Uploading...."/></div>
            <div id='imageloadbutton' style="margin-top:20px">
            <input type="file" name="photos[]" id="photoimg" multiple="true" />
            </div>
            </form>
            </div>

	</div>
</div>    
</body>
</html>
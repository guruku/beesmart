<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<html>
<head>
<title>BSmart Upload File to Album</title>
</head>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.wallform.js"></script>

<script type="text/javascript" >
var $jnoc = jQuery.noConflict();   

 $jnoc(document).ready(function() { 
			var loading = $jnoc("#loading");
	var tampilkan = $jnoc("#tampilkan");
	var idx = $jnoc("#idx").val();
	
	function tampildata(){
	tampilkan.hide();
	loading.fadeIn();
	
	
	$jnoc.ajax({
    type:"POST",
    url:"bee_lib_tampilkan_isine.php",  
	//data:"aksi=tampil",  
	data: "aksi=tampil&idx=" + idx,
	success: function(data){ 
		loading.fadeOut();
		tampilkan.html(data);
		tampilkan.fadeIn(2000);
	   }
    }); 
	}// akhir fungsi tampildata
	tampildata();
		
		
            $jnoc('#photoimg').die('click').live('change', function()			{ 
			           //$("#preview").html('');
			    
				$jnoc("#imageform").ajaxForm({target: '#preview', 
				     beforeSubmit:function(){ 
					
					console.log('v');
					$jnoc("#imageloadstatus").show();
					 $jnoc("#imageloadbutton").hide();
					 }, 
					success:function(){ 
					console.log('z');
					 $jnoc("#imageloadstatus").hide();
					 $jnoc("#imageloadbutton").show();
					}, 
					error:function(){ 
							console.log('d');
					 $jnoc("#imageloadstatus").hide();
					$jnoc("#imageloadbutton").show();
					} }).submit();
					
				tampildata();
			});
        }); 
</script>

<style>

.preview
{
width:100px;
height:100px;
overflow:hidden;
border:solid 1px #dedede;
padding:10px;
}
#preview
{
color:#cc0000;
font-size:12px
}
#pilih{
float:left;
margin-top:0px;
margin-left:10px;
}

</style>
<body>
<div class="row">
<div class="panel panel-default panel-small" style="margin-top:20px;">
                        <div class="panel-heading" >
                        Upload File Pendukung Soalm.
						</div>
    <div class="panel-body">       
    
    <form id="imageform" method="post" enctype="multipart/form-data" action='bee_proses.php'>
    	<br>Upload File pendukung soal, semua file akan dimasukkan ke masing-masing folder 
        <br><ul>
        <li> mp3 : ke folder audio </li>
        <li> mp4 : ke folder video </li>
        <li> jpg : ke folder pictures (bisa juga dengan extensi png) </li>
        </ul>
        <br>
		<div id='imageloadstatus' style='display:none'><img src="../../images/loading.gif" alt="Uploading...."/></div>
        <div id='imageloadbutton'>
        <input type="file" name="photoimg" id="photoimg" />
        <input type="hidden" name="idalbum" id="idalbum" value="<?php echo $_REQUEST['id']; ?>"/>
        </div>
	</form>
    <div id='preview'></div>
	</div>
</div>
</div>
</body>
</html>
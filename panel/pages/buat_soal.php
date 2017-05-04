<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>

<?php
include "../../config/server.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>CBT BEESMART </title>
<script type="text/javascript" src="jquery-1.4.js"></script>
<script>  
var $jnoc = jQuery.noConflict(); 
$jnoc(document).ready(function(){

	var loading = $jnoc("#loading");
	var tampilkan = $jnoc("#tampilkan1");
 	var idstu = $jnoc("#idstu").val();

	function tampildata(){
	tampilkan.hide();
	loading.fadeIn();
	
	$jnoc.ajax({
    type:"POST",
    url:"database_soal.php",  
	data:"aksi=tampil&idstu=" + idstu,  
	success: function(data){ 
		loading.fadeOut();
		tampilkan.html(data);
		tampilkan.fadeIn(2000);
	   }
    }); 
	}// akhir fungsi tampildata
	tampildata();


});
</script>

<link rel="stylesheet" type="text/css" href="./styles.css" />

<style>
.left {
    float: left;
    width: 35%;
}
.right {
    float: right;
    width: 63%;
}
.group:after {
    content:"";
    display: table;
    clear: both;
}
img {
    max-width: 100%;
    height: auto;
}
@media screen and (max-width: 480px) {
    .left, 
    .right {
        float: none;
        width: auto;
		margin-top:10px;		
    }
	
}
</style>
</head>
<body>
<div id="mainbody" >
<br />
<span>

<div class="group">
    <div class="left">

                
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Bank Soal
                        </div>
                        <?php 
                         $sqladmin = mysql_query("select * from cbt_admin");
                         $sa = mysql_fetch_array($sqladmin);
						 $skul = $sa['XTingkat'];
						 ?>
                        <div class="panel-body">
                            <table width="100%">
                            <tr height="42px"><td width="40%">Nama Bank Soal&nbsp;</td><td>: <input type="text" id="namasoal"/></td></tr>
                            <tr height="42px"><td>Level Soal&nbsp;</td><td>: 
                            <select id="tingkatsoal">
                            <option value="PG" <?php if($skul=='PG'){echo "selected";} ?>>TK</option>
                            <option value="TK" <?php if($skul=='TK'){echo "selected";} ?>>TK</option>                            
                            <option value="SD" <?php if($skul=='SD'){echo "selected";} ?>>SD</option>
                            <option value="MI" <?php if($skul=='MI'){echo "selected";} ?>>MI</option>                            
                            <option value="SMP" <?php if($skul=='SMP'){echo "selected";} ?>>SMP</option>
                            <option value="MTs" <?php if($skul=='MTs'){echo "selected";} ?>>MTs</option>                            
                            <option value="SMU" <?php if($skul=='SMU'){echo "selected";} ?>>SMA</option>
                            <option value="MA" <?php if($skul=='MA'){echo "selected";} ?>>MA</option>                            
                            <option value="SMK" <?php if($skul=='SMK'){echo "selected";} ?>>SMK</option>                            
							</select>
                            <tr height="42px"><td>Mata Pelajaran&nbsp;</td><td>: 
                            
                            								<select name="txt_mapel" id="txt_mapel">
                                <?php 
                                $sqlkelas = mysql_query("select * from cbt_mapel order by XNamaMapel");
                                while($sk = mysql_fetch_array($sqlkelas)){
                                echo "<option value='$sk[XKodeMapel]'>$sk[XNamaMapel]</option>";
                                }
                                ?>
                                </select>

                            
                            
                            </td></tr>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <input type="submit"  class="btn btn-info btn-lg btn-small" id="simpan" name="simpan">
                           
                        </div>
                    </div>
    

    </div>
    <div class="right">
    
 
				<div class="panel panel-info" style="padding-top:20">
                        <div class="panel-heading" style=" text-align:center">
                            Daftar Bank Soal  : 
                        </div>
                        <div class="panel-body">
                          <?php include "database_soal.php"; ?> <div id="tampilkan"></div>  
                        <!-- Upload Button, use any id you wish-->
                        </div>
               			<div class="panel-footer" style=" text-align:center">Klik Picture untuk Ganti Logo</div>
               
                </div>   
    
    				
    
    
	</div>
</div>    

</div>                 
</body>
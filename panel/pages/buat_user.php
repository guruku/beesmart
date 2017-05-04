<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<?php
include "../../config/server.php";
if(isset($_REQUEST['aksion'])&&$_REQUEST['aksion']=="hapus"){
	$sqlhapus = mysql_query("delete from  cbt_user where Urut = '$_REQUEST[urut]'");
}
?>  
<html>
  <head>
    <title>CBT BeeSMART | UJIAN ONLINE</title>
</head>
  <body>

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
@media screen and (max-width: 800px) {
    .left, 
    .right {
        float: none;
        width: auto;
		margin-top:10px;		
    }
	
}

.switch-field {
  font-family: "Lucida Grande", Tahoma, Verdana, sans-serif;
	overflow: hidden;
}

.switch-title {
  margin-bottom: 6px;
}

.switch-field input {
  display: none;
}

.switch-field label {
  float: left;
}

.switch-field label {
  display: inline-block;
  width: 60px;
  background-color: #e4e4e4;
  color: rgba(0, 0, 0, 0.6);
  font-size: 14px;
  font-weight: normal;
  text-align: center;
  text-shadow: none;
  padding: 6px 14px;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
  -webkit-transition: all 0.1s ease-in-out;
  -moz-transition:    all 0.1s ease-in-out;
  -ms-transition:     all 0.1s ease-in-out;
  -o-transition:      all 0.1s ease-in-out;
  transition:         all 0.1s ease-in-out;
}

.switch-field label:hover {
	cursor: pointer;
}

.switch-field input:checked + label {
  background-color: #A5DC86;
  -webkit-box-shadow: none;
  box-shadow: none;
}

.switch-field label:first-of-type {
  border-radius: 4px 0 0 4px;
}

.switch-field label:last-of-type {
  border-radius: 0 4px 4px 0;
}
#ingat{width:84%; height:90px; background-color:#FBECF0; border:0; border-left:thick #FF0000 solid; padding-left:10; padding-top:15}

</style>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="jquery-1.4.js"></script>
<script>    
$(document).ready(function(){

	var loading = $("#loading");
	var tampilkan = $("#tampilkan1");
 	var idstu = $("#idstu").val();
	function tampildata(){
	tampilkan.hide();
	loading.fadeIn();
	
	$.ajax({
    type:"POST",
    url:"database_user_tampil.php",  
	data:"aksi=tampil&idstu=" + idstu,  
	success: function(data){ 
		loading.fadeOut();
		tampilkan.html(data);
		tampilkan.fadeIn(100);
	   }
    }); 
	}// akhir fungsi tampildata
	tampildata();

$("#simpan").click(function(){
 var txt_nama = $("#txt_nama").val();
 var txt_user = $("#txt_user").val();
 var txt_pass = $("#txt_pass").val();
 var txt_nik = $("#txt_nik").val();
 var txt_hp = $("#txt_hp").val();
 var txt_email = $("#txt_email").val();  
 var txt_role = $("#role").val();

  
 $.ajax({
     type:"POST",
     url:"database_user_simpan.php",    
     data: "aksi=simpan&txt_nama=" + txt_nama + "&txt_user=" + txt_user + "&txt_pass=" + txt_pass + "&txt_nik=" + txt_nik + "&txt_hp=" + txt_hp + "&txt_email=" + txt_email + "&txt_role=" + txt_role,
	 success: function(data){
 alert(txt_role);
		loading.fadeOut();
		tampilkan.html(data);
		tampilkan.fadeIn(100);
	 tampildata();
	 }
	 });
	 });

});
</script>
<div id="mainbody" >
<br />

<div class="group">
    <div class="left">

                
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            Tambah User 
                        </div>
                        <div class="panel-body">

<style type="text/css">
    .formLayout
    {
        background-color: #fff;
        padding: 10px;
        width: 100%;
    }
    
    .formLayout label
    {
        display: block;
        width: 120px;
        float: left;
        margin-bottom: 10px;
		font-style:normal;
		font-weight:normal;
        text-align: left;
        padding-right: 20px;
        }
 

  .formLayout input
    {
        display: block;
        width: 100%;
        float: left;
        margin-bottom: 10px;
		font-style:normal;
		font-weight:normal;
    }
 
    br
    {
        clear: left;
    }
    </style>
<div class="formLayout">
        <label>Role</label>
        <select id="role">
            <option value="admin">Admin</option>
            <option value="guru">Guru</option>
        </select><br>
        <label>Nama </label>
        <input id="txt_nama" name="txt_nama" style="size:200px"><br>
        <label>Username</label>
        <input id="txt_user" name="txt_user"><br>
        <label>Password</label>
        <input id="txt_pass" name="txt_pass"><br>
        <label>NIK</label>
        <input id="txt_nik" name="txt_nik"><br>
        <label>HP</label>
        <input id="txt_hp" name="txt_hp"><br>
        <label>Email</label>
        <input id="txt_email" name="txt_email"><br>
    </div>
                          
                        </div>

                        <div class="panel-footer">
                            <input type="submit"  class="btn btn-info btn-lg btn-small" id="simpan" value="Simpan" name="simpan">
                           
                        </div>
                    </div>
    

    </div>
    <div class="right">
    
 
				<div class="panel panel-info" style="padding-top:20">
                        <div class="panel-heading" style=" text-align:center">
                            <table width="100%"><tr><td>Daftar User terdaftar </td><td align="right">
                                        </td></tr>
                            </table>
                        </div>
                        <div class="panel-body">
                                <div id="tampilkan1"></div>          

                        <!-- Upload Button, use any id you wish-->
                        </div>
               			<div class="panel-footer" style=" text-align:left">Note : - </div>
               
                </div>   
    
    				
    
    
	</div>
</div>    

</div>  



  </body>
</html>

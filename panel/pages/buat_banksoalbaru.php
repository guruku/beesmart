<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
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
@media screen and (max-width: 480px) {
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
<script>    
$(document).ready(function(){
document.getElementById("ndelik").style.display = "none";
	var loading = $("#loading");
	var tampilkan = $("#tampilkan1");
 	var idstu = $("#idstu").val();
	function tampildata(){
	tampilkan.hide();
	loading.fadeIn();
	
	$.ajax({
    type:"POST",
    url:"database_soal_tampil.php",  
	data:"aksi=tampil&idstu=" + idstu,  
	success: function(data){ 
		loading.fadeOut();
		tampilkan.html(data);
		tampilkan.fadeIn(100);
	   }
    }); 
	}// akhir fungsi tampildata
	tampildata();


$("#baru").click(function(){
 var txt_ujian = $("#txt_ujian").val();
 var txt_jawab = $("#txt_jawabz").val();
 var txt_kelas = $("#txt_kelasz").val();
 var txt_jurusan = $("#txt_jurusanz").val();
 var txt_soal = $("#txt_soalz").val();  
 var txt_mapel = $("#txt_mapelz").val();
 var txt_level = $("#txt_levelz").val(); 
 var txt_nama = $("#txt_namaz").val();  
 var txt_jumsoal1 = $("#txt_jumsoalz1").val();  
 var txt_jumsoal2 = $("#txt_jumsoalz2").val(); 
 var txt_bobotsoal1 = $("#txt_bobotsoalz1").val();  
 var txt_bobotsoal2 = $("#txt_bobotsoalz2").val();   
 var txt_soal = $("#txt_soalz").val(); 
 var txt_sesi = $("#txt_sesiz").val();  


var n = txt_nama.includes(" ");
if(n==true){
alert("Kode Bank Soal mengandung Spasi");
return false;
}

if(txt_nama==""){
alert("Isikan Kode Bank Soal");
return false;
}

if(txt_kelas=="Pilih Kelas"){
alert("Belum Pilih Kelas ");
return false;
}
 
//alert(txt_mapel);   
 $.ajax({
     type:"POST",
     url:"database_soal_simpan.php",    
     data: "aksi=simpan&txt_ujian=" + txt_ujian + "&txt_jawab=" + txt_jawab + "&txt_kelas=" + txt_kelas + "&txt_jurusan=" + txt_jurusan + 
	 "&txt_soal=" + txt_soal + "&txt_level=" + txt_level + "&txt_mapel=" + txt_mapel + "&txt_nama=" + txt_nama + "&txt_jumsoal1=" + txt_jumsoal1  + "&txt_jumsoal2=" + 
	 txt_jumsoal2 + "&txt_soal=" + txt_soal + "&txt_sesi=" + txt_sesi + "&txt_bobotsoal1=" + txt_bobotsoal1  + "&txt_bobotsoal2=" + txt_bobotsoal2 ,
	 success: function(data){
	 document.getElementById("ndelik").style.display = "block";
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

 							<div class="alert alert-success alert-dismissable" id="ndelik">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Simpan Data Sukses.
                            </div>
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            Tambah Bank Soal 
                        </div>
                        <div class="panel-body">
                            <table width="100%">
                            <tr height="32px"><td width="40%">Nama Bank Soal&nbsp;</td><td>: <input type="text" id="txt_namaz"/></td></tr>
                            <tr height="32px"><td>Mata Pelajaran&nbsp;</td><td>: 
                            
                            	<select name="txt_mapelz" id="txt_mapelz">
                                <?php 
                                $sqlkelas = mysql_query("select * from cbt_mapel order by XNamaMapel");
                                while($sk = mysql_fetch_array($sqlkelas)){
                                echo "<option value='$sk[XKodeMapel]'>$sk[XKodeMapel] $sk[XNamaMapel]</option>";
                                }
                                ?>
                                </select>
                        <?php 
                         //$sqladmin = mysql_query("select * from cbt_admin a left join cbt_kelas k on k.XLevelKelas = a.XTingkat");
						 $sqladmin = mysql_query("select * from cbt_admin");
                         $sa = mysql_fetch_array($sqladmin);
						 $skul = $sa['XTingkat'];
						 ?>

                            
                            
                            </td></tr>      
                                                  
                            <tr height="32px"><td>Tingkat Sekolah&nbsp;</td><td>: 
                            <select id="txt_levelz">
                            <option value="PG" <?php if($skul=='PG'){echo "selected";} ?>>TK</option>
                            <option value="TK" <?php if($skul=='TK'){echo "selected";} ?>>TK</option>                            
                            <option value="SD" <?php if($skul=='SD'){echo "selected";} ?>>SD</option>
                            <option value="MI" <?php if($skul=='MI'){echo "selected";} ?>>MI</option>                            
                            <option value="SMP" <?php if($skul=='SMP'){echo "selected";} ?>>SMP</option>
                            <option value="MTs" <?php if($skul=='MTs'){echo "selected";} ?>>MTs</option>                            
                            <option value="SMU" <?php if($skul=='SMU'){echo "selected";} ?>>SMU</option>
                            <option value="MA" <?php if($skul=='MA'){echo "selected";} ?>>MA</option>                            
                            <option value="SMK" <?php if($skul=='SMK'){echo "selected";} ?>>SMK</option>                            
							</select>
                            </td></tr>
                           
                            </td></tr>
                            <tr height="32px"><td width="40%">Jurusan&nbsp;</td><td>: 
                            							<select id="txt_jurusanz">
                             <?php 
							 $sqljur = mysql_query("select * from cbt_kelas group by XKodeJurusan");
							 echo "<option value='ALL' selected>SEMUA</option>";
							 while($j = mysql_fetch_array($sqljur)){
                             echo "<option value='$j[XKodeJurusan]'>$j[XKodeJurusan]</option>";
							 }
							 ?>
                             </select>

                            
                            </td></tr>

                            <tr height="32px"><td width="40%">Kelas&nbsp;</td><td>: 
							<select id="txt_kelasz">
                            <option selected>Pilih Kelas</option>
                             <?php 
							 $sqlkelas = mysql_query("select * from cbt_kelas group by XKodeKelas");
							 echo "<option value='ALL' selected>SEMUA</option>";
							 while($k = mysql_fetch_array($sqlkelas)){
                             echo "<option value='$k[XKodeKelas]'>$k[XKodeKelas]</option>";
							 }
							 ?>
                             </select>


                            <tr height="32px"><td width="40%">Opsi Pilihan Jawaban&nbsp;</td><td>: <input size="2" type="text" id="txt_jawabz"/> * Default 5 Pilihan
                            </td></tr>
                            <tr height="32px"><td width="40%">Pilihan Ganda &nbsp;</td><td>: 
                            <input size="2" type="text" id="txt_jumsoalz1"/>  * Jml Ditampilkan
                            </td></tr>                            
                            <tr height="32px"><td width="40%">Bobot Pilihan &nbsp;</td><td>: 
                            <input size="2" type="text" id="txt_bobotsoalz1"/>  * %
                            </td></tr>                            

                            <tr height="32px"><td width="40%">Essai &nbsp;</td><td>: 
                            <input size="2" type="text" id="txt_jumsoalz2"/>  * Jml Ditampilkan
                            </td></tr>                            
                            <tr height="32px"><td width="40%">Bobot Essai &nbsp;</td><td>: 
                            <input size="2" type="text" id="txt_bobotsoalz2"/>  * %
                            </td></tr>                            

                            </table>
                        </div>

                        <div class="panel-footer">
                            <input type="submit"  class="btn btn-info btn-lg btn-small" id="baru" value="Buat" name="baru">
                           
                        </div>
                    </div>
   

</div>    
  </body>
</html>

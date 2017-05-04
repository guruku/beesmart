<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
 <script type="text/javascript" src="jquery-1.4.js"></script>
 <script>    
$(document).ready(function(){
 $("#simpan2").click(function(){
 //alert("hai");
 var nompes = $("#nompes").val();
 //alert(nompes);
 $.ajax({
     type:"POST",
     url:"resetlogin.php",    
     data: "aksi=simpan&nompes=" + nompes,
	 success: function(data){
	 $("#info").html(data);
	 tampildata2();
	 }
	 });
	 });

 $("#kunci").click(function(){
 //alert("hai");
 var nompes = $("#nompes").val();
 //alert(nompes);
 $.ajax({
     type:"POST",
     url:"kuncilogin.php",    
     data: "aksi=simpan&nompes=" + nompes,
	 success: function(data){
	 $("#info").html(data);
	 tampildata2();
	 }
	 });
	 });

});
</script>
							<table class="table table-bordered" cellpadding="30px" width="100%" border="0">
								<tr  style="color:#FFFFFF; font-style:normal; font-weight:normal; text-align:center" height="40px" bgcolor="#000">
                                    <th style="color:#FFFFFF; font-style:normal; font-weight:normal; text-align:center">&nbsp;No.</th>
                                    <th style="color:#FFFFFF; font-style:normal; font-weight:normal; text-align:center">Nomer Peserta</th>
                                    <th style="color:#FFFFFF; font-style:normal; font-weight:normal; text-align:center">Nama Siswa</th>
                                    <th style="color:#FFFFFF; font-style:normal; font-weight:normal; text-align:center">Kelas</th>
                                    <th style="color:#FFFFFF; font-style:normal; font-weight:normal; text-align:center">Jurusan</th>
                                    <th style="color:#FFFFFF; font-style:normal; font-weight:normal; text-align:center">NIS</th>
                                    <th style="color:#FFFFFF; font-style:normal; font-weight:normal; text-align:center">Status Tes Peserta</th>
                                </tr>

 <?php 
 //include "cbt_con.php";
include "../../config/server.php"; 
$sql = mysql_query("SELECT *,u.XStatusUjian as ujsta
FROM cbt_siswa s
LEFT JOIN `cbt_siswa_ujian` u ON u.XNomerUjian = s.XNomerUjian
LEFT JOIN cbt_ujian c ON (u.XKodeSoal = c.XKodeSoal and u.XTokenUjian = c.XTokenUjian)
WHERE c.XStatusUjian = '1'"); 
$nom = 1;								
while($s= mysql_fetch_array($sql)){ 
$nama = str_replace("  ","",$s['XNamaSiswa']); 
$nouji = str_replace("  ","",$s['XNomerUjian']); 
$kodekelas = str_replace("  ","",$s['XKodeKelas']); 
$kodeNIK = str_replace("  ","",$s['XNIK']); 
$staujian = str_replace("  ","",$s['ujsta']); 
if($staujian =='0'){$staujian = "Belum Login";}
elseif($staujian =='1'){$staujian = "Sedang Dikerjakan";}
elseif($staujian =='9'){$staujian = "Tes SELESAI";}
?>
                                <tr height="40px">
                                    <td width="5%">&nbsp;<?php echo $nom ; ?></td>
                                    <td width="15%"><?php echo $nouji; ?></td>
                                    <td width="30%"><?php echo $nama; ?></td>
                                    <td width="10%"><?php echo $kodekelas; ?></td>
                                    <td width="10%"><?php echo $kodeNIK; ?></td>
                                    <td width="20%"><input type="hidden" id="nompes" value="<?php echo $nouji; ?>">
                                    <button type="submit" class="btn btn-success btn-small" id="simpan2" data-dismiss="modal">Reset</button>
                                    <button type="submit" class="btn btn-danger btn-small" id="kunci" data-dismiss="modal">Logout</button>
                                    </td>
                                </tr>
                                
                                <?php $nom++; } ?>
                                </table>
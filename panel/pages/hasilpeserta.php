 <script type="text/javascript" src="jquery-1.4.js"></script>
 <script>    
$(document).ready(function(){
 $("#simpan").click(function(){
 //alert("hai");
 var nompes = $("#nompes").val();
 //alert(nompes);
 $.ajax({
     type:"POST",
     url:"resetlogin.php",    
     data: "aksi=simpan&nompes=" + nompes,
	 success: function(data){
	 $("#info").html(data);
	 tampildata();
	 }
	 });
	 });

});
</script>
<br>
<table class="table table-bordered" cellpadding="30px" width="100%" border="0">
								<tr height="50px" bgcolor="#E4E6DD">
                                    <th>&nbsp;No.</th>
                                    <th>Nomer Peserta</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas - NIS</th>
                                    <th>Jawab</th>
                                    <th>Benar</th>
                                    <th>Token</th>                                    
                                    <th>Analisa</th>                                    
                                </tr> <?php include "../../config/server.php";
$sqltoken = mysql_query("SELECT * FROM cbt_ujian where XStatusUjian = '1'");
$t = mysql_fetch_array($sqltoken);
$tokenujian = $t['XTokenUjian'];


$sql = mysql_query("SELECT *,u.XStatusUjian as ujsta,c.XTokenUjian as tokenz,u.XNomerUjian as noujian
FROM cbt_siswa s
LEFT JOIN `cbt_siswa_ujian` u ON u.XNomerUjian = s.XNomerUjian
LEFT JOIN cbt_ujian c ON (u.XKodeSoal = c.XKodeSoal and u.XTokenUjian = c.XTokenUjian)
WHERE c.XStatusUjian = '1' and u.XTokenUjian = '$tokenujian' and c.XTokenUjian = '$tokenujian'"); 
$nom = 1;								
while($s= mysql_fetch_array($sql)){ 
$nama = str_replace("  ","",$s['XNamaSiswa']); 
$nouji = str_replace("  ","",$s['noujian']); 
$kodekelas = str_replace("  ","",$s['XKodeKelas']); 
$kodeNIK = str_replace("  ","",$s['XNIK']); 
$staujian = str_replace("  ","",$s['ujsta']);
$token = str_replace("  ","",$s['tokenz']);
$soaluji = str_replace("  ","",$s['XKodeSoal']); 
if($staujian =='0'){$staujian = "Belum Login";}
elseif($staujian =='1'){$staujian = "Sedang Dikerjakan";}
elseif($staujian =='9'){$staujian = "Tes SELESAI";}
	$sqldijawab = mysql_num_rows(mysql_query(" SELECT * FROM `cbt_jawaban` WHERE XTokenUjian = '$tokenujian' and XJawaban != '' and XUserJawab = '$nouji'"));
	$sqljawaban = mysql_query(" SELECT count( XNilai ) AS HasilUjian FROM `cbt_jawaban` WHERE XNilai = '1' and XTokenUjian = '$tokenujian' and XUserJawab = '$nouji'");
	$sqj = mysql_fetch_array($sqljawaban);
	$jumbenar = $sqj['HasilUjian'];
?>
                                <tr height="40px">
                                    <td width="5%">&nbsp;<?php echo $nom ; ?></td>
                                    <td width="15%"><?php echo $nouji; ?></td>
                                    <td width="40%"><?php echo $nama; ?></td>
                                    <td width="15%"><?php echo "$kodekelas - $kodeNIK"; ?></td>
                                    <td width="5%"><?php echo $sqldijawab; ?></td>
                                    <td width="5%"><?php echo $jumbenar; ?></td>
                                    <td width="5%"><?php echo $token; ?></td>
                                    <td width="5%" align="center"><a href="?modul=jawabansiswa&nomer=<?php echo $nouji; ?>&ujian=<?php echo "$soaluji"; ?>" ><img src="images/printer.png"/></a></td>
                                    </td>
                                </tr> <?php $nom++; } ?>
                                </table>
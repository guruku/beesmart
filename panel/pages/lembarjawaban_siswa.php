<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript" src="jquery.gdocsviewer.min.js"></script> 

<script type="text/javascript"> 
/*<![CDATA[*/
$(document).ready(function() {
	$('a.embed').gdocsViewer({width: 600, height: 750});
	$('#embedURL').gdocsViewer();
});
/*]]>*/
</script> 
    <link href="css/nedna.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script type="text/javascript"
  src="../../MathJax/MathJax.js?config=AM_HTMLorMML-full"></script>

<!-- script untuk refresh/reload mathjax setiap content baru !-->
   <script>
  MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
</script>
<!-- script untuk refresh/reload mathjax setiap content baru !-->
<iframe src="<?php echo "print_jawaban.php?soal=$_REQUEST[soal]&siswa=$_REQUEST[siswa]"; ?>" style="display:none;" name="frame"></iframe>
<button type="button" class="btn btn-default btn-sm" onClick="frames['frame'].print()" style="margin-top:10px; margin-bottom:5px"><i class="glyphicon glyphicon-print"></i> Cetak 
</button>

<body style="width:90%; margin:0 auto;margin-top:50px; ">

<br />
<?php
include "../../config/server.php";

$var_soal = "$_REQUEST[soal]";
$var_siswa = "$_REQUEST[siswa]";

//Soal Pilihan Ganda
$sqlsoal = mysql_num_rows(mysql_query("select * from cbt_soal where XKodeSoal = '$var_soal' and XJenisSoal = '1'")); 
$sqltampil = mysql_query("select * from cbt_ujian where XKodeSoal = '$var_soal'"); 
$t1 = mysql_fetch_array($sqltampil);
//$t = $t1['XJumSoal'];
$t = $t1['XPilGanda'];

$sqlbenar = mysql_query("select * from cbt_nilai where XKodeSoal = '$var_soal' and XNomerUjian = '$var_siswa'"); 
$b1 = mysql_fetch_array($sqlbenar);
$b = $b1['XBenar'];

/*
if($t > $sqlsoal){$jumsoal = $sqlsoal;} else {$jumsoal = $t;}
$nilai = ($b/$jumsoal)*100;
$nilaine = number_format($nilai, 2, ',', '.');
*/
if($t > $sqlsoal){$jumsoal = $sqlsoal;} else {$jumsoal = $t;}
$nilai = ($b/$jumsoal)*100;
$nilaine = number_format($nilai, 2, ',', '.');


$sqlujian = mysql_query("select * from cbt_ujian c left join cbt_mapel m on m.XKodeMapel = c.XKodeMapel where c.XKodeSoal = '$var_soal'"); 
$u = mysql_fetch_array($sqlujian);
$namamapel = $u['XNamaMapel'];
$xtokenujian = $u['XTokenUjian'];

$nom = 1;			
$betul = 0;					

$sqlsiswa = mysql_query("SELECT * FROM `cbt_siswa` s left join cbt_kelas k on k.XKodeKelas = s.XKodeKelas WHERE XNomerUjian= '$var_siswa'");
$s = mysql_fetch_array($sqlsiswa);
$namsis = $s['XNamaSiswa'];
$namkel = $s['XNamaKelas'];
$nomsis = $s['XNIK'];
$namjur = $s['XKodeJurusan'];
$fotsis = $s['XFoto'];
if(str_replace(" ","",$fotsis)==""){
$foto = "nouser.png";} else { $foto = "$fotsis";}

?>
<input type="hidden" id="soale" name="soale" value="<?php echo "$_REQUEST[soal]"; ?>" />
<input type="hidden" id="siswae" name="siswae" value="<?php echo "$_REQUEST[siswa]"; ?>" />
<input type="hidden" id="tokene" name="tokene" value="<?php echo "$xtokenujian"; ?>" />
 <div class="panel panel-default">
                              <div class="panel-heading">
                               <h3 class="panel-title">Data Peserta Ujian : </h3>
                              </div>
                              <div class="panel-body">
                              	<table border="0" width="100%">                              
                                 <tr>
  <td rowspan="5" width="150px"><img src="../../fotosiswa/<?php echo $foto; ?>" width="60%" /></td></td>
	<td width="20%">Nomer Ujian </td><td width="50%">: <?php echo "$var_siswa [$xtokenujian]"; ?></td>
    <td rowspan="5" valign="top" align="center">Skor <br /><br /><font size="+4"><?php echo "$nilaine"; ?></font></td>
  </tr>
                                	<tr><td>Nomer Induk (NIS)</td><td>: <?php echo $nomsis; ?></td></tr>
                                	<tr><td>Nama Lengkap </td><td>: <?php echo $namsis; ?></td></tr>
                                	<tr><td>Kelas | Jurusan </td><td>: <?php echo "$namkel | $namjur "; ?></td></tr>
                                	<tr><td>Mata Pelajaran</td><td>: <?php echo $namamapel; ?></td></tr>
                                </table>    
                              </div>
</div>

<link href="../dist/skin/blue.monday/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../lib/jquery.min.js"></script>
<script type="text/javascript" src="../dist/jplayer/jquery.jplayer.min.js"></script>

 <div class="panel panel-default">
                              <div class="panel-heading">
                                <table><tr><td><h3 class="panel-title">Hasil CBT Online Siswa : Soal Pilihan Ganda &nbsp;</h3></td>
                                <td>
                               
                                </td></tr>
                                </table>
                              </div>

                              <div class="panel-body">
<table>
<?php
$nomer = 1;
$sql = mysql_query("
SELECT * FROM `cbt_jawaban` j left join cbt_soal s on s.XNomerSoal = j.XNomerSoal 
left join cbt_ujian u on u.XKodeSoal = s.XKodeSoal
WHERE j.XKodeSoal = '$var_soal' and  s.XKodeSoal = '$var_soal' and  j.XUserJawab = '$var_siswa' 
and j.XJenisSoal = '1' and j.XTokenUjian = '$xtokenujian' order by j.Urut");

while($r = mysql_fetch_array($sql)){
$jumpil = $r['XJumPilihan'];

echo "<tr><td width=50px>$nomer.</td><td>$r[XTanya] </td></tr>
<tr><td width=50px colspan=2>&nbsp;</td></tr>
";

?>


<?php
if(str_replace("  ","",$r['XGambarTanya']!=="")){
echo "
<tr><td width=50px colspan=2>&nbsp; </td></tr>
<tr><td colspan=2><img src=../../pictures/$r[XGambarTanya] width=50%></td></tr>";}

echo "<tr><td width=50px colspan=2>&nbsp;</td></tr>";

$PilA = $r['XA'];
$PilJwb = "XJawab$PilA";
echo "<tr><td width=50px align=center> A. </td>"; 
	$sqlpil = mysql_query("SELECT $PilJwb as pilsoal FROM `cbt_soal` WHERE XKodeSoal = '$var_soal' and XNomerSoal = '$r[XNomerSoal]'");
	$jwb = mysql_fetch_array($sqlpil);
	$jawab = $jwb['pilsoal'];
echo "<td>$jawab</td></tr>";	
$PilB = $r['XB'];
$PilJwb = "XJawab$PilB";
echo "<tr><td width=50px align=center> B. </td>"; 
	$sqlpil = mysql_query("SELECT $PilJwb as pilsoal FROM `cbt_soal` WHERE XKodeSoal = '$var_soal' and XNomerSoal = '$r[XNomerSoal]'");
	$jwb = mysql_fetch_array($sqlpil);
	$jawab = $jwb['pilsoal'];
echo "<td>$jawab</td></tr>";	

	$PilC = $r['XC'];
	$PilJwb = "XJawab$PilC";
	echo "<tr><td width=50px align=center> C. </td>"; 
		$sqlpil = mysql_query("SELECT $PilJwb as pilsoal FROM `cbt_soal` WHERE XKodeSoal = '$var_soal' and XNomerSoal = '$r[XNomerSoal]'");
		$jwb = mysql_fetch_array($sqlpil);
		$jawab = $jwb['pilsoal'];
	echo "<td>$jawab</td></tr>";	


	$PilD = $r['XD'];
	$PilJwb = "XJawab$PilD";
	echo "<tr><td width=50px align=center> D. </td>"; 
		$sqlpil = mysql_query("SELECT $PilJwb as pilsoal FROM `cbt_soal` WHERE XKodeSoal = '$var_soal' and XNomerSoal = '$r[XNomerSoal]'");
		$jwb = mysql_fetch_array($sqlpil);
		$jawab = $jwb['pilsoal'];
	echo "<td>$jawab</td></tr>";

	if($jumpil ==5){	
	$PilE = $r['XE'];
	$PilJwb = "XJawab$PilE";
	echo "<tr><td width=50px align=center> E. </td>"; 
		$sqlpil = mysql_query("SELECT $PilJwb as pilsoal FROM `cbt_soal` WHERE XKodeSoal = '$var_soal' and XNomerSoal = '$r[XNomerSoal]'");
		$jwb = mysql_fetch_array($sqlpil);
		$jawab = $jwb['pilsoal'];
	echo "<td>$jawab</td></tr>";
	}


	if($r['XKunciJawaban']==$r['XA']){$jwbsiswa = "A";}
	elseif($r['XKunciJawaban']==$r['XB']){$jwbsiswa = "B";}	
	elseif($r['XKunciJawaban']==$r['XC']){$jwbsiswa = "C";}
	elseif($r['XKunciJawaban']==$r['XD']){$jwbsiswa = "D";}	
	elseif($r['XKunciJawaban']==$r['XE']){$jwbsiswa = "E";}
	else{$jwbsiswa = "S";}
	
	if($jwbsiswa==$r['XJawaban']){$ikon = "images/benar.gif"; $betul++;}else{$ikon = "images/salah.gif";}
echo "<tr><td colspan=2><br>Kunci Jawaban : $jwbsiswa, Jawaban Siswa : $r[XJawaban]&nbsp; &nbsp;  <img src=$ikon width=30px></td></tr>";	
echo "<tr><td colspan=2><hr></td></tr>";


$nomer++;


}
?>    </div>
    </div>
</table>                              
	</div>                           
    </div>


<div class="panel panel-default">
                              <div class="panel-heading">
                                <table><tr><td><h3 class="panel-title">Hasil CBT Online Siswa : Soal Essai &nbsp;</h3></td>
                                <td>
                               
                                </td></tr>
                                </table>
                              </div>

                              <div class="panel-body">
<table>
<?php
$nomer = 1;
$sql = mysql_query("
SELECT * FROM `cbt_jawaban` j left join cbt_soal s on s.XNomerSoal = j.XNomerSoal 
left join cbt_ujian u on u.XKodeSoal = s.XKodeSoal
WHERE j.XKodeSoal = '$var_soal' and  s.XKodeSoal = '$var_soal' and  j.XUserJawab = '$var_siswa' 
and j.XJenisSoal = '2' and j.XTokenUjian = '$xtokenujian' order by j.Urut");

while($r = mysql_fetch_array($sql)){
$jumpil = $r['XJumPilihan'];
$nosoal = $r['XNomerSoal'];
$nil = $r['XNilaiEsai'];

echo "<tr><td width=50px>$nomer.</td><td>$r[XTanya] </td></tr>
<tr><td width=50px colspan=2>&nbsp;</td></tr>
";

?>

<?php
if(str_replace("  ","",$r['XGambarTanya']!=="")){
echo "
<tr><td width=30px colspan=2>&nbsp; </td></tr>
<tr><td colspan=2><img src=../../pictures/$r[XGambarTanya] width=150px></td></tr>";}
echo "<tr><td width=50px colspan=2>&nbsp;</td></tr>";

$jawab = $r['XJawabanEsai'];
echo "
<tr><td width=30px colspan=2><b>Jawaban : </b></td></tr>
<tr><td colspan=2>$jawab</td></tr>

<tr><td width=50px colspan=2>&nbsp;</td></tr>
<tr><td colspan=2><b>Entry Nilai</b></td></tr>
<tr><td colspan=2>";	
?>
<script>
$(document).ready(function(){
    $(".masuk<?php echo "$nosoal"; ?>").mouseleave(function(){
          //alert("keluar" + <?php echo "$nosoal"; ?>);	
		  		    var jawabe = $('#jawab<?php echo "$nosoal"; ?>').val();
                    var soale = $('#soale').val();	
                    var siswae = $('#siswae').val();							
                    var tokene = $('#tokene').val();							
                    var nomere = $('#nomere<?php echo "$nosoal"; ?>').val();							
										
			   		var data = 'jawabe=' + jawabe + '& soale=' + soale + '& siswae=' + siswae + '& tokene=' + tokene + '& nomere=' + nomere;
                    $.ajax({
                        type: 'POST',
                        url: "simpan_nilai_esai.php",
                        data: data,
                        success: function() {
                            //$('#tampil').load("lihat.php");
                        }
                    });
    });
    
});
</script>
<input type="text" id="jawab<?php echo "$nosoal"; ?>" name="jawab<?php echo "$nosoal"; ?>" class="masuk<?php echo "$nosoal"; ?>" 
style="height:50px; width:60px; font-size:36px; padding-left:5px;color:#32689a" value="<?php echo "$nil"; ?>"/>
<input type="hidden" id="nomere<?php echo "$nosoal"; ?>" name="nomere<?php echo "$nosoal"; ?>" value="<?php echo "$nosoal"; ?>" />
<?php
echo "</td></tr><tr><td colspan=2><hr></td></tr>";



$nomer++;


}
?>    </div>
    </div>
</table>                              
	</div>                           
    </div>


</body>
</html>


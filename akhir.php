<?php include "config/server.php"; 
// ===============================
// Status Ujian XStatusUjian = 1 Aktif
// Status Ujian XStatusUjian = 0 BelumAktif
// Status Ujian XStatusUjian = 9 Selesai

if(isset($_COOKIE['PESERTA'])){
$user = $_COOKIE['PESERTA'];} else {
header('Location:login.php');}

$tgl = date("H:i:s");
$tgl2 = date("Y-m-d");
				
		$sqltoken = mysql_query("SELECT * FROM `cbt_siswa_ujian` s left join cbt_ujian u on u.XKodeSoal = s.XKodeSoal
		WHERE s.XNomerUjian = '$user' and s.XStatusUjian = '1'");
		$st = mysql_fetch_array($sqltoken);
		$xtokenujian = $st['XTokenUjian'];  
		
		
		
		$sqlgabung = mysql_query("
		SELECT * FROM `cbt_siswa_ujian` s LEFT JOIN cbt_jawaban j ON j.XUserJawab = s.XNomerUjian and j.XTokenUjian = s.XTokenUjian left join cbt_siswa s1 on s1.XNomerUjian =
		s.XNomerUjian WHERE s.XNomerUjian = '$user' and s.XStatusUjian = '1'");
		  
		//=======================
		  $s0 = mysql_fetch_array($sqlgabung);
		  $xkodesoal = $s0['XKodeSoal'];
		  $xtokenujian = $s0['XTokenUjian'];  
		  $xnomerujian = $s0['XNomerUjian'];  
		  $xnik = $s0['XNIK'];    
		  $xkodeujian = $s0['XKodeUjian'];
		  $xkodemapel = $s0['XKodeMapel'];
		  $xkodekelas = $s0['XKodeKelas'];  
		  $xkodejurusan = $s0['XKodeJurusan']; 		
		  $xsemester = $s0['XSemester']; 		  
		
		  $sqlsoal = mysql_query("SELECT * FROM cbt_ujian  WHERE XKodeSoal = '$xkodesoal'");
		  $sa = mysql_fetch_array($sqlsoal);
		  //$xkodeujian = $sa['XKodeUjian'];
		  $xjumsoal = $sa['XJumSoal'];
		  $xjumpil = $sa['XPilGanda']; 		     
		  
		  if($xjumsoal>0){

	$sqlnilai = mysql_query(" SELECT * FROM cbt_paketsoal WHERE XKodeSoal = '$xkodesoal'");
	$sqn = mysql_fetch_array($sqlnilai);
	$per_pil = $sqn['XPersenPil'];	
	$per_esai = $sqn['XPersenEsai'];	


		  
$xjumbenarz = mysql_query("select count(XNilai) as benar from cbt_jawaban where XUserJawab = '$user' and XJenisSoal = '1' and XKodeSoal = '$xkodesoal' and XTokenUjian = '$xtokenujian' and XNilai = '1'");
		  $r = mysql_fetch_array($xjumbenarz);
		  $xjumbenar = $r['benar'];
		  $xjumsalah = $xjumpil-$xjumbenar;
		  $nilaix = ($xjumbenar/$xjumpil)*100;
		  if(isset($_COOKIE['beetahun'])){$setAY =$_COOKIE['beetahun'];}else{$setAY = "2016/2017";}
		  
		  //cek apakah nilai untuk token ini sudah ada atau tidak 
		  $sqlceknilai= mysql_num_rows(mysql_query("select * from cbt_nilai where XNomerUjian = '$xnomerujian' and XKodeSoal = '$xkodesoal' and XTokenUjian = '$xtokenujian' 
		  and XSemester = '$xsemester' and XSetId = '$setAY' and XKodeMapel = '$xkodemapel' and XNIK = '$xnik'"));
		  
		  if($sqlceknilai>0){
		  $sqlmasuk = mysql_query("update cbt_nilai set XJumSoal='$xjumsoal',XBenar='$xjumbenar',XSalah='$xjumsalah',XNilai='$nilaix',XTotalNilai=,'$nilaix'
		  where XNomerUjian = '$xnomerujian' and XKodeSoal = '$xkodesoal' and XTokenUjian = '$xtokenujian' and XSemester = '$xsemester' and XSetId = '$setAY' 
		  and XKodeMapel = '$xkodemapel' and XNIK = '$xnik'");
		  } else {
		  $sqlmasuk = mysql_query("insert into cbt_nilai (
		  XKodeUjian,XTokenUjian,XTgl,XJumSoal,XBenar,XSalah,XNilai,XKodeMapel,XKodeKelas,XKodeSoal,XNomerUjian,XNIK,XSemester,XSetId,XPersenPil,XPersenEsai,XTotalNilai) 
		  values 
		  ('$xkodeujian','$xtokenujian','$tgl2','$xjumsoal','$xjumbenar','$xjumsalah','$nilaix','$xkodemapel','$xkodekelas','$xkodesoal','$xnomerujian','$xnik','$xsemester',
		  '$setAY','$per_pil','$per_esai','$nilaix')");
		  }
					
		  if(isset($xtokenujian)){
		  $sql = mysql_query("Update cbt_siswa_ujian set XStatusUjian = '9' where XNomerUjian = '$user' and XStatusUjian = '1'  and XTokenUjian = '$xtokenujian'");}
		  $sql = mysql_query("Update cbt_siswa_ujian set XStatusUjian = '9',XLastUpdate = '$tgl' where XNomerUjian = '$user' and XStatusUjian = '1'");

		  }
?>
<style>
.left {
    float: left;
    width: 70%;
}
.right {
    float: right;
    width: 30%;
	background-color: #333333;
			height:101px;	
		color:#FFFFFF;	
		font-size: 13px; font-style:normal; font-weight:normal;
}
.user {
		color:#FFFFFF;	
		font-size: 15px; font-style:normal; font-weight:bold;
		top:-20px;
}
.log {
		color:#3799c2;	
		font-size: 11px; font-style:normal; font-weight:bold;
		top:-20px;
}
.group:after {
    content:"";
    display: table;
    clear: both;
	
}
/*
img {
    max-width: 100%;
    height: auto;
}
*/

.visible{
    display: block !important;
}

.hidden{
    display: none !important;
}
.foto{height:80px;}	
.buntut{width:100%;bottom:0px; position:absolute;}	
@media screen and (max-width: 780px) { /* jika screen maks. 780 right turun */
/*    .left, */
    .left,
    .right {
        float: none;
        width: auto;
		margin-top:0px;
		height:101px;
		color:#FFFFFF;
		display:block;	
    }
.foto{height:80px;}	
.buntut{width:100%;bottom:0px; position:absolute;}		
}
@media screen and (max-width: 400px) { /* jika screen maks. 780 right turun */
/*    .left, */
    .left{width: auto;    height: 91px;}
    .right {
        float: none;
        width: auto;
		margin-top:0px;
		height:60px;
		color:#FFFFFF;
    }
.foto{height:60px;}	
.buntut{width:100%;bottom:0px; position:absolute;}	
}
</style>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php 
include "config/server.php";
$sql = mysql_query("select * from cbt_admin");
$r = mysql_fetch_array($sql);
?>
<body class="font-medium" style="background-color:#c9c9c9">
<header style="background-color:<?php echo "$r[XWarna]"; ?>">
<div class="group">
    <div class="left" style="background-color:<?php echo "$r[XWarna]"; ?>"><a href="http://tuwagapat.com"><img src="images/<?php echo "$r[XBanner]"; ?>" style=" margin-left:0px;"></a>
    </div>
    	<div class="right"><table width="100%" border="0" style="margin-top:10px">   
     					<tr><td rowspan="3" width="90px" align="center"><img src="images/avatar.gif" style=" margin-left:0px;" class="foto"></td>
						<td>Terima Kasih</td></tr>
                        <tr><td><span class="user">Siswa Peserta Ujian</span></td></tr>
                        <tr><td><span class="log"><a href="logout.php">Logout</a><span></td></tr>
						</table>
                        </div>
           
      	</div>
	</div> 
</div>         
</header>

     <link rel="stylesheet" href="css/bootstrap2.min.css">
     <link href="css/klien.css" rel="stylesheet">
<!--	<link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css"> !-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


<div class="main-content">
<div class="page-column">
   
<div  class="col-md-4 col-md-offset-4 login-wrapper" style="float:inherit">
<div class="panel panel-default" style="margin-top:0px">
            <div class="panel-heading" style="font-size:22px; font-weight:bold">
                Konfirmasi Tes
            </div>

            <div class="inner-content" style="height:280px">
            <div class="form-horizontal" style="margin-top:0px"><br>


						<div class="inner-content">
                            <div class="wysiwyg-content">
                                <p>
                                    Terimakasih telah berpartisipasi dalam tes ini.<br>
                                    Silahkan klik tombol LOGOUT untuk mengakhiri test.
                                </p>
                            </div>
                        </div>
						<div class="panel-footer">
                            <div class="row">
                                <div ><br /><a href="logout.php">
                                    <button type="submit" class="btn btn-success btn-block" data-dismiss="modal">LOGOUT</button>
                                </div>
                            </div>
                        </div>            

    

            </div>
            </div>
   </div>
   </div>
</div>
</div>

</body>

</html>
<?php
if(!isset($_COOKIE['PESERTA'])) {
header('Location:index.php');
} ?>
<?php 

include "config/server.php";
include "config/fungsi_jam.php";
$tglbuat = date("Y-m-d");	
	$xtgl1 = date("Y-m-d");
	$xjam1 = date("H:i:s");
	
  $user = $_COOKIE['PESERTA'];

  $sqluser = mysql_query("
  SELECT * , u.XKodeKelas AS kelaz, s.XKodeKelas AS kelasx, s.XKodeJurusan AS jurusx, u.XKodeSoal AS soalz, u.XKodeUjian AS ujianz,s.XSesi as sesiz,
  s.XSetId as setidx,u.XKodeMapel as mapelx,u.XSemester as semex FROM cbt_siswa s 
LEFT JOIN cbt_ujian u ON (s.XKodeKelas = u.XKodeKelas or u.XKodeKelas = 'ALL') 
and (s.XKodeJurusan = u.XKodeJurusan or u.XKodeJurusan = 'ALL')
LEFT JOIN cbt_mapel m on m.XKodeMapel = u.XKodeMapel WHERE s.XNomerUjian = 
  '$_COOKIE[PESERTA]' and u.XStatusUjian = '1'");


  $s = mysql_fetch_array($sqluser);
  $val_siswa = $s['XNamaSiswa'];
  $xsesi = $s['sesiz'];
  $xkodesoal = $s['soalz'];
  $xkodemapel = $s['mapelx'];
  $xsemester = $s['semex'];  
  $xkodekelas = $s['kelaz'];
  $xkodekelasx = $s['kelasx'];
  $xkodejurusx = $s['jurusx']; 
  $xkodeujianx = $s['ujianz']; 
  $xsetidx = $s['setidx'];    
  $xjumlahsoal = $s['XJumSoal'];
  $xtokenujian = $s['XTokenUjian'];  
  $xbatasmasuk= $s['XBatasMasuk'];   
  $xnamamapel = $s['XNamaMapel'];
  $xjamujian = $s['XJamUjian']; 
  $xjumpilg = $s['XPilGanda'];   
  $xjumesai = $s['XEsai'];     
  $xacaksoal = $s['XAcakSoal'];  
  $xjumlahpilihan = $s['XJumPilihan'];
  $xtglujian = $s['XTglUjian'];
  $xmaxlambat = $s['XLambat'];
  $xagama = $s['XAgama']; 
  $xmapelagama = $s['XMapelAgama'];  
    
  $xjumlahpilganda = $s['XPilGanda'];
  $xjumlahesai = $s['XEsai'];  

if($xtglujian <> $xtgl1){
header('Location:index.php');
} 

//********************* JIKA TERLAMBAT MASIH DIKASIH WAKTU YANG SAMA ***************
//                      DENGAN SISWA TDK TERLAMBAT , MAKA XLAMAUJIAN = XLAMA UJIAN 

  $xlamaujian= $s['XLamaUjian']; 
//**********************************************************************************

//********************* JIKA SISWA TERLAMBAT WAKTU ENGERJAAN LEBIH SEDIKIT DARI
//                      SISWA TDK TERLAMBAT , MAKA XLAMAUJIAN = XLAMAUJIAN - (XMULAIUJIAN - XJAMUJIAN)
$jm1 = substr($xjam1,0,2);
$mn1 = substr($xjam1,3,2);
$dt1 = substr($xjam1,6,2); // pecah xmulaiujian ambil dari jamsekarang

$jm2 = substr($xjamujian,0,2);
$mn2 = substr($xjamujian,3,2);
$dt2 = substr($xjamujian,6,2);// pecah xjamujian 

$tg1 = substr($xtgl1,8,2);
$bl1 = substr($xtgl1,5,2);
$th1 = substr($xtgl1,0,4);
//mktime(hour,minute,second,month,day,year,is_dst) 
$selstart = mktime($jm1,$mn1,$dt1,$bl1,$tg1,$th1); /// jam mulai ujian
$selend = mktime($jm2,$mn2,$dt2,$bl1,$tg1,$th1); /// jam terakhir di database
$diffsec =  $selstart-$selend;
$hr = (int) ($diffsec / 3600);
$mn = (int) (($diffsec % 3600) / 60);
$sc =  $diffsec - ($hr*3600 + $mn * 60); // Hasil pengurangan (XMULAIUJIAN - XJAMUJIAN)

$jm3 = substr($xlamaujian,0,2);
$mn3 = substr($xlamaujian,3,2);
$dt3 = substr($xlamaujian,6,2);// pecah xlamaujian 
$selstart2 = mktime($jm3,$mn3,$dt3,$bl1,$tg1,$th1); /// jam xlamaujian
$selend2 = mktime($hr,$mn,$sc,$bl1,$tg1,$th1); /// jam terakhir di database

$diffsec2 =  $selstart2-$selend2;
$hr2 = (int) ($diffsec2 / 3600);
$mn2 = (int) (($diffsec2 % 3600) / 60);
$sc2 =  $diffsec2 - ($hr2*3600 + $mn2 * 60); // Hasil pengurangan (XMULAIUJIAN - XJAMUJIAN)

if($hr2=="0"){$hr2="00";}
if($mn2=="0"){$mn2="00";}
if($sc2=="0"){$sc2="00";}

$hrz = strlen($hr2);
$mnz = strlen($mn2);

if($hrz<2){$hr2 = "0".$hr2;}else{$hr2=$hr2;}
if($mnz<2){$mn2 = "0".$mn2;}else{$mn2=$mn2;}

$sisawaktu = "$hr2:$mn2:$sc2";
//*********************************************************************************************
  
//cek data siswa ujian
$sqlceksiswa = mysql_query("select * from cbt_siswa_ujian where XNomerUjian = '$user' and XKodeSoal = '$xkodesoal' and XTokenUjian ='$xtokenujian' and XSesi ='$xsesi'"); 
$jumsqlceksiswa = mysql_num_rows($sqlceksiswa); 
$s2 = mysql_fetch_array($sqlceksiswa);

//cek status ujian jika status = 9 maka sudah selesai redirect ke logout
  $xstatusujian = $s2['XStatusUjian'];
  if($xstatusujian==9){
 // header('location:logout.php');
  }


//bandingkan jam sekarang dengan jam 	
//echo "";
if($jumsqlceksiswa<1){ // jika siswa belum pernah login 


		if($xjam1>$xbatasmasuk){
		$sqlout = mysql_query("Update cbt_siswa_ujian set XStatusUjian = '9' where XNomerUjian = '$user' and XStatusUjian = '1' and XTokenUjian ='$xtokenujian' and XSesi ='$xsesi'");
		// header('location:logout.php');
		} 
  
if($xmaxlambat==1){
//echo "Jam Mulai |$xjam1|";  
//******************* jika jam terlambat diperhitungkan 
$xlamaujian = $sisawaktu ;
} elseif($xmaxlambat==0) {
//******************* jika jam terlambat diperhitungkan 
$xlamaujian = $xlamaujian ;
}

  $xjumlahjam = $xlamaujian;
  $xjam = substr($xjumlahjam,0,2);
  $xmnt = substr($xjumlahjam,3,2);
  $xdtk = substr($xjumlahjam,6,2);
  
//  echo "$xjumlahjam  $xjam:$xmnt:$xdtk ";
$xtgl1 = "$xtgl1 $xjam1";


	$sqlinputsiswa = mysql_query("insert into cbt_siswa_ujian 
	(XNomerUjian, XKodeKelas, XKodeMapel,XKodeSoal,XJumSoal,XTglUjian,XJamUjian, XMulaiUjian, XLastUpdate, XLamaUjian,XTokenUjian,XStatusUjian,XSesi,XPilGanda,XEsai) values 
	('$user','$xkodekelasx','$xkodemapel','$xkodesoal','$xjumlahsoal','$xtgl1','$xjamujian','$xjam1',
	'$xjam1','$xlamaujian','$xtokenujian','1','$xsesi','$xjumpilg','$xjumesai')"); 


} else {
?>

 
<?php
$j1 = substr($s2['XMulaiUjian'],0,2);
$m1 = substr($s2['XMulaiUjian'],3,2);
$d1 = substr($s2['XMulaiUjian'],6,2);

$j2 = substr($s2['XLastUpdate'],0,2);
$m2 = substr($s2['XLastUpdate'],3,2);
$d2 = substr($s2['XLastUpdate'],6,2);

$sekarang = date("Y-m-d");
$tgls = substr($sekarang,8,2);
$blns = substr($sekarang,5,2);
$thns = substr($sekarang,0,4);
//mktime(hour,minute,second,month,day,year,is_dst) 
$start = mktime($j1,$m1,$d1,$blns,$tgls,$thns); /// jam mulai ujian
$end = mktime($j2,$m2,$d2,$blns,$tgls,$thns); /// jam terakhir di database

//ambil  waktu yang sdh dipakai = jam terakhir di database - jam mulai ujian
$diffSeconds =  $end-$start;
$hrs = (int) ($diffSeconds / 3600);
$mins = (int) (($diffSeconds % 3600) / 60);
$secs =  $diffSeconds - ($hrs *3600 + $mins * 60);

//=============  waktu yang sdh dipakai
//echo "$hrs $mins $secs |<br>$j1,$m1,$d1,$blns,$tgls,$thns <br>$j2,$m2,$d2,$blns,$tgls,$thns";//11:09
 
//*********************** Jam Timer = XLamaUjian - ($hrs $mins $secs)
$awal = mktime($hrs,$mins,$secs,$blns,$tgls,$thns); /// Waktu Yang sudah dipakai

//============= mengambil dan memecah XLamaUjian
$j3 = substr($s2['XLamaUjian'],0,2);
$m3 = substr($s2['XLamaUjian'],3,2);
$d3 = substr($s2['XLamaUjian'],6,2);

$akhir = mktime($j3,$m3,$d3,$blns,$tgls,$thns); /// XLamaUjian

//ambil  waktu yang sdh dipakai = jam terakhir di database - jam mulai ujian
$diffSeconds3 =  $akhir-$awal;
$hrs3 = (int) ($diffSeconds3 / 3600);
$mins3 = (int) (($diffSeconds3 % 3600) / 60);
$secs3 =  $diffSeconds3 - ($hrs3 *3600 + $mins3 * 60);
//echo "<br>==$hrs3:$mins3:$secs3" ;
 
//echo "$hrs:$mins:$secs" ;
//add time
	if(isset($xjam)){$jatahjam = $xjam;}
	if(isset($xmnt)){$jatahmnt = $xmnt;}
	if(isset($xjatahjam)&&isset($xjatahmnt)){$menit = $jatahmnt+($jatahjam*60);}
	if(isset($xmenit)){$timestamp = strtotime($s2['XMulaiUjian']) + $menit*60;}
	if(isset($timestamp)){
	$tjam = date('H', $timestamp);
	$tmnt = date('i', $timestamp);
	$tdtk = date('s', $timestamp); 
	}
//echo "$jatahjam";
//Nilai Akhir yang muncul di Timer Countdown

  $xjam = $hrs3;
  $xmnt = $mins3;
  $xdtk = $secs3;

}
?>
<?php include "modal.php"; ?>

<!DOCTYPE html>
<!-- <script type="text/javascript" src="js/jquery.js"></script> !-->
 <script src="js/jquery-scrolltofixed.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
		
		$(function(){//document ready event
   setTimeout(function(){
        $("#myModal").show();
   },3000);//set interval to 3 second
}); 
        // Dock the header to the top of the window when scrolled past the banner.
        // This is the default behavior.

        $('.header').scrollToFixed();
        // Dock the footer to the bottom of the page, but scroll up to reveal more
        // content if the page is scrolled far enough.

        $('.footer').scrollToFixed( {
            bottom: 0,
            limit: $('.footer').offset().top
        });


        // Dock each summary as it arrives just below the docked header, pushing the
        // previous summary up the page.

        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.header').outerHeight(true) + 10,
                limit: function() {
                    var limit = 0;
                    if (next) {
                        limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                    } else {
                        limit = $('.footer').offset().top - $(this).outerHeight(true) - 10;
                    }
                    return limit;
                },
                zIndex: 999
            });
        });
    });
</script>   

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>CBT BEESMART | UJIAN ONLINE</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<script>$("input").on("click", function(){
  if ( $(this).attr("type") === "radio" ) {
    $(this).parent().siblings().removeClass("isSelected");
  }
  $(this).parent().toggleClass("isSelected");
});</script>
    
<script type="text/javascript" src="js/sidein_menu.js"></script>
<style>
#awal{
	color:#FFF;
	font-family:Arial, Helvetica, sans-serif;
	line-height: 90%;
	margin:0px auto;
	margin-top:20px;
}
#ahir{
	color:#FFF;
	font-family:Arial, Helvetica, sans-serif;
	line-height: 120%;
	margin:0px auto;
	margin-top:10px;
}


#kaki{
	margin-top:-8px;
	margin-left:15px;
	margin-bottom:10px;
	margin-right:15px;
	background-color:#000;
	color:#fff;
	height:400px;	
	}			

#koplembarsoal{
	margin-top:15px;
	margin-left:15px;
	margin-bottom:15px;
	margin-right:15px;
	background-color:#fff;
	height:90px;
	font-size:24px;
	font-weight:bold;
}	
.title {
    font-size: 13pt;
    font-weight: bold;
	margin-left:20px;
	margin-top:-33px;
	top:-33px;	
}
.header {
    background-color: #fff;
    padding-top: 7px;
	padding-bottom:11px;
	margin-left:15px;
	margin-right:15px;
	margin-top:10px;
	margin-bottom:2px;
}
.header.scroll-to-fixed-fixed {
    color: red;
	margin-top:0px;
	border-bottom-style:solid;
	border-color:#ccc;
-webkit-box-shadow: 0 8px 6px -6px #ccc;
	   -moz-box-shadow: 0 8px 6px -6px #ccc;
	        box-shadow: 0 8px 6px -6px #ccc;

	margin-left:0px;
}
.lanjut {
    background-color: #fff;
	width:100%;
}

#primary {
    float: left;
    width: 480px;
	
}

#content {
    float: left;
    width: 480px;
}

#secondary {
    float: left;
    width: 480px;
}

.kotaksoal{
	width:97%;
	padding:20px;
	border:solid;
	top:30px;
	border-color:#CCC;
	height:100%;
}
.flex-next {
    background-color: #336898;
    width: 20px;
    height: 20px;
    margin: 10px;
    line-height: 20px;
    color: white;
    font-size: 18px;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:10px;
	padding-bottom:10px;

}
.flex-ragu {
    background-color:#FC0;
    width: 20px;
    height: 20px;
    margin: 10px;
    line-height: 20px;
    color: white;
    font-size: 18px;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:10px;
	padding-bottom:10px;
	text-decoration:none;
}
.flex-prev {
    background-color: #999;
    width: 25px;
    height: 25px;
    margin: 10px;
    line-height: 20px;
    color: white;
    font-size: 18px;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:10px;
	padding-bottom:10px;
}
.flex-container {
    height: 100%;
    padding: 0;
    margin: 0;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
}
.row {
    width: auto;
    /*border: 1px solid blue;*/
	 background-color: #336898;
}
.flex-item {
    background-color: #336898;
	 width: 120px;
    height: 40px;
    margin-right: 0px;
	margin-top:-10px;
    line-height: 20px;
    color: white;
    font-size: 15px;
	font-weight:bold;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:7px;
	padding-bottom:6px;
}	
.flex-abu {
    background-color: #999;
    width: 120px;
    height: 40px;
    margin-right: 0px;
	margin-top:-10px;
    line-height: 20px;
    color: white;
    font-size: 15px;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:10px;
	padding-bottom:10px;
	float:right;
}	
.flex-biru {
    background-color: #000;
    width: 120px;
    height: 40px;
    margin-right: 0px;
	margin-top:-10px;
    line-height: 20px;
    color: white;
    font-size: 15px;
    text-align: center;
	padding-left:5px;
	padding-right:5px;	
	padding-top:10px;
	padding-bottom:10px;
	float:right;
}	
.flex-putih {
    background-color: #fff;
    width: 120px;
    height: 40px;
    margin-right: 0px;
	margin-top:-10px;
    line-height: 20px;
    color: black;
    font-size: 15px;
	font-weight:bold;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:10px;
	padding-bottom:10px;
	float:left;
}	


</style>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
function showUser(str) {
	alert();
	$.ajax({
//this was the confusing part...did not know how to pass the data to the script
      url: 'simpanragu.php',
      type: 'post',
      data: 'who='+who+'&chk='+chk,
        success: function(data)
        { return false;
		}
   });
   return false;
}
</script>
<script> 
function  toggle_select(id) {
	var anu = document.getElementById(id);
    var X = document.getElementById(id);
    if (X.checked == true) {
     X.value = "1";
    } else {
    X.value = "0";
    }
	
//var sql="update clients set calendar='" + X.value + "' where cli_ID='" + X.id + "' limit 1";
var who=X.id;
var chk=X.value

//alert(who+"Ujian"+chk);

//alert("Joe is still debugging: (function incomplete/database record was not updated)\n"+ sql);
  $.ajax({
//this was the confusing part...did not know how to pass the data to the script
      url: 'simpanragu.php',
      type: 'post',
      data: 'who='+who+'&chk='+chk+'&anu='+anu,
        success: function(data)
        { return false;
      /*
	  success: function(output) 
      { alert('success, server says '+output);
	  return false;
      },
      error: function()
      { alert('something went wrong, save failed');
	  return false;
      }
	  */
		}
   });
   return false;
   
    
   
}
</script>

    <script>
        function disableBackButton() {
            window.history.forward();
        }
        setTimeout("disableBackButton()", 0);
		
		
		var box = document.querySelector('#no_email');
console.log(box);

box.addEventListener('change', function no_email_confirm() { 
  if (this.checked == false) {
    return true;
  } else {
   var confirmation= confirm("This means that the VENDOR will NOT RECEIVE ANY communication!!!!");
    if (confirmation)
        return true;
    else
       box.checked = false;
  }
});
    </script>
    
<style>
    .no-close .ui-dialog-titlebar-close {
        display: none;
    }
#tampilkan {
    background-color: #336898;
    width: 150px;
    height: 50px;
    margin-right: 20px;
	margin-top:-10px;
    line-height: 20px;
    color: white;
    font-size: 22px;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:14px;
	padding-bottom:14px;
	float:right;
	
}	

</style>
<!--
<link href="css/fonts.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">!-->
<link href="css/klien.css" rel="stylesheet">

<link href="css/sikil.css" rel="stylesheet">
<script src="js/inline.js"></script>
<!--<script type="text/javascript"
  src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=AM_HTMLorMML-full"></script>
  !-->

 <?php 

$cek = mysql_num_rows(mysql_query("select * from cbt_jawaban where XKodeSoal = '$xkodesoal' and XUserJawab = '$user' and XTokenUjian = '$xtokenujian'"));
if($cek<1){  
$hit = 1;

//Ambil Soal Esai 
//  $xjumlahesai = $s['XEsai'];  
if($xmapelagama=='Y'){
  $sqlambilsoalesai = mysql_query("select * from cbt_soal where XKodeSoal = '$xkodesoal' and XJenisSoal = '2' and XAcakSoal = 'T' and XAgama = '$xagama' order by Urut LIMIT $xjumesai");
} else {
  $sqlambilsoalesai = mysql_query("select * from cbt_soal where XKodeSoal = '$xkodesoal' and XJenisSoal = '2' and XAcakSoal = 'T' order by Urut LIMIT $xjumesai");
}  
  while($r1=mysql_fetch_array($sqlambilsoalesai)){
	  $sqlsimpanesai = mysql_query("insert into cbt_jawaban (Urut,XNomerSoal,XUserJawab,XKodeSoal,XTokenUjian,XTglJawab,XJenisSoal,XKodeKelas,XKodeJurusan,XKodeUjian,XSetId,XKodeMapel,XSemester) values 	
	  ('$hit','$r1[XNomerSoal]','$user','$xkodesoal','$xtokenujian','$tglbuat','2','$xkodekelasx','$xkodejurusx','$xkodeujianx','$xsetidx','$xkodemapel','$xsemester'  
)");  
	 $hit = $hit+1;	  
  }
  //esai utama harus muncul bila acak=T
  $jmlesaiutama = mysql_num_rows($sqlambilsoalesai);
  //jika jml esai utama masih < xjumlahesai
  if($jmlesaiutama<$xjumesai){
  //ambil acak esai tambahan sebanyak sisa esai
	  $sisaesai = $xjumesai - $jmlesaiutama;
	  if($xmapelagama=='Y'){
	  $sqlambilsoalesai = mysql_query("select * from cbt_soal where XKodeSoal = '$xkodesoal' and XJenisSoal = '2' and XAcakSoal = 'A' and XAgama = '$xagama' order by RAND() LIMIT $sisaesai");
	  } else {
	  $sqlambilsoalesai = mysql_query("select * from cbt_soal where XKodeSoal = '$xkodesoal' and XJenisSoal = '2' and XAcakSoal = 'A' order by RAND() LIMIT $sisaesai");
	  }
 	  while($r2=mysql_fetch_array($sqlambilsoalesai)){
	  $sqlsimpanesai = mysql_query("insert into cbt_jawaban (Urut,XNomerSoal,XUserJawab,XKodeSoal,XTokenUjian,XTglJawab,XJenisSoal,XKodeKelas,XKodeJurusan,XKodeUjian,XSetId,XKodeMapel,XSemester) values 	
	  ('$hit','$r2[XNomerSoal]','$user','$xkodesoal','$xtokenujian','$tglbuat','2','$xkodekelasx','$xkodejurusx','$xkodeujianx','$xsetidx','$xkodemapel','$xsemester')");  
	  $hit = $hit+1;
	  }
	  
  }
  
$xjumlahsoalpil = $xjumlahsoal - $xjumlahesai;
//  $xjumpilg = $s['XPilGanda'];   
//  $xjumesai = $s['XEsai'];     

//ambil soal pilihan yang status acak sebanyak xjumlahsoalpil


  if($xmapelagama=='Y'){
  $sqlambilsoalpilT1 = mysql_query("select * from cbt_soal where XKodeSoal = '$xkodesoal' and XJenisSoal = '1' and XAcakSoal = 'T' and XAgama = '$xagama' order by Urut LIMIT  $xjumpilg");
  } else {
  $sqlambilsoalpilT1 = mysql_query("select * from cbt_soal where XKodeSoal = '$xkodesoal' and XJenisSoal = '1' and XAcakSoal = 'T' order by Urut LIMIT  $xjumpilg");
  }  
  while($r2=mysql_fetch_array($sqlambilsoalpilT1)){
	if($xjumlahpilihan==4){
	$a=array("1","2","3","4");
		
		if($r2['XAcakOpsi']=='Y'){ //jika opsijawaban diacak
		shuffle($a); }

	$A1 = $a[0];$X1 = "XGambarJawab1$A1";
	$B1 = $a[1];
	$C1 = $a[2];
	$D1 = $a[3];
	$sql = mysql_query("insert into cbt_jawaban (Urut,XNomerSoal,XUserJawab,XKodeSoal,XTokenUjian,XKunciJawaban,XA,XB,XC,XD,XTglJawab,XJenisSoal,XKodeKelas,XKodeJurusan,XKodeUjian,XSetId,XKodeMapel,XSemester) values 	
	('$hit','$r2[XNomerSoal]','$user','$xkodesoal','$xtokenujian','$r2[XKunciJawaban]','$A1','$B1','$C1','$D1','$tglbuat','1','$xkodekelasx','$xkodejurusx','$xkodeujianx',
'$xsetidx','$xkodemapel','$xsemester')"); 
	$hit = $hit+1;
	} elseif($xjumlahpilihan==5){
    $a=array("1","2","3","4","5");
		
		if($r2['XAcakOpsi']=='Y'){ //jika opsijawaban diacak
		shuffle($a); }

	$A1 = $a[0];
	$B1 = $a[1];
	$C1 = $a[2];
	$D1 = $a[3];
	$E1 = $a[4];	
	$sql = mysql_query("insert into cbt_jawaban (Urut,XNomerSoal,XUserJawab,XKodeSoal,XTokenUjian,XKunciJawaban,XA,XB,XC,XD,XE,XTglJawab,XJenisSoal,XKodeKelas,XKodeJurusan,XKodeUjian,XSetId,XKodeMapel,XSemester) values 
	('$hit','$r2[XNomerSoal]','$user','$xkodesoal','$xtokenujian','$r2[XKunciJawaban]','$A1','$B1','$C1','$D1','$E1','$tglbuat','1','$xkodekelasx','$xkodejurusx','$xkodeujianx',
'$xsetidx','$xkodemapel','$xsemester')"); 
	$hit = $hit+1;
	}  
  }
  
  
  // jumlah soal tidak acak harus tampil semua
  $jmlpilT = mysql_num_rows($sqlambilsoalpilT1);
  // jumlah soal tersisa buat yg acak adalah $jmlpilA
  $jmlpilA = $xjumpilg - $jmlpilT;
  
  if($xmapelagama=='Y'){
  $sqlambilsoalpilA2 = mysql_query("select * from cbt_soal where XKodeSoal = '$xkodesoal' and XJenisSoal = '1' and XAcakSoal = 'A' and XAgama = '$xagama'
   order by RAND() LIMIT  $jmlpilA");
  } else {
  $sqlambilsoalpilA2 = mysql_query("select * from cbt_soal where XKodeSoal = '$xkodesoal' and XJenisSoal = '1' and XAcakSoal = 'A' order by RAND() LIMIT  $jmlpilA");  
  }
  while($r2=mysql_fetch_array($sqlambilsoalpilA2)){
	if($xjumlahpilihan==4){
	$a=array("1","2","3","4");
		
		if($r2['XAcakOpsi']=='Y'){ //jika opsijawaban diacak
		shuffle($a); }

	$A1 = $a[0];
	$B1 = $a[1];
	$C1 = $a[2];
	$D1 = $a[3];
	$sql = mysql_query("insert into cbt_jawaban (Urut,XNomerSoal,XUserJawab,XKodeSoal,XTokenUjian,XKunciJawaban,XA,XB,XC,XD,XTglJawab,XJenisSoal,XKodeKelas,XKodeJurusan,XKodeUjian,XSetId,XKodeMapel,XSemester) values 	
	('$hit','$r2[XNomerSoal]','$user','$xkodesoal','$xtokenujian','$r2[XKunciJawaban]','$A1','$B1','$C1','$D1','$tglbuat','1','$xkodekelasx','$xkodejurusx','$xkodeujianx',
'$xsetidx','$xkodemapel','$xsemester')"); 
	$hit = $hit+1;
	} elseif($xjumlahpilihan==5){
    $a=array("1","2","3","4","5");

		if($r2['XAcakOpsi']=='Y'){ //jika opsijawaban diacak
		shuffle($a); }

	$A1 = $a[0];
	$B1 = $a[1];
	$C1 = $a[2];
	$D1 = $a[3];
	$E1 = $a[4];	
	$sql = mysql_query("insert into cbt_jawaban (Urut,XNomerSoal,XUserJawab,XKodeSoal,XTokenUjian,XKunciJawaban,XA,XB,XC,XD,XE,XTglJawab,XJenisSoal,XKodeKelas,XKodeJurusan,XKodeUjian,XSetId,XKodeMapel,XSemester) values 
	('$hit','$r2[XNomerSoal]','$user','$xkodesoal','$xtokenujian','$r2[XKunciJawaban]','$A1','$B1','$C1','$D1','$E1','$tglbuat','1','$xkodekelasx','$xkodejurusx','$xkodeujianx',
'$xsetidx','$xkodemapel','$xsemester')"); 
	$hit = $hit+1;
	}  
  }
  

//Ambil Soal berdasarkan Random atau Tidak
/*
  $sqlambilsoalpilT1 = mysql_query("select * from cbt_soal where XKodeSoal = '$xkodesoal' and XJenisSoal = '1' and XAcakSoal = 'T' order by Urut LIMIT  $jmlpilT");
  while($r1=mysql_fetch_array($sqlambilsoalpilT1)){
	if($xjumlahpilihan==4){
	$a=array("1","2","3","4");
	shuffle($a);

	$A1 = $a[0];
	$B1 = $a[1];
	$C1 = $a[2];
	$D1 = $a[3];
	$sql = mysql_query("insert into cbt_jawaban (Urut,XNomerSoal,XUserJawab,XKodeSoal,XTokenUjian,XKunciJawaban,XA,XB,XC,XD,XTglJawab,XJenisSoal) values 	
	('$hit','$r1[XNomerSoal]','$user','$xkodesoal','$xtokenujian','$r1[XKunciJawaban]','$A1','$B1','$C1','$D1','$tglbuat','1')"); 
	$hit = $hit+1;
	} elseif($xjumlahpilihan==5){
    $a=array("1","2","3","4","5");
	shuffle($a);

	$A1 = $a[0];
	$B1 = $a[1];
	$C1 = $a[2];
	$D1 = $a[3];
	$E1 = $a[4];	
	$sql = mysql_query("insert into cbt_jawaban (Urut,XNomerSoal,XUserJawab,XKodeSoal,XTokenUjian,XKunciJawaban,XA,XB,XC,XD,XE,XTglJawab,XJenisSoal) values 
	('$hit','$r1[XNomerSoal]','$user','$xkodesoal','$xtokenujian','$r1[XKunciJawaban]','$A1','$B1','$C1','$D1','$E1','$tglbuat','1')");
	$hit = $hit+1; 
	}  
  }
*/
 } 
  ?> 
 <style>
.container {
    font-size: 0; /*fix white space*/
}
.container > div {
    font-size: 16px; /*reset font size*/
    display: inline-block;
    vertical-align: top;
    width: 33.33%;
	border:thin; border-color:#0000FF;
    box-sizing: border-box;
	text-align:left;

}
@media (max-width: 400px) { /*breakpoint*/
    .container > div {
        display: block;
        width: 100%;
		margin-left:0px;
    }
}
</style>  
 <style>
.left1 {
    float: left;
    width: 70%;
}
.right1 {
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
@media screen and (max-width: 780px) { /* jika screen maks. 780 right turun */
/*    .left, */
    .left1,
    .right1 {
        float: none;
        width: auto;
		margin-top:0px;
		height:91px;
		color:#FFFFFF;
		display:block;	
    }
.foto{height:65px;}		
	.flex-putih,{ display:none}
.flex-abu {
    background-color: #999;
    width: 100px;
    height: 40px;
    margin-right: 0px;
	margin-top:-10px;
    line-height: 20px;
    color: white;
    font-size: 15px;
    text-align: center;
	padding-left:5px;
	padding-right:5px;	
	padding-top:10px;
	padding-bottom:10px;
	float:right;
}	
}
@media screen and (max-width: 400px) { /* jika screen maks. 780 right turun */
/*    .left, */
    .left1{width: auto;    height: 91px;}
    .right1 {
        float: none;
        width: auto;
		margin-top:0px;
		height:60px;
		color:#FFFFFF;
    }
.foto{height:40px;}	
.fontlembarsoal{ padding-top:50px;}

    .left1{width: auto;    height: 91px;}
    .right1 {
        float: none;
        width: auto;
		margin-top:0px;
		height:60px;
		color:#FFFFFF;
    }
	.flex-putih,.flex-abu{ display:none}
	.flex-item{ margin-left:20px;}
}
</style>
   
<body>
<header>
<div class="group1">
    <div class="left1"><a href="http://tuwagapat.com"><img src="images/logo.png" style=" margin-left:0px;"></a>
    </div>
    	<div class="right1"><table width="100%" border="0" cellspacing="5px;" style="margin-top:10px">   
     					<tr><td rowspan="3" width="100px" align="center"><img src="images/avatar.gif" style=" margin-left:0px; margin-top:5px" class="foto"></td>
						<td><span  style=" margin-left:0px; margin-top:5px">Selamat Datang</span></td></tr>
                        <tr><td><span class="user"><?php echo "$val_siswa ($xkodekelasx)"; ?></span></td></tr>
                        <tr><td><span class="log"><a href="logout.php">Logout</a><span></td></tr>
						</table>
                        </div>
           
      	</div>
	</div> 
</div>         
</header>

	    <li class="header">
           <div class="main">
           
           <span class="flex-putih">SOAL NO. </span>
<!-- asli            <span class="flex-item" style="background-color:<?php echo $cssb; ?>"  id="soal"></span> !-->
            <span class="flex-item" style="background-color:<?php echo $cssb; ?>"  id="soal">            </span>
            <span class="flex-biru"> <div id="h_timer"></div></span>
            <span class="flex-abu">Sisa Waktu</span>            
            </div>
        </li>
        

<div id="fontlembarsoal" class="fontlembarsoal">
<span id="hurufsoal"> Ukuran font soal : <a id="jfontsize-m2" href="#" style="font-size:14px; text-decoration:none">&nbsp; A &nbsp;</a> <a id="jfontsize-d2" href="#" style="font-size:16px; text-decoration:none">&nbsp; A &nbsp;</a> <a id="jfontsize-p2" href="#" style="font-size:18px; text-decoration:none">&nbsp; A &nbsp;</a></span></div>   

                    <script type="text/javascript" src="js/jquery-2.0.3.js"></script>
                    <script type="text/javascript" src="js/jquery.countdownTimer.js"></script>                   
                    <script>
                                $(function(){
                                    $('#h_timer').countdowntimer({
                                        hours : <?php echo $xjam; ?>,
                                        minutes :<?php echo $xmnt; ?>,
										seconds:<?php echo $xdtk; ?>,														
                                        size : "lg",
						                timeUp : timeisUp																														
                                    });
                                });
					function timeisUp() {
					alert("Waktu pengerjaan sudah habis");
					
						setTimeout(function() { 
						window.location.href = $("a")[0].href; 
						}, 2000);
						//Code to be executed when timer expires.
						window.location="akhir.php";
					
					}
					

                            </script>

<!-- load jquery -->
<script type="text/javascript">
$(document).ready(function() {
$("#soal").html(1);
	$.post( "getsoal.php?kode=<?php echo $xkodesoal; ?>", { pic: "1"}, function( data ) {
	  $("#picture").html( data );
	  $("#soal").html(1);
	});
	
	$("#picture").on("click",".get_pic", function(e){
		var picture_id = $(this).attr('data-id');
		$("#picture").html("<div style=\"margin:50px auto;width:50px;\"><img src=\"loader.gif\" /></div>");
		$("#soal").html(picture_id);
		$.post( "getsoal.php", { pic: picture_id}, function( data ) {
			$("#picture").html( data );
		});
		return false;
	});
	
});
</script>

<script src="js/jquery-scrolltofixed.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        // Dock the header to the top of the window when scrolled past the banner.
        // This is the default behavior.

        $('.header').scrollToFixed();


        // Dock the footer to the bottom of the page, but scroll up to reveal more
        // content if the page is scrolled far enough.

        $('.footer').scrollToFixed( {
            bottom: 0,
            limit: $('.footer').offset().top
        });


        // Dock each summary as it arrives just below the docked header, pushing the
        // previous summary up the page.

        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.header').outerHeight(true) + 10,
                limit: function() {
                    var limit = 0;
                    if (next) {
                        limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                    } else {
                        limit = $('.footer').offset().top - $(this).outerHeight(true) - 10;
                    }
                    return limit;
                },
                zIndex: 999
            });
        });
    });
</script>

<div id="picture"> 
<!-- pictures will appear here --> 
</div>
</body>

<script src="js/jquery.cookie.js"></script>
<script src="js/common.js"></script>
<script src="js/main.js"></script>
<script src="js/cookieList.js"></script>
<script src="js/backend.js"></script>

                   <!-- Modal -->
<div class="modal fade" id="modal-form" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title page-label">Konfirmasi Tes</h1>
                </div>
                <div class="panel-body">
                    <div class="inner-content">
                        <div class="wysiwyg-content">
                            <p>
                                Terimakasih telah berpartisipasi dalam tes ini.<br>
                                Silahkan klik tombol LOGOUT untuk mengakhiri test.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row" style="background-color:#fff">
                        <div class="col-xs-offset-3 col-xs-6">
                            <button type="submit" class="btn btn-success" data-dismiss="modal">SELESAI</button>
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">TIDAK</button>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
</head>
<style>
#fontlembarsoal{
	margin-top:3px;
	margin-left:15px;
	margin-bottom:0px;
	margin-right:15px;
	background-color:#f0efef;
	font-size:12px;
	font-weight:bold;
	height:45px;
	left:40px;
	padding-top:10px;	
	padding-bottom:3px;	
	}

#tulisansoal{	
	background-color:#fff;
	height:90px;
	font-size:18px;
	font-weight:bold;
	vertical-align:middle;
	top:495px;
}
.tulisansoal{	
	background-color:#fff;
	height:90px;
	font-size:18px;
	font-weight:bold;
	vertical-align:middle;
	top:495px;
}
.nomersoal{	
	top:25px; width:100px;
	background-color:#336898;
	color:#fff;
	height:90px;
	font-size:18px;
	font-weight:bold;
	vertical-align:middle;	
	}	

#lembarsoal{
	margin-top:-8px;
	margin-left:15px;
	margin-bottom:2px;
	margin-right:15px;
	background-color:#fff;
	height:150%;
	    border-radius: 30px;
	border-style:solid;
	border-color:#999;
	}	
	
#hurufsoal{
    padding-left: 30px;
	padding-top:2px;
	padding-bottom:2px;
}

#tampilkan {
    background-color: #336898;
    width: 150px;
    height: 50px;
    margin-right: 20px;
	margin-top:-10px;
    line-height: 20px;
    color: white;
    font-size: 22px;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:14px;
	padding-bottom:14px;
	float:right;
}	
#kotaksoal{
	width:97%;
	margin:0px auto;
	padding:20px;
	border:solid;
	top:30px;
	border-color:#CCC;
	
}
p{
	padding:20px;
	font-size: 16px;
	}
li{
	list-style:none;
	font-size:18px;
	}

	#lembaran{
	padding:20px;
	margin-left:12px;
	margin-right:12px;
	top:-30px;
	font-size: 12pt;
	background-color:#fff;
	border:solid;
	border-color:#ccc;
	}	
	#lembaransoal{
	padding:20px;
	font-size: 12pt;
	border:solid;
	border-color:#ccc;
	}	
.jawab	{
	font-size: 10pt;
	}
.jawaban	{
	padding-bottom:10px;
	font-size: 10pt;
	border:solid;
	border-color:#CCC;
	}	
.pilihanjawaban	{
	font-size: 10pt;
	padding-bottom:15px;
	}	

.noti-jawab {
    position:absolute;
    background-color:white;
    color:#999;
    padding:4px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px;
	border-style:solid;
	border-color:#999;
    width:30px;
    height:30px;
    text-align:center;
}

	
    </style>
    
    <style>
.cc-selector input{
	margin-left:0px;
	padding:0;
    -webkit-appearance:none;
       -moz-appearance:none;
            appearance:none;
							margin-top:-90px;
				top:-90px;
}
.A{background-image:url(images/A.png);}
.B{background-image:url(images/B.png);}
.C{background-image:url(images/C.png);}
.D{background-image:url(images/D.png);}
.E{background-image:url(images/E.png);}

.piljwb{
	margin-left:0;    
	border-radius: 30px;
	border-style:solid;
	border-color:#999;
	list-style:none;}

.cc-selector input:active +.drinkcard-cc{opacity: .9;}
.cc-selector input:checked +.drinkcard-cc{
	background-image:url(images/pilih.png);
    -webkit-filter: none;
       -moz-filter: none;
            filter: none;
}
.drinkcard-cc{
    cursor:pointer;
    background-size:contain;
    background-repeat:no-repeat;
    display:inline-block;
    width:38px;height:28px;;

}

.drinkcard-cc:hover{
    -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
       -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
            filter: brightness(1.2) grayscale(.5) opacity(.9);
}
.main {
	margin-right:15px;
	margin-top:10px;
}

.content {
    padding: 20px;
    overflow: hidden;
}
.left {
    float: left;
    width: 680px;
}
.right {
    float: left;
    margin-left: 40px;
}
.summary {
    border: 1px solid #dddddd;
    overflow: hidden;
    margin-top: 20px;
    background-color: white;
}
.summary .caption {
    border-bottom: 1px solid #dddddd;
    background-color: #dddddd;
    font-size: 12pt;
    font-weight: bold;
    padding: 5px;
}
.summary.scroll-to-fixed-fixed {
    margin-top: 0px;
}
.summary.scroll-to-fixed-fixed .caption {
    color: red;
}
.contents {
    width: 150px;
    margin: 10px;
    font-size: 80%;
}
.kakisoal{
	margin-left:15px;
	margin-bottom:10px;
	margin-right:15px;
	background-color:#fff;
	font-size:12px;
	font-weight:bold;
	height:70px;
	left:140px;

	}

.labelprev {
  display: block;
  padding: 10px 10px;
  font-size: 16px;
  margin: 5px auto;  
  background-color: #999;
  border-radius: 2px;
  cursor:pointer;
  width:200px;
  color:#FFF;  
  &:hover {
    cursor: pointer;
  }
}
.labelnext {
  display: block;
  padding: 10px 10px;
  font-size: 16px;
  float:right; 
  margin: 5px auto;   
  background-color: #336898;
  border-radius: 2px;
  cursor:pointer;
  width:200px;
  color:#FFF;  
  &:hover {
    cursor: pointer;
  }
}
input[type="checkbox"] {
  position: relative;
  top: 3px;
  font-size:18px;
    border: 2px solid black;
    width: 20px;
    height: 20px;
    margin: 0;
    padding: 0;
}
.flatRoundedCheckbox
{
    width: 120px;
    height: 40px;
    margin: 20px 50px;
    position: relative;
}
.flatRoundedCheckbox div
{
    width: 100%;
    height:100%;
    background: #d3d3d3;
    border-radius: 50px;
    position: relative;
    top:-30px;
}

</style>

<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title page-label">Konfirmasi Tes</h1>
                </div>
                <div class="panel-body">
                    <div class="inner-content">
                        <div class="wysiwyg-content">
                            <p>
                                Terimakasih telah berpartisipasi dalam tes ini.<br>
                                Silahkan klik tombol LOGOUT untuk mengakhiri test.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row" style="background-color:#fff">
                        <div class="col-xs-offset-3 col-xs-6">
                            <button type="submit" class="btn btn-success" data-dismiss="modal">SELESAI</button>
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">TIDAK</button>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



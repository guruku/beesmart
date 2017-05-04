<?php include "cbt_con.php"; 
// ===============================
// Status Ujian XStatusUjian = 1 Aktif
// Status Ujian XStatusUjian = 0 BelumAktif
// Status Ujian XStatusUjian = 9 Selesai

$tgl = date("H:i:s");
if(isset($_COOKIE['PESERTA'])){
$user = $_COOKIE['PESERTA'];
$sql = mysql_query("Update cbt_siswa_ujian set XLastUpdate = '$tgl' where XNomerUjian = '$user' and XStatusUjian = '1' ");
}
//cek data siswa ujian
  $sqluser = mysql_query("SELECT * FROM  `cbt_siswa` s LEFT JOIN cbt_ujian u ON s.XKodeKelas = u.XKodeKelas WHERE XNomerUjian = 
  '$user' and u.XStatusUjian = '1'");
  $s = mysql_fetch_array($sqluser);
  $val_siswa = $s['XNamaSiswa'];
  $xkodesoal = $s['XKodeSoal'];
  $xkodemapel = $s['XKodeMapel'];
  $xjumlahsoal = $s['XJumSoal'];
  $xtokenujian = $s['XTokenUjian'];  
  
$sqlceksiswa = mysql_query("select * from cbt_siswa_ujian where XNomerUjian = '$user' and XKodeSoal = '$xkodesoal'  and XTokenUjian = '$xtokenujian'"); 
$s2 = mysql_fetch_array($sqlceksiswa);

  $xjumlahjam = $s2['XLamaUjian'];
  $xjam = substr($xjumlahjam,0,2);
  $xmnt = substr($xjumlahjam,3,2);
  $xdtk = substr($xjumlahjam,6,2);
  $xstatusujian = $s2['XStatusUjian'];
 // echo "$xstatusujian<br>";
  
$jatahjam = $xjam;
$jatahmnt = $xmnt;
$menit = $jatahmnt+($jatahjam*60);
$timestamp = strtotime($s2['XMulaiUjian']) + $menit*60;
$tjam = date('H', $timestamp);
$tmnt = date('i', $timestamp);
$tdtk = date('s', $timestamp);
$jamterakhirlogout = "$tjam:$tmnt:$tdtk";
?>
<?php

if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $user = trim($parts[0]);
        setcookie($user, '', time()-1000);
        setcookie($user, '', time()-1000, '/');
		setcookie("user", '', time()-1000);
		setcookie("apl", '', time()-1000);		
    	unset($_COOKIE['user']);
    	setcookie('user', '', time() - 3600, '/'); // empty value and old timestamp

    }
}
header('location:index.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>


<div class="modal" id="myModal" role="dialog">
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
                    <div class="row"  style="background-color:#fff">
                        <div class="col-xs-offset-3 col-xs-6">
                            <button type="submit" class="btn btn-success btn-block" data-dismiss="modal">LOGOUTZ</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>



</body>
</html>
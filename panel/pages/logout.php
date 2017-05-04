<?php 
include "../../config/server.php";
// ===============================
// Status Ujian XStatusUjian = 1 Aktif
// Status Ujian XStatusUjian = 0 BelumAktif
// Status Ujian XStatusUjian = 9 Selesai

$tgl = date("H:i:s");
if(isset($_COOKIE['beeuser'])){
$user = $_COOKIE['beelogin'];
}
?>
<?php

if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $user = trim($parts[0]);
        setcookie($beeuser, '', time()-1000);
        setcookie($beeuser, '', time()-1000, '/');
		setcookie("beeuser", '', time()-1000);
		setcookie("beelogin", '', time()-1000);		
    	unset($_COOKIE['beeuser']);
    	unset($_COOKIE['beelogin']);
    	setcookie('beeuser', '', time() - 3600, '/'); // empty value and old timestamp
    	setcookie('beelogin', '', time() - 3600, '/'); // empty value and old timestamp

    }
}


header('location:../pages/login.php');

?>
    <script>
        function disableBackButton() {
            window.history.forward();
        }
        setTimeout("disableBackButton()", 0);
    </script>
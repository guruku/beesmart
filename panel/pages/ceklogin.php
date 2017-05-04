<?php
if(isset($_POST['userz'], $_POST['passz'])) {
		include "../../config/server.php";
			require("../../config/fungsi_thn.php");		
		$userz = mysql_real_escape_string($_REQUEST['userz']);
		$passz = mysql_real_escape_string($_REQUEST['passz']);
		$passz = md5($passz);
		$loginz = mysql_real_escape_string($_REQUEST['login']);
		if($loginz == "admin"){$peran = "1";} else {$peran="0";}
		$sqladmin = mysql_num_rows(mysql_query("select * from cbt_user where Username = '$userz' and Password = '$passz' and login = '$peran'"));
		if($sqladmin>0){
					//if(!isset($_COOKIE['beeuser'], $_COOKIE['beelogin'])){
		$sqltahun = mysql_query("select * from cbt_setid where XStatus = '1'");
		$st = mysql_fetch_array($sqltahun);
		$tahunz = $st['XKodeAY'];

		$sqlsekolah = mysql_query("select * from cbt_admin");
		$sk = mysql_fetch_array($sqlsekolah);
					
						setcookie('beeuser',$userz);
						setcookie('beelogin',$loginz);
						setcookie('beetahun',$tahunz);
						setcookie('beesekolah',$sk['XKodeSekolah']);
						$_COOKIE['beeuser']==$userz;
						$_COOKIE['beelogin']==$loginz;
						$_COOKIE['beetahun']==$tahunz;
						$_COOKIE['beesekolah']==$sk['XKodeSekolah'];						
						header("Location: ../pages/?");
					//}

		
		} else { header("Location: login.php"); }
} else {

	header("Location: login.php");

}?>


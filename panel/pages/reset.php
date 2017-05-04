<?php include "../../config/server.php";

//$sql = mysql_query("insert into tes (nilai) values ('$_REQUEST[token]')");
$array =  explode(',', $_REQUEST['nama']);

foreach ($array as $item) {
	$sql0 = mysql_query("select * from cbt_siswa_ujian where Urut = '$item' and XTokenUjian = '$_REQUEST[token]'");
	$s = mysql_fetch_array($sql0);
	$status = $s['XStatusUjian'];
	$nomer = $s['XNomerUjian'];
	if($status=='1'){
	 $sql = mysql_query("update cbt_siswa_ujian set XStatusUjian = '9' where  Urut = '$item' and XTokenUjian = '$_REQUEST[token]' and XNomerUjian = '$nomer'");
	} elseif($status=='9'){
	 $sql = mysql_query("update cbt_siswa_ujian set XStatusUjian = '1' where  Urut = '$item' and XTokenUjian = '$_REQUEST[token]' and XNomerUjian = '$nomer'");
	}

}

?>
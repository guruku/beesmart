<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$a=array("1","2","3","4");
		shuffle($a); 
	$A1 = $a[0];
	$B1 = $a[1];
	$C1 = $a[2];
	$D1 = $a[3];
	$var = array_search(4,$a);
	$var = $var+1;
	echo "$A1-$B1-$C1-$D1 Kunci : $var <br>";
	//$kunci = array_keys($a, $r2['XKunciJawaban']);
	if($var=='1'){echo "A"; }
	if($var=='2'){echo "B"; }	
	if($var=='3'){echo "C"; }
	if($var=='4'){echo "D"; }	

	
?>
</body>
</html>

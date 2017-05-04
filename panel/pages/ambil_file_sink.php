<!-- Sinkron Gambar-->                        
<!-- Progress bar holder -->
<div style="margin-top:10px;width:77%;"><ul class="an"><li style="margin-left:-40px;">DATA 1</li><li style="text-align:right; display:none" id="statusdataG">Selesai</li></ul></div>
<br>
<div id="progressG" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
<!-- Progress information -->
<div id="informationG" style="width"></div>



<!-- Sinkron Audio-->                        
<!-- Progress bar holder -->
<div style="margin-top:10px;width:77%;"><ul class="an"><li style="margin-left:-40px;">DATA 2</li><li style="text-align:right; display:none" id="statusdataA">Selesai</li></ul></div>
<br>
<div id="progressA" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
<!-- Progress information -->
<div id="informationA" style="width"></div>

<script src="../../../js/jquery.js"></script>
<?php
include "../../config/server.php";

$sql1 = mysql_query("select * from cbt_soal where XGambarTanya !='' group by XGambarTanya");
$jum1 = mysql_num_rows($sql1);

$sql2 = mysql_query("select * from cbt_soal where XAudioTanya !='' group by XAudioTanya");
$jum2 = mysql_num_rows($sql2);

$sql3 = mysql_query("select * from cbt_soal where XVideoTanya !='' group by XVideoTanya");
$jum3 = mysql_num_rows($sql3);

$total = $jum1+$jum2+$jum3;
echo "Jumlah : $jum1+$jum2+$jum3 = $total<br>";
$i = 0;
while($r=mysql_fetch_array($sql1)){
	if(!$r['XGambarTanya']==''){
	$filese = "$r[XGambarTanya]";	
	
$i++;
echo "$i. file |$filese|<br>";

//$filese = "soal1.jpg";
//$url = 'http://SMP-BINAKARYA/beesmart2/pictures/'.$filese; // working
//$file = fopen(dirname(__FILE__) . '/images/'.$filese, 'w+');
$url = 'http://demo.cbtbeesmart.com/pictures/'.$filese;
$file = fopen('../../pictures/'.$filese, 'w+');
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_TIMEOUT, 0); 
// Update as of PHP 5.4 array() can be written []
curl_setopt_array($curl, [
    CURLOPT_URL            => $url,
//  CURLOPT_BINARYTRANSFER => 1, --- No effect from PHP 5.1.3
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_FILE           => $file,
    CURLOPT_TIMEOUT        => 50,
    CURLOPT_USERAGENT      => 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)'
]);

$response = curl_exec($curl);

if($response === false) {
    // Update as of PHP 5.3 use of Namespaces Exception() becomes \Exception()
    throw new \Exception('Curl error: ' . curl_error($curl));
}

$response; // Do something with the response.
$percent = intval($i/$jum1 * 100)."%";
// Javascript for updating the progress bar and information
			echo '<script language="javascript">
			document.getElementById("progressG").innerHTML="<div style=\"width:'.$percent.';background-image:url(images/pbar-ani1.gif);\">&nbsp;</div>";
		    document.getElementById("informationG").innerHTML="  Download Berkas Soal <b>'.$i.'</b> row(s) of <b>'. $jum1.'</b> ... '.$percent.'  completed.";			
			</script>';
		// This is for the buffer achieve the minimum size in order to flush data
			echo str_repeat(' ',1024*64);
		// Send output to browser immediately
			flush();

	}
}

$i = 0;
while($r=mysql_fetch_array($sql2)){
	if(!$r['XAudioTanya']==''){
	$filese = "$r[XAudioTanya]";	
	echo "file |$filese|<br>";
$i++;
echo "$i. file |$filese|<br>";

//$filese = "soal1.jpg";
//$url = 'http://SMP-BINAKARYA/beesmart2/audio/'.$filese;
$url = 'http://demo.cbtbeesmart.com/audio/'.$filese;

//$file = fopen(dirname(__FILE__) . '/images/'.$filese, 'w+');
$file = fopen('../../audio/'.$filese, 'w+');

$curl = curl_init($url);

// Update as of PHP 5.4 array() can be written []
curl_setopt_array($curl, [
    CURLOPT_URL            => $url,
//  CURLOPT_BINARYTRANSFER => 1, --- No effect from PHP 5.1.3
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_FILE           => $file,
    CURLOPT_TIMEOUT        => 50,
    CURLOPT_USERAGENT      => 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)'
]);

$response = curl_exec($curl);

if($response === false) {
    // Update as of PHP 5.3 use of Namespaces Exception() becomes \Exception()
    throw new \Exception('Curl error: ' . curl_error($curl));
}

$response; // Do something with the response.
$percent2 = intval($i/$jum2 * 100)."%";
// Javascript for updating the progress bar and information
			echo '<script language="javascript">
			document.getElementById("progressA").innerHTML="<div style=\"width:'.$percent2.';background-image:url(images/pbar-ani1.gif);\">&nbsp;</div>";
		    document.getElementById("informationA").innerHTML="  Download Berkas Soal <b>'.$i.'</b> row(s) of <b>'. $jum2.'</b> ... '.$percent2.'  completed.";			
			</script>';
		// This is for the buffer achieve the minimum size in order to flush data
			echo str_repeat(' ',1024*64);
		// Send output to browser immediately
			flush();


	}
	
}

while($r=mysql_fetch_array($sql3)){
	if(!$r['XVideoTanya']==''){
	$filese = "$r[XVideoTanya]";	
	echo "file |$filese|<br>";

//$filese = "soal1.jpg";
$url = 'http://demo.cbtbeesmart.com/video/'.$filese;
//$file = fopen(dirname(__FILE__) . '/images/'.$filese, 'w+');
$file = fopen('../../video/'.$filese, 'w+');

$curl = curl_init($url);

// Update as of PHP 5.4 array() can be written []
curl_setopt_array($curl, [
    CURLOPT_URL            => $url,
//  CURLOPT_BINARYTRANSFER => 1, --- No effect from PHP 5.1.3
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_FILE           => $file,
    CURLOPT_TIMEOUT        => 50,
    CURLOPT_USERAGENT      => 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)'
]);

$response = curl_exec($curl);

if($response === false) {
    // Update as of PHP 5.3 use of Namespaces Exception() becomes \Exception()
    throw new \Exception('Curl error: ' . curl_error($curl));
}

$response; // Do something with the response.


	}
}




?>

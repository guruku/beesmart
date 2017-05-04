<?php
set_time_limit(0);
$filese = "soal1.jpg";
$url = 'http://SMP-BINAKARYA/beesmart2/pictures/'.$filese;
//$file = fopen(dirname(__FILE__) . '/images/'.$filese, 'w+');
$file = fopen('../../pictures/'.$filese, 'w+');

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
?>

<?php
set_time_limit(0);
$filese = "smalistening.mp3";
$url = 'http://SMP-BINAKARYA/beesmart2/audio/'.$filese;
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
?>

<?php
$files = glob('folder/*.{jpg,png,gif}', GLOB_BRACE);
$i=1;
foreach($files as $file) {
  echo $i;
  $i++; 
  //do your work here
}
?>
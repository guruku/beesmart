<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<?php
error_reporting(E_ALL);
require_once 'excel/PHPExcel.php';
include "../../config/server.php"; 

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

//$var_soal = "$_REQUEST[ujian]";

$hasil = mysql_query("SELECT *,u.XStatusUjian as ujsta
FROM cbt_siswa s
LEFT JOIN `cbt_siswa_ujian` u ON u.XNomerUjian = s.XNomerUjian
LEFT JOIN cbt_ujian c ON (u.XKodeSoal = c.XKodeSoal and u.XTokenUjian = c.XTokenUjian)
WHERE c.XStatusUjian = '1'");

// Set properties
$objPHPExcel->getProperties()->setCreator("Sigit Hariono")
      ->setLastModifiedBy("Sigit Hariono")
      ->setTitle("Office 2007 XLSX Test Document")
      ->setSubject("Office 2007 XLSX Test Document")
       ->setDescription("Salary Report")
       ->setKeywords("office 2007 openxml php")
       ->setCategory("Rekap Hasil Tes :");
 
// Add some data
$objPHPExcel->setActiveSheetIndex(0)
       	->setCellValue('A1', 'NO')
       	->setCellValue('B1', 'NO. PESERTA')
       	->setCellValue('C1', 'NAMA SISWA')
       	->setCellValue('D1', 'KELAS')
       	->setCellValue('E1', 'NIS')
       	->setCellValue('F1', 'JAWAB')
       	->setCellValue('G1', 'BENAR')
       	->setCellValue('H1', 'NILAI'); 

$baris = 2;
$no = 0;		

while($p = mysql_fetch_array($hasil)){
    $var_siswa = "$p[XNomerUjian]";
	$var_token = "$p[XTokenUjian]";
	$var_soal = "$p[XKodeSoal]";
	$var_jumsoal = "$p[XJumSoal]";	

	$sqlujian = mysql_query("SELECT * FROM `cbt_jawaban` j left join cbt_soal s on s.XNomerSoal = j.XNomerSoal WHERE j.XKodeSoal = '$var_soal' and j.XUserJawab = '$var_siswa'
	and XTokenUjian = '$var_token'");
	
	$sqlmapel = mysql_query("select * from cbt_ujian c left join cbt_mapel m on m.XKodeMapel = c.XKodeMapel where c.XKodeSoal = '$var_soal'"); 
	$u = mysql_fetch_array($sqlmapel);
	$namamapel = $u['XNamaMapel'];
	
	$sqlsiswa = mysql_query("SELECT * FROM `cbt_siswa` WHERE XNomerUjian= '$var_siswa'");
	$s = mysql_fetch_array($sqlsiswa);
	$namsis = $s['XNamaSiswa'];
	$namkel = $s['XNamaKelas'];
	$nomsis = $s['XNIK'];

//----- php excel 

$no = $no +1;

	$sqldijawab = mysql_num_rows(mysql_query(" SELECT * FROM `cbt_jawaban` WHERE XKodeSoal = '$var_soal' and XUserJawab = '$var_siswa' and XJawaban != '' and XTokenUjian = '$var_token'"));

	$sqljawaban = mysql_query(" SELECT count( XNilai ) AS HasilUjian FROM `cbt_jawaban` WHERE XKodeSoal = '$var_soal' and XUserJawab = '$var_siswa' and XNilai = '1' and XTokenUjian = '$var_token'");
	$sqj = mysql_fetch_array($sqljawaban);
	$jumbenar = $sqj['HasilUjian'];
	
	
//	$totalnilai = $jumbenar * 10;
	$totalnilai = ($jumbenar/$var_jumsoal)*100;


$objPHPExcel->setActiveSheetIndex(0)
     	->setCellValue("A$baris", $no)
     	->setCellValue("B$baris", $p['XNomerUjian'])
     	->setCellValue("C$baris", $namsis)
     	->setCellValue("D$baris", $namkel)
     	->setCellValue("E$baris", $nomsis)
     	->setCellValue("F$baris", $sqldijawab)
     	->setCellValue("G$baris", $jumbenar)
     	->setCellValue("H$baris", $totalnilai);				

$baris = $baris + 1;
}
 
// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('transaksi');
 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
 
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="HasilUjian-'.$var_soal.'.xls"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
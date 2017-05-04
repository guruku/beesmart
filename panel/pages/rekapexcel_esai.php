<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<?php

include "../../config/server.php";
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once 'PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
							 
function cellColor($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));
}


$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:L1');
$objPHPExcel->getActiveSheet()->getStyle("A1:L1")->getFont()->setSize(18);
   $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

    $objPHPExcel->getActiveSheet()->getStyle("A1:J1")->applyFromArray($style);


cellColor('A3:L3', 'e7e7e7');
//cellColor('A30:Z30', 'F28A8C');							 
				 
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);

// Add some data
$objPHPExcel->setActiveSheetIndex(0)

			->setCellValue('A1', 'HASIL UJIAN CBT')
			->setCellValue('A3', 'No.')
			->setCellValue('B3', 'Nomer Ujian')
			->setCellValue('C3', 'Nama Peserta')
			->setCellValue('D3', 'Kelas - Jurusan')
			->setCellValue('E3', 'Mata Pelajaran')
			->setCellValue('F3', 'Pertanyaan')
			->setCellValue('G3', 'Jawaban Esai')
			->setCellValue('H3', 'Jawaban Esai')			
			->setCellValue('I3', 'Nilai Soal Esai')
			->setCellValue('J3', 'TOKEN');			


$sqlujian = mysql_query("SELECT * from cbt_jawaban WHERE XKodeSoal = '$_REQUEST[soal]'");
$uj = mysql_fetch_array($sqlujian);
$txt_kelas = $uj['XKodeKelas'];
$txt_jurusan = $uj['XKodeKelas'];
$var_mapel = $uj['XKodeMapel'];
$var_soal = $uj['XKodeSoal'];
$var_jumsoal = $uj['XJumSoal'];
$var_token = $uj['XTokenUjian'];

if($txt_kelas == 'ALL' && $txt_jurusan == 'ALL'){
$hasil = mysql_query("SELECT * FROM cbt_siswa "); }
elseif($txt_kelas == 'ALL' && $txt_jurusan !== 'ALL'){
$hasil = mysql_query("SELECT * FROM cbt_siswa where XKodeJurusan = '$txt_jurusan'"); }
elseif( $txt_kelas !== 'ALL' && $txt_jurusan == 'ALL'){
$hasil = mysql_query("SELECT * FROM cbt_siswa where XKodeKelas = '$txt_kelas'"); 
} else {
$hasil = mysql_query("SELECT * FROM cbt_siswa where XKodeKelas = '$txt_kelas'");
}


$baris = 4;
$no = 1;	
while($p = mysql_fetch_array($hasil)){

    $var_siswa = "$p[XNomerUjian]";
	$var_nama = "$p[XNamaSiswa]";
	$var_sesi = "$p[XSesi]";
    $var_kelas = "$p[XKodeKelas]";
	$var_jurusan = "$p[XKodeJurusan]";
	$grup = "$p[XKodeKelas] - $p[XKodeJurusan]";
	
	$sqlpaket = mysql_query("select * from  cbt_paketsoal where XKodeSoal = '$var_soal'"); 	
	$p1 = mysql_fetch_array($sqlpaket);
	$per_pil = $p1['XPersenPil'];
	$per_esai = $p1['XPersenEsai'];	
	$var_pil = $p1['XPilGanda'];	
	$var_esai = $p1['XEsai'];		

$sqljumlah = mysql_query("select sum(XNilaiEsai) as hasil from cbt_jawaban where XKodeSoal = '$var_soal' and XUserJawab = '$var_siswa' and XTokenUjian = '$var_token'");
$o = mysql_fetch_array($sqljumlah);

$nilai_esai = $o['hasil'];

$sqlmapel = mysql_query("select * from cbt_ujian c left join cbt_mapel m on m.XKodeMapel = c.XKodeMapel where c.XKodeSoal = '$var_soal' and c.XKodeMapel = '$var_mapel'"); 
	$sqlmapel = mysql_query("select * from  cbt_mapel where XKodeMapel = '$var_mapel'"); 	
	$u = mysql_fetch_array($sqlmapel);
	$namamapel = $u['XNamaMapel'];	
	
	$sqldijawab = mysql_num_rows(mysql_query("SELECT * FROM `cbt_jawaban` WHERE XKodeSoal = '$var_soal' and XUserJawab = '$var_siswa' and XJawaban != '' and XTokenUjian = 
	'$var_token'"));

$sqljawaban = mysql_query(" SELECT count( XNilai ) AS HasilUjian FROM `cbt_jawaban` WHERE XKodeSoal = '$var_soal' and XUserJawab = '$var_siswa' and XNilai = '1' and XTokenUjian = '$var_token'");
	$sqj = mysql_fetch_array($sqljawaban);
	$jumbenar = $sqj['HasilUjian'];
	$nilai_pil = ($jumbenar/$var_pil)*100;	
	$total_pil = $nilai_pil*($per_pil/100);	
	$total_esai = $nilai_esai*($per_esai/100);	
	$total_nilai = $total_pil+$total_esai;	

// Miscellaneous glyphs, UTF-8
$objPHPExcel->setActiveSheetIndex(0)
            //->setCellValue('A4', 'Miscellaneous glyphs')
            //->setCellValue('A5', 'sfdsdf');
			->setCellValue("A$baris", $no)
			->setCellValue("B$baris", "$var_siswa - Sesi $var_sesi")
			->setCellValue("C$baris", "$var_nama")
			->setCellValue("D$baris", "$grup")
			->setCellValue("E$baris", "$namamapel")
			->setCellValue("F$baris", "$sqldijawab")
			->setCellValue("G$baris", "$jumbenar")
			->setCellValue("H$baris", "$nilai_esai")			
			->setCellValue("I$baris", "$total_pil")			
			->setCellValue("J$baris", "$total_esai")			
			->setCellValue("K$baris", "$total_nilai")
			->setCellValue("L$baris", "$var_token");			
			
			$no = $no +1;			
					
	$baris = $baris + 1;
}
 
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle($namamapel);


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="HasilUjian.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

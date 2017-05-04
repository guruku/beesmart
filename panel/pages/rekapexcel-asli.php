<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
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

    $objPHPExcel->getActiveSheet()->getStyle("A1:L1")->applyFromArray($style);


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
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);

// Add some data
$objPHPExcel->setActiveSheetIndex(0)

			->setCellValue('A1', 'HASIL UJIAN CBT')
			->setCellValue('A3', 'No.')
			->setCellValue('B3', 'Nomer Ujian')
			->setCellValue('C3', 'Nama Peserta')
			->setCellValue('D3', 'Kelas - Jurusan')
			->setCellValue('E3', 'Mata Pelajaran')
			->setCellValue('F3', 'Menjawab')
			->setCellValue('G3', 'Benar')
			->setCellValue('H3', 'Jawaban Esai')			
			->setCellValue('I3', 'Nilai Pilihan Ganda')
			->setCellValue('J3', 'Nilai Soal Esai')		
			->setCellValue('K3', 'Total Nilai')
			->setCellValue('L3', 'TOKEN');			
						

/*
$hasil = mysql_query("SELECT *,u.XStatusUjian as ujsta
FROM cbt_siswa s
LEFT JOIN `cbt_siswa_ujian` u ON u.XNomerUjian = s.XNomerUjian
LEFT JOIN cbt_ujian c ON (u.XKodeSoal = c.XKodeSoal and u.XTokenUjian = c.XTokenUjian)
LEFT JOIN cbt_paketsoal p ON (u.XKodeSoal = c.XKodeSoal and u.XTokenUjian = c.XTokenUjian)
WHERE c.XKodeSoal = '$_REQUEST[soal]'");
*/
/*
SELECT *,u.XStatusUjian as ujsta
FROM cbt_siswa s
LEFT JOIN `cbt_siswa_ujian` u ON u.XNomerUjian = s.XNomerUjian
LEFT JOIN cbt_ujian c ON (u.XKodeSoal = c.XKodeSoal and u.XTokenUjian = c.XTokenUjian)
LEFT JOIN cbt_nilai n ON (n.XKodeSoal = c.XKodeSoal and n.XTokenUjian = c.XTokenUjian)
WHERE c.XKodeSoal = '$_REQUEST[soal]'");
*/

$hasil = mysql_query("
SELECT *,u.XStatusUjian as ujsta,u.XTokenUjian as tokek, u.XNomerUjian as NU, c.XKodeMapel as Kopel,u.XKodeSoal as Koso,c.XSesi as seksi
FROM cbt_siswa s
LEFT JOIN `cbt_siswa_ujian` u ON u.XNomerUjian = s.XNomerUjian
LEFT JOIN cbt_ujian c ON (u.XKodeSoal = c.XKodeSoal and u.XTokenUjian = c.XTokenUjian)
LEFT JOIN cbt_nilai n ON (n.XKodeSoal = c.XKodeSoal and n.XTokenUjian = c.XTokenUjian 
and n.XNIK = s.XNIK)
WHERE c.XKodeSoal = '$_REQUEST[soal]'");


$baris = 4;
$no = 1;	
while($p = mysql_fetch_array($hasil)){
    $var_siswa = "$p[NU]";
	$var_token = "$p[tokek]";
	$var_soal = "$p[Koso]";
	$var_mapel = "$p[Kopel]";	
	$var_jumsoal = "$p[XJumSoal]";
	$var_sesi = "$p[seksi]";	
		
	$sqlujian = mysql_query("SELECT * FROM `cbt_jawaban` j left join cbt_soal s on s.XNomerSoal = j.XNomerSoal WHERE j.XKodeSoal = '$var_soal' and j.XUserJawab = '$var_siswa'
	and XTokenUjian = '$var_token'");

	$sqldijawab = mysql_num_rows(mysql_query("SELECT * FROM `cbt_jawaban` WHERE XKodeSoal = '$var_soal' and XUserJawab = '$var_siswa' and XJawaban != '' and XTokenUjian = 
	'$var_token'"));
	
	//$sqlmapel = mysql_query("select * from cbt_ujian c left join cbt_mapel m on m.XKodeMapel = c.XKodeMapel where c.XKodeSoal = '$var_soal' and c.XKodeMapel = '$var_mapel'"); 
	$sqlmapel = mysql_query("select * from  cbt_mapel where XKodeMapel = '$var_mapel'"); 	
	$u = mysql_fetch_array($sqlmapel);
	$namamapel = $u['XNamaMapel'];
	
	$sqlpaket = mysql_query("select * from  cbt_paketsoal where XKodeSoal = '$var_soal'"); 	
	$p = mysql_fetch_array($sqlpaket);
	$per_pil = $p['XPersenPil'];
	$per_esai = $p['XPersenEsai'];	
	$var_pil = $p['XPilGanda'];	
	$var_esai = $p['XEsai'];	
		
	$sqlsiswa = mysql_query("SELECT * FROM `cbt_siswa` WHERE XNomerUjian= '$var_siswa'");
	$s = mysql_fetch_array($sqlsiswa);
	$namsis = $s['XNamaSiswa'];
	$namkel = $s['XKodeKelas'];
	$namjur = $s['XKodeJurusan'];
	$grup = "$s[XKodeKelas] - $s[XKodeJurusan]";
	$nomsis = $s['XNIK'];

$sqljumlah = mysql_query("select sum(XNilaiEsai) as hasil from cbt_jawaban where XKodeSoal = '$var_soal' and XUserJawab = '$var_siswa' and XTokenUjian = '$var_token'");
$o = mysql_fetch_array($sqljumlah);

$nilai_esai = $o['hasil'];

/*
	$sqljawaban = mysql_query(" SELECT count( XNilai ) AS HasilUjian FROM `cbt_jawaban` WHERE XKodeSoal = '$var_soal' and XUserJawab = '$var_siswa' and XNilai = '1' and XTokenUjian = '$var_token'");
	$sqj = mysql_fetch_array($sqljawaban);
	$jumbenar = $sqj['HasilUjian'];
	$nilai_pil = ($jumbenar/$var_pil)*100;	
	$total_pil = $nilai_pil*($per_pil/100);	
	$total_esai = $nilai_esai*($per_esai/100);	
	$total_nilai = $total_pil+$total_esai;
	*/
	
	$sqljawaban = mysql_query("SELECT count( XNilai ) AS HasilUjian FROM `cbt_jawaban` WHERE XKodeSoal = '$var_soal' and XUserJawab = '$var_siswa' and XNilai = '1' and XTokenUjian = '$var_token'");
	$sqj = mysql_fetch_array($sqljawaban);
	$jumbenar = $sqj['HasilUjian'];
	$hasil_pil = $jumbenar;	
	$nilai_pil = round((($jumbenar/$var_pil)*$per_pil),2);	
	//$total_pil = round(($nilai_pil/$per_pil)*100,2);	
	$total_pil = $nilai_pil;	
	$tot_pil = number_format($total_pil,2,',','.');	

$sqljawaban = mysql_query("SELECT sum( XNilaiEsai ) AS HasilEsai FROM `cbt_jawaban` WHERE XKodeSoal = '$var_soal' and XUserJawab = '$var_siswa' and XJenisSoal = '2' and XTokenUjian = '$var_token'");
	$sqj = mysql_fetch_array($sqljawaban);
	if($var_esai<1){$total_esai = 0; $hasil_esai = 0; $nilai_esai = 0;} else {
	$hasil_esai = $sqj['HasilEsai'];
	$nilai_esai = round(($hasil_esai*($per_esai/100)),2);	
	//$total_esai = round(($nilai_esai/$per_esai)*100,2);	
	$total_esai = $nilai_esai;	
	$tot_esai = round($nilai_esai,2);	
	}
		

	$total_nilai = number_format(($total_pil+$total_esai),2,',','.');
	
		
// Miscellaneous glyphs, UTF-8
$objPHPExcel->setActiveSheetIndex(0)
            //->setCellValue('A4', 'Miscellaneous glyphs')
            //->setCellValue('A5', 'sfdsdf');
			->setCellValue("A$baris", $no)
			->setCellValue("B$baris", "$var_siswa - Sesi $var_sesi")
			->setCellValue("C$baris", $namsis)
			->setCellValue("D$baris", $grup)
			->setCellValue("E$baris", $namamapel)
			->setCellValue("F$baris", $sqldijawab)
			->setCellValue("G$baris", $jumbenar)
			->setCellValue("H$baris", $nilai_esai)			
			->setCellValue("I$baris", $total_pil)			
			->setCellValue("J$baris", $total_esai)			
			->setCellValue("K$baris", $total_nilai)
			->setCellValue("L$baris", $var_token);			
			
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

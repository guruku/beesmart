<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<?php
require_once 'PHPExcel.php';
include "../../config/server.php"; 

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

//$var_soal = "$_REQUEST[ujian]";

$hasil = mysql_query("SELECT * FROM cbt_soal WHERE XKodeSoal = '$_REQUEST[idsoal]'");

// Set properties
$objPHPExcel->getProperties()->setCreator("Sigit Hariono")
      ->setLastModifiedBy("Sigit Hariono")
      ->setTitle("Office 2007 XLSX Test Document")
      ->setSubject("Office 2007 XLSX Test Document")
       ->setDescription("Soal Export")
       ->setKeywords("office 2007 openxml php")
       ->setCategory("Rekap Hasil Tes :");
 
// Add some data
$objPHPExcel->setActiveSheetIndex(0)
       	->mergeCells('A1:A2')
       	->mergeCells('E1:E2')
       	->mergeCells('F1:F2')
       	->mergeCells('G1:G2')
       	->mergeCells('H1:H2')
       	->mergeCells('I1:I2')
       	->mergeCells('J1:J2')
       	->mergeCells('K1:K2')
       	->mergeCells('L1:L2')
       	->mergeCells('M1:M2')
       	->mergeCells('N1:N2')
       	->mergeCells('O1:O2')
       	->mergeCells('P1:P2')
       	->mergeCells('Q1:Q2')
       	->mergeCells('R1:R2')
       	->mergeCells('S1:S2')
       	->mergeCells('T1:T2')
				
       	->setCellValue('A1', 'NO')
       	->setCellValue('B1', 'JENIS SOAL')
       	->setCellValue('C1', 'KATEGORI')
       	->setCellValue('D1', 'ACAK')
       	->setCellValue('E1', 'SOAL')
       	->setCellValue('F1', 'JAWAB1')
       	->setCellValue('G1', 'FILEJAWAB1')
       	->setCellValue('H1', 'JAWAB2')
       	->setCellValue('I1', 'FILEJAWAB2')
       	->setCellValue('J1', 'JAWAB3')
       	->setCellValue('K1', 'FILEJAWAB3')
       	->setCellValue('L1', 'JAWAB4')
       	->setCellValue('M1', 'FILEJAWAB4')
       	->setCellValue('N1', 'JAWAB5')
       	->setCellValue('O1', 'FILEJAWAB5')
       	->setCellValue('P1', 'AUDIO')
       	->setCellValue('Q1', 'VIDEO')
       	->setCellValue('R1', 'GAMBAR')
       	->setCellValue('S1', 'KUNCI JAWABAN')
       	->setCellValue('T1', 'ACAK OPSI JAWABAN');


$baris = 3;
$no = 0;		

while($p = mysql_fetch_array($hasil)){
//----- php excel 

$no = $no +1;
$objPHPExcel->setActiveSheetIndex(0)
     	->setCellValue("A$baris", $no)
     	->setCellValue("B$baris", $p['XJenisSoal'])
     	->setCellValue("C$baris", $p['XKategori'])
     	->setCellValue("D$baris", $p['XAcakSoal'])
     	->setCellValue("E$baris", $p['XTanya'])
     	->setCellValue("F$baris", $p['XJawab1'])
     	->setCellValue("G$baris", $p['XGambarJawab1'])
     	->setCellValue("H$baris", $p['XJawab2'])
     	->setCellValue("I$baris", $p['XGambarJawab2'])
     	->setCellValue("J$baris", $p['XJawab3'])
     	->setCellValue("K$baris", $p['XGambarJawab3'])
     	->setCellValue("L$baris", $p['XJawab4'])
     	->setCellValue("M$baris", $p['XGambarJawab4'])
     	->setCellValue("N$baris", $p['XJawab5'])
     	->setCellValue("O$baris", $p['XGambarJawab5'])
     	->setCellValue("P$baris", $p['XAudioTanya'])
     	->setCellValue("Q$baris", $p['XVideoTanya'])
     	->setCellValue("R$baris", $p['XGambarTanya'])
     	->setCellValue("S$baris", $p['XKunciJawaban'])
     	->setCellValue("T$baris", $p['XAcakOpsi']);				

$baris = $baris + 1;
}
 
// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('transaksi');
 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
$namasoal = "$_REQUEST[idsoal]";
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Soal_'.$namasoal.'.xls"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
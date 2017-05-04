<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<?php
if(isset($_REQUEST['modul'])){
	if($_REQUEST['modul']=="upl_kelas"){
	$kata = "Data Kelas"; }
	elseif($_REQUEST['modul']=="upl_mapel"){
	$kata = "Data Mata Pelajaran"; }
	elseif($_REQUEST['modul']=="upl_siswa"){
	$kata = "Data Siswa"; }
}
?>
 <!-- /.row -->
            <div class="row">
                <div class="col-lg-10" style="margin-top:10px;">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                           Download File Excel (Template Data Siswa)
                        </div>
                        <div class="panel-body">
<div style="width: 20%; float:left">
   <a href="../../file-excel/bee_siswa_temp.xls" target="_blank"><img src="images/xls.png" style=" width:90%; max-width:100px;padding-right:10px;"/></a>
</div>

<div style="width: 80%; float:right">
   Silahkan Klik logo Excel disamping, untuk <a href="../../file-excel/bee_kelas_temp.xls" target="_blank"> download </a> file excel database Siswa. 
   <br />Jangan ada inputan apapun setelah nomer terakhir. Karena akan dibaca dan diacak oleh sistem. <p>Setelah selesai edit, Upload kembali untuk ditransfer ke
   database melalui tool dibawah ini. 
   
</div>
                        </div>
                        <div class="panel-footer">
                                   <a href="../../file-excel/bee_siswa_temp.xls" target="_blank"><button class="btn btn-success btn-lg btn-small" id="baru" value="Buat" name="baru"><i class="fa fa-file-excel-o"></i>
                            Download</button></a>
        
        <a href="?modul=daftar_siswa"><button class="btn btn-success btn-lg btn-small" id="baru" value="Buat" name="baru"><i class="fa fa-search"></i>
                            Lihat Data</button></a>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
            </div>
            <!-- /.row -->
            
            
              <div class="row">
                <div class="col-lg-10" style="margin-top:10px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Upload Template Excel - Siswa
                        </div>
                        <div class="panel-body">
						<form method="post" enctype="multipart/form-data" action="<?php echo "?modul=uploadsiswa"; ?>">
                        File Excel Daftar Siswa (Peserta Tes) : 
                        <table border="0" width="78%" cellpadding="20px" cellspacing="20px"><tr><td width="30%"><input name="userfile" type="file" class="btn btn-default" style="width:250px"></td><td>
                        &nbsp;<input name="upload" type="submit" value="Import"  class="btn btn-info" style="margin-top:0px">
                        </td></tr></table>
                        </form>
                        <div style="margin-top:10px;">Persentase Proses Upload <? echo $kata; ?> </div>
<!-- Progress bar holder -->
<div id="progress" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
<!-- Progress information -->
<div id="information" style="width"></div>

<?php

if($_REQUEST['modul']=="uploadsiswa"){
// menggunakan class phpExcelReader
include "excel_reader2.php";
if(isset($xkodemapel)){
$xkodemapel = "$_REQUEST[txt_mapel]";
}
if(isset($xkodesoal)){
$xkodesoal = "$_REQUEST[txt_ujian]";
}
if(isset($xkodekelas)){
$xkodekelas = "$_REQUEST[txt_level]";
}
// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

echo "<br><table>";

$query0 = "TRUNCATE TABLE cbt_siswa";
		  $hasil0 = mysql_query($query0);

for ($i=3; $i<=$baris; $i++)
{
  // membaca data soalid (kolom ke-1 FIELD)
  $fieldz = $data->val($i, 1);
  // membaca data pertanyaan (kolom ke-2 R)
  $xnomer 	= $data->val($i, 1);
  $xnama  	= $data->val($i, 2);
  $xnik   	= $data->val($i, 3);
  $xsesi  	= $data->val($i, 4);
  $xruang 	= $data->val($i, 5);
  $xlevel 	= $data->val($i, 6);
  $xkelas 	= $data->val($i, 7);
  $xjekel 	= $data->val($i, 8);
  $xpass  	= $data->val($i, 9);
  $xjur   	= $data->val($i, 10);
  $xfoto  	= $data->val($i, 11);
  $xagama  	= $data->val($i, 12); 
  $xpilih  	= $data->val($i, 13);    
  $xnama  	= str_replace("'","\'",$xnama);
  $xnama  	= str_replace("'","`",$xnama);
 
 
 if(!str_replace(" ","",$xnomer)==""){ 
 
		  $querykelas = "select XKodeKelas from cbt_kelas where XKodeKelas = '$xkelas' ";
		  $hasilkelas = mysql_num_rows(mysql_query($querykelas));
		  $queryjur = "select XKodeJurusan from cbt_kelas where  XKodeJurusan = '$xjur'";
		  $hasiljur = mysql_num_rows(mysql_query($queryjur));
		  $querylevel = "select XKodeLevel from cbt_kelas where XKodeLevel = '$xlevel' ";
		  $hasillevel = mysql_num_rows(mysql_query($querylevel));
		  $querykode = mysql_query("select XKodeSekolah from cbt_admin");
		  $hk = mysql_fetch_array($querykode);

  if($hasilkelas<1){ 
  echo "<tr><td>Gagal Insert data Siswa <b>$xnama</b>&nbsp;&nbsp;</td><td><font color=red> Kode Kelas $xkelas</font> Tidak Sesuai dengan Database Kelas</td> </tr>";
  $gagal++;
  } elseif($hasiljur<1){ 
  echo "<tr><td>Gagal Insert data Siswa <b>$xnama</b>&nbsp;&nbsp;</td><td><font color=red> Kode Jurusan $xjur</font> Tidak Sesuai dengan Database Kelas</td> </tr>";
  $gagal++;
  } elseif($hasillevel<1){ 
  echo "<tr><td>Gagal Insert data Siswa <b>$xnama</b>&nbsp;&nbsp;</td><td><font color=red> Kode Level $xlevel</font> Tidak Sesuai dengan Database Kelas</td> </tr>";
  $gagal++;
  } else {  	  
  	  // setelah data dibaca, sisipkan ke dalam tabel mhs
		  $query = "INSERT INTO cbt_siswa (XNomerUjian, XNIK,XSesi,XRuang, XNamaSiswa,XKodeKelas, XJenisKelamin, XPassword, XKodeJurusan,
		  XKodeLevel, XFoto,XAgama,XSetId,XKodeSekolah,XPilihan) 
		  VALUES ('$xnomer', '$xnik','$xsesi', '$xruang', '$xnama','$xkelas','$xjekel','$xpass','$xjur','$xlevel','$xfoto','$xagama','$_COOKIE[beetahun]','$hk[XKodeSekolah]','$xpilih')";
		  $hasil = mysql_query($query);
  $sukses++;
  
  //if ($hasil) $sukses++;
  //else $gagal++;
  }  

  } // end if !str_replace

  
			// Calculate the percentation
			$percent = intval($i/$baris * 100)."%";
    
    // Javascript for updating the progress bar and information
    echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-image:url(images/pbar-ani1.gif);\">&nbsp;</div>";
    document.getElementById("information").innerHTML="  Proses Entri : '.$xnama.' ... <b>'.$i.'</b> row(s) of <b>'. $baris.'</b> processed.";
    </script>';
// This is for the buffer achieve the minimum size in order to flush data
    echo str_repeat(' ',1024*64);
    

// Send output to browser immediately
    flush();
// Tell user that the process is completed
   echo '<script language="javascript">document.getElementById("information").innerHTML=" Proses update database Siswa : Completed"</script>';
  
  }
  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah

  echo "</table>";
// tampilan status sukses dan gagal
?>
<div style="width:75%; margin-top:10px">
    <div class="alert alert-success">
    <?php
    echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
    ?>
    </div>
    
    <?php
        if($gagal>0){
        ?>
        <div class="alert alert-danger">
        <?php
        echo "Jumlah data yang gagal diimport : ".$gagal."</p>";
        ?></div>
        <?php
        }
    }
    ?>
    
	</div>
</div>

                    </div>
                    <!-- /.col-lg-4 -->
                </div>
            </div>
            <!-- /.row -->
            


<script src="../../../js/jquery.js"></script>

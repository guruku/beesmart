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
	elseif($_REQUEST['modul']=="upl_soal"){
	$kata = "Data Soal"; }	
}
?>
 <!-- /.row -->
            <div class="row">
                <div class="col-lg-10" style="margin-top:10px;">
                    <div class="panel panel-green">
                        <div class="panel-heading">
<?php echo "<a href=?modul=daftar_soal&soal=$_REQUEST[soal]><button type='button' class='btn btn-default'><i class='fa fa-arrow-left'></i> Kembali ke Bank Soal</button></a>"; ?>	
                           Download File Excel (Template Data Soal) 	
                        </div>
                        <div class="panel-body">
<div style="width: 20%; float:left">
   <a href="../../file-excel/bee_soal_temp.xls" target="_blank"><img src="images/xls.png" style=" width:90%; max-width:100px;padding-right:10px;"/></a>
</div>

<div style="width: 80%; float:right">
   Silahkan Klik logo Excel disamping, untuk <a href="../../file-excel/bee_soal_temp.xls" target="_blank"> download </a> file excel database soal. 
   <br />Jangan ada inputan apapun setelah nomer terakhir. Karena akan dibaca dan diacak oleh sistem. <p>Setelah selesai edit, Upload kembali untuk ditransfer ke
   database melalui tool dibawah ini. 
   
</div>
                        </div>
                        <div class="panel-footer">
                            CBT BEESMART 
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
                            Upload Template Excel - Soal
                        </div>
                        <div class="panel-body">
						<form method="post" enctype="multipart/form-data" action="<?php echo "?modul=uploadsoal"; ?>">
                        File Excel Daftar Soal : 
                        <table border="0" width="78%" cellpadding="20px" cellspacing="20px"><tr><td width="30%">
                        <input name="userfile" type="file" class="btn btn-default" style="width:250px">
                        <input name="txt_mapel" type="hidden" value="<?php echo $_REQUEST['mapel']; ?>">
                        <input name="soal" type="hidden" value="<?php echo $_REQUEST['soal']; ?>">
                        </td><td>

                        &nbsp;<input name="upload" type="submit" value="Import"  class="btn btn-info" style="margin-top:0px">
                        </td></tr></table>
                        </form>
                        <div style="margin-top:10px;">Persentase Proses Upload <? echo $kata; ?> </div>
<!-- Progress bar holder -->
<div id="progress" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
<!-- Progress information -->
<div id="information" style="width"></div>

<?php
if($_REQUEST['modul']=="uploadsoal"){
// menggunakan class phpExcelReader
include "excel_reader2.php";
$xkodemapel = "$_REQUEST[txt_mapel]";
$xkodesoal = "$_REQUEST[soal]";
//$xkodekelas = "$_REQUEST[txt_level]";
// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=3; $i<=$baris; $i++)
{
  // membaca data soalid (kolom ke-1 FIELD)
  $fieldz = $data->val($i, 1);
  // membaca data pertanyaan (kolom ke-2 R)
  $xnomer = $data->val($i, 1);
  $xjen 		= $data->val($i, 2);
  $xkat 		= $data->val($i, 3);
  $xacak 		= $data->val($i,4);
  $xtanya 		= $data->val($i, 5);
  $xjawab1 		= $data->val($i, 6);
  $xfilejawab1 	= $data->val($i, 7);
  $xjawab2 		= $data->val($i, 8);
  $xfilejawab2 	= $data->val($i, 9);  
  $xjawab3 		= $data->val($i, 10);
  $xfilejawab3 	= $data->val($i, 11);  
  $xjawab4 		= $data->val($i, 12);
  $xfilejawab4 	= $data->val($i, 13);  
  $xjawab5 		= $data->val($i, 14);
  $xfilejawab5 	= $data->val($i, 15);  
  $xaudio 		= $data->val($i, 16);
  $xvideo 		= $data->val($i, 17);
  $xgambar 		= $data->val($i, 18);
  $xjwban 		= $data->val($i, 19);
  $xacakopsi	= $data->val($i, 20);
  $xagama		= $data->val($i, 21);  
  
  $xtanya 		= str_replace("'","`",$xtanya);
  $xjawab1 		= str_replace("'","`",$xjawab1);
  $xjawab2 		= str_replace("'","`",$xjawab2);  
  $xjawab3 		= str_replace("'","`",$xjawab3);
  $xjawab4 		= str_replace("'","`",$xjawab4);  
  $xjawab5 		= str_replace("'","`",$xjawab5);
 
 
 // if tanya = kosong 
	if(!str_replace(" ","",$xkat)==""){ 
			 
					  // setelah data dibaca, sisipkan ke dalam tabel mhs
			/*		  $query = "INSERT INTO cbt_soal (XNomerSoal, XKodeMapel, XKodeSoal,XKodeKelas, XTanya, XJawab1, XGambarJawab1, XJawab2,XGambarJawab2, XJawab3,XGambarJawab3, XJawab4,XGambarJawab4, XJawab5,XGambarJawab5, 
					  XAudioTanya, XVideoTanya, XGambarTanya, XKunciJawaban) VALUES ('$xnomer', '$xkodemapel', '$xkodesoal','$xkodekelas','$xtanya','$xjawab1','$xfilejawab1',
					  '$xjawab2','$xfilejawab2','$xjawab3','$xfilejawab3','$xjawab4','$xfilejawab4','$xjawab5','$xfilejawab5','$xaudio','$xvideo','$xgambar','$xjwban')";
			*/
					  $query = "INSERT INTO cbt_soal (XNomerSoal, XKodeMapel, XKodeSoal, XTanya, XJawab1, XGambarJawab1, XJawab2,XGambarJawab2, XJawab3,XGambarJawab3, 
					  XJawab4,XGambarJawab4, XJawab5,XGambarJawab5, XAudioTanya, XVideoTanya, XGambarTanya, XKunciJawaban,XJenisSoal,XKategori,XAcakSoal,XAcakOpsi,XAgama) 
					  VALUES ('$xnomer', '$xkodemapel','$xkodesoal','$xtanya','$xjawab1','$xfilejawab1','$xjawab2','$xfilejawab2','$xjawab3',
					  '$xfilejawab3','$xjawab4','$xfilejawab4','$xjawab5','$xfilejawab5','$xaudio','$xvideo','$xgambar',
					  '$xjwban','$xjen','$xkat','$xacak','$xacakopsi','$xagama')";
			
					  $hasil = mysql_query($query);
			  if ($hasil) $sukses++;
			  else $gagal++;
	}		 
			  // jika proses insert data sukses, maka counter $sukses bertambah
			  // jika gagal, maka counter $gagal yang bertambah
			
}
  
	// Calculate the percentation
	$percent = intval($i/$baris * 100)."%";
    
    // Javascript for updating the progress bar and information
    echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-image:url(images/pbar-ani1.gif);\">&nbsp;</div>";
    document.getElementById("information").innerHTML="  Proses Entri : Soal ... <b>'.$i.'</b> row(s) of <b>'. $baris.'</b> processed.";
    </script>';
// This is for the buffer achieve the minimum size in order to flush data
    echo str_repeat(' ',1024*64);
    

// Send output to browser immediately
    flush();
// Tell user that the process is completed
   echo '<script language="javascript">document.getElementById("information").innerHTML=" Proses update database Bank Soal : Completed"</script>';
  
//  } end if jika tanya = kosong


  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah


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

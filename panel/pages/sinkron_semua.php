<form method="post" enctype="multipart/form-data" action="<?php echo "?modul=sinkronsatu"; ?>">
                        <br>
                        <table border="0" width="250px" cellpadding="20px" cellspacing="20px"><tr><td>
                        &nbsp;
                        <input name="upload" type="submit" value="START SYNC"  class="btn btn-danger" style="margin-top:0px">
                        </td><td>
                        <a href="#" data-toggle='modal' data-target='#myInfoz'><button class="btn btn-info">Refresh Status</button></a>
                        
                        </td></tr></table>
                        </form>
<style>
.an ul{
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

.an li {
    float: left;
	width:50%; list-style:none;
}

</style>
		<script>
        setTimeout(myFunction, 9000)
        </script>
        
        
<!-- Sinkron Siswa-->                        
<div style="width:75%; background-color:#28b2bc; color:#FFFFFF; padding:15px; margin-top:10px; font-size:22px">Sync Progress Status</div>
<!-- Progress bar holder -->
<div style="margin-top:10px;width:77%;"><ul class="an"><li style="margin-left:-40px;">DATA 1</li><li style="text-align:right; display:none" id="statusdata1">Selesai</li></ul></div>
<br>
<div id="progress" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
<!-- Progress information -->
<div id="information" style="width"></div>


<!-- Sinkron Soal -->
<!-- Progress bar holder -->
<hr style="width:75%; text-align:left; margin-left:0px; padding:0px">
<div style="margin-top:10px;width:77%;"><ul class="an"><li style="margin-left:-40px;">DATA 2</li><li style="text-align:right; display:none" id="statusdata2">Selesai</li></ul></div>
<br>
<div id="progress2" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
<!-- Progress information -->
<div id="information2" style="width"></div>

<!-- Sinkron Mapel -->
<hr style="width:75%; text-align:left; margin-left:0px">
<div style="margin-top:10px;width:77%;"><ul class="an"><li style="margin-left:-40px;">DATA 3</li><li style="text-align:right; display:none" id="statusdata3">Selesai</li></ul></div>
<br>
<div id="progress3" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
<!-- Progress information -->
<div id="information3" style="width"></div>


<!-- Sinkron Siswa -->
<hr style="width:75%; text-align:left; margin-left:0px">
<div style="margin-top:10px;width:77%;"><ul class="an"><li style="margin-left:-40px;">DATA 4</li><li style="text-align:right; display:none" id="statusdata4">Selesai</li></ul></div>
<br>
<div id="progress4" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
<!-- Progress information -->
<div id="information4" style="width"></div>

<!-- Sinkron Kelas -->
<hr style="width:75%; text-align:left; margin-left:0px">
<div style="margin-top:10px;width:77%;"><ul class="an"><li style="margin-left:-40px;">DATA 5</li><li style="text-align:right; display:none" id="statusdata5">Selesai</li></ul></div>
<br>
<div id="progress5" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
<!-- Progress information -->
<div id="information5" style="width"></div>


<?php
if($_REQUEST['modul']=="sinkronsatu"){

include "../../config/server.php";
$sql = mysql_query("truncate table cbt_paketsoal");
$i = 1;

//document.getElementById("information").innerHTML="  Sikronisasi : DATA 1 ... <b>'.$i.'</b> dari <b>'. $baris.'</b> Selesai.";
		include "../../config/server_pusat.php";
		$sqlcek = mysql_query("select * from cbt_paketsoal order by Urut");
		$baris = mysql_num_rows($sqlcek);
		//echo "jumlah total paket data : $baris";
		
		while($r=mysql_fetch_array($sqlcek)){
		//for ($i=1; $i<=$baris; $i++){
					include "../../config/server.php";
					$sql = mysql_query("insert into cbt_paketsoal 
					(XKodeMapel,XLevel,XKodeSoal,XJumPilihan,XTglBuat,XGuru,XKodeKelas,XKodeJurusan,XJumSoal,XPilGanda,XEsai,XPersenPil,XPersenEsai) values 			
					('$r[XKodeMapel]','$r[XLevel]','$r[XKodeSoal]','$r[XJumPilihan]','$r[XTglBuat]',			
					'$r[XGuru]','$r[XKodeKelas]','$r[XKodeJurusan]','$r[XJumSoal]',
					'$r[XPilGanda]','$r[XEsai]','$r[XPersenPil]','$r[XPersenEsai]')");

		$percent = intval($i/$baris * 100)."%";
			// Javascript for updating the progress bar and information
			echo '<script language="javascript">
			document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-image:url(images/pbar-ani1.gif);\">&nbsp;</div>";
			</script>';
		// This is for the buffer achieve the minimum size in order to flush data
			echo str_repeat(' ',1024*64);
		// Send output to browser immediately
			flush();
		// Tell user that the process is completed
		  
		
		$i++;
		} ?>
		<script>document.getElementById("statusdata1").style.display="block";
        setTimeout(myFunction, 9000)
        </script>
        
<?php 		
include "../../config/server.php";
$sql = mysql_query("truncate table cbt_soal");
$i = 1;

		include "../../config/server_pusat.php";
		$sqlcek = mysql_query("select * from cbt_soal order by Urut");
		$baris = mysql_num_rows($sqlcek);
		//echo "jumlah total paket data : $baris";
		
		
		for ($i=1; $i<=$baris; $i++){
					while($r=mysql_fetch_array($sqlcek)){
					include "../../config/server.php";
							 $hasil= mysql_query("INSERT INTO cbt_soal (XNomerSoal, XKodeMapel, XKodeSoal, XTanya, XJawab1, XGambarJawab1, XJawab2,XGambarJawab2, 
							 XJawab3,XGambarJawab3, XJawab4,XGambarJawab4, XJawab5,XGambarJawab5, XAudioTanya, XVideoTanya, XGambarTanya, XKunciJawaban,XJenisSoal,XAcakSoal,
							 XAcakOpsi,XKategori) 
							 VALUES ('$r[XNomerSoal]','$r[XKodeMapel]','$r[XKodeSoal]','$r[XTanya]','$r[XJawab1]','$r[XGambarJawab1]','$r[XJawab2]','$r[XGambarJawab2]',
							'$r[XJawab3]','$r[XGambarJawab3]','$r[XJawab4]','$r[XGambarJawab4]','$r[XJawab5]','$r[XGambarJawab5]','$r[XAudioTanya]',
							 '$r[XVideoTanya]','$r[XGambarTanya]','$r[XKunciJawaban]','$r[XJenisSoal]','$r[XAcakSoal]','$r[XAcakOpsi]','$r[XKategori]')");

		  if ($hasil) $sukses++;
		  else $gagal++;
  
			// Calculate the percentation
			$percent = intval($i/$baris * 100)."%";

//		$percent = intval($i/$baris * 100)."%";
//			document.getElementById("information2").innerHTML="  Sikronisasi : DATA 1 ... <b>'.$i.'</b> dari <b>'. $baris.'</b> Selesai.";			

			// Javascript for updating the progress bar and information
			echo '<script language="javascript">
			document.getElementById("progress2").innerHTML="<div style=\"width:'.$percent.';background-image:url(images/pbar-ani1.gif);\">&nbsp;</div>";
			</script>';
		// This is for the buffer achieve the minimum size in order to flush data
			echo str_repeat(' ',1024*64);
		// Send output to browser immediately
			flush();
		// Tell user that the process is completed
		   echo '<script language="javascript">document.getElementById("information").innerHTML=" Proses update database Mata Pelajaran : Completed"</script>';
						}
		}
		?>
		<script>document.getElementById("statusdata2").style.display="block";
        setTimeout(myFunction, 9000)
        </script>

       
<?php 		
include "../../config/server.php";
$sql = mysql_query("truncate table cbt_mapel");
$i = 1;

		include "../../config/server_pusat.php";
		$sqlcek = mysql_query("select * from cbt_mapel order by Urut");
		$baris = mysql_num_rows($sqlcek);
		//echo "jumlah total paket data : $baris";
		
		while($r=mysql_fetch_array($sqlcek)){
		//for ($i=1; $i<=$baris; $i++){
					include "../../config/server.php";
					//$query =  mysql_query("INSERT INTO cbt_mapel ( XKodeMapel, XNamaMapel,XPersenUH,XPersenUTS,XPersenUAS,XKKM,XMapelAgama) VALUES ('$r[XKodeMapel]', '$r[XNamaMapel]', '$r[XPersenUH]', '$r[XPersenUTS]', '$r[XPersenUAS]', '$r[XKKM]', '$r[XMapelAgama]')");
					$query =  mysql_query("INSERT INTO cbt_mapel ( XKodeMapel, XNamaMapel,XPersenUH,XPersenUTS,XPersenUAS,XKKM) VALUES ('$r[XKodeMapel]', '$r[XNamaMapel]', '$r[XPersenUH]', '$r[XPersenUTS]', '$r[XPersenUAS]', '$r[XKKM]')");
					
			$percent = intval($i/$baris * 100)."%";
//			document.getElementById("information2").innerHTML="  Sikronisasi : DATA 1 ... <b>'.$i.'</b> dari <b>'. $baris.'</b> Selesai.";			

			// Javascript for updating the progress bar and information
			echo '<script language="javascript">
			document.getElementById("progress3").innerHTML="<div style=\"width:'.$percent.';background-image:url(images/pbar-ani1.gif);\">&nbsp;</div>";
			</script>';
		// This is for the buffer achieve the minimum size in order to flush data
			echo str_repeat(' ',1024*64);
		// Send output to browser immediately
			flush();
		// Tell user that the process is completed
		
		$i++;
		}	?>
		<script>document.getElementById("statusdata3").style.display="block";
        setTimeout(myFunction, 9000)
        </script>
	

       
<?php 		
include "../../config/server.php";
$sql = mysql_query("truncate table cbt_siswa");
$i = 1;

		include "../../config/server_pusat.php";
		$sqlcek = mysql_query("select * from cbt_siswa order by Urut");
		$baris = mysql_num_rows($sqlcek);
		//echo "jumlah total paket data : $baris";
		
		while($r=mysql_fetch_array($sqlcek)){
		//for ($i=1; $i<=$baris; $i++){
					include "../../config/server.php";
					/*$query =  mysql_query("INSERT INTO cbt_siswa (XNomerUjian, XNIK,XSesi,XRuang, XNamaSiswa,XKodeKelas, XJenisKelamin, XPassword, XKodeJurusan,
		  XKodeLevel, XFoto,XAgama,XSetId) 
		  VALUES ('$r[XNomerUjian]','$r[XNIK]','$r[XSesi]','$r[XRuang]','$r[XNamaSiswa]','$r[XKodeKelas]','$r[XJenisKelamin]','$r[XPassword]','$r[XKodeJurusan]',
		  '$r[XKodeLevel]','$r[XFoto]','$r[XAgama]','$r[XSetId]')");*/
					$query =  mysql_query("INSERT INTO cbt_siswa (XNomerUjian, XNIK,XSesi,XRuang, XNamaSiswa,XKodeKelas, XJenisKelamin, XPassword, XKodeJurusan,
		  XKodeLevel, XFoto,XSetId) 
		  VALUES ('$r[XNomerUjian]','$r[XNIK]','$r[XSesi]','$r[XRuang]','$r[XNamaSiswa]','$r[XKodeKelas]','$r[XJenisKelamin]','$r[XPassword]','$r[XKodeJurusan]',
		  '$r[XKodeLevel]','$r[XFoto]','$r[XSetId]')");
					
			$percent = intval($i/$baris * 100)."%";
//			document.getElementById("information2").innerHTML="  Sikronisasi : DATA 1 ... <b>'.$i.'</b> dari <b>'. $baris.'</b> Selesai.";			

			// Javascript for updating the progress bar and information
			echo '<script language="javascript">
			document.getElementById("progress4").innerHTML="<div style=\"width:'.$percent.';background-image:url(images/pbar-ani1.gif);\">&nbsp;</div>";
			</script>';
		// This is for the buffer achieve the minimum size in order to flush data
			echo str_repeat(' ',1024*64);
		// Send output to browser immediately
			flush();
		// Tell user that the process is completed
		
		$i++;
		}	?>
		<script>document.getElementById("statusdata4").style.display="block";
        setTimeout(myFunction, 9000)
        </script>
            
<?php		
}


?>
<script src="../../../js/jquery.js"></script>



             <!-- Modal -->
<div class="modal fade" id="myInfoz" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title page-label" align="left">
                    CBT BeeSMART  V3.0  </h1>
                </div>
                <div class="panel-body">
                    <div class="inner-content">
                        <div class="wysiwyg-content">
                           <?php 
						   include "ambil_token.php";
						   ?>                  
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-offset-4 col-xs-9">
                            <button type="submit" class="btn btn-default btn-sm" data-dismiss="modal">
                           <i class="fa fa-file-pdf-o"></i> PDF Download</button>
                           <button type="submit" class="btn btn-default btn-sm" data-dismiss="modal">
                           <i class="glyphicon glyphicon-minus-sign"></i> Close</button>
                        </div>
                    </div>
                </div></form>
            </div>
        </div>
    </div>
</div>
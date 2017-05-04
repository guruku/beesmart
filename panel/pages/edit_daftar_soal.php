<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CBT BeeSmart</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="jquery-1.4.js"></script>
<script>    
$(document).ready(function(){

	var loading = $("#loading");
	var tampilkan = $("#tampilkan1");
 	var idstu = $("#idstu").val();
	
	function tampildata(){
	tampilkan.hide();
	loading.fadeIn();
	
	$.ajax({
    type:"POST",
    url:"database_soal_tampil.php",  
	data:"aksi=tampil&idstu=" + idstu,  
	success: function(data){ 
		loading.fadeOut();
		tampilkan.html(data);
		tampilkan.fadeIn(100);
	   }
    }); 
	}// akhir fungsi tampildata
	tampildata();

});



</script>

<style>
.asd {
  display: inline-block;
  width: 50%;
}
</style>
 <script type="text/javascript"
  src="../../MathJax/MathJax.js?config=AM_HTMLorMML-full"></script>

<!-- script untuk refresh/reload mathjax setiap content baru !-->
   <script>
  MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
</script>
<!-- script untuk refresh/reload mathjax setiap content baru !-->
  
<body>

  <!-- Modal confirm -->
<div class="modal" id="confirmModal" style="display: none; z-index: 1050;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="confirmMessage">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="confirmOk">Ok</button>
                <button type="button" class="btn btn-default" id="confirmCancel">Cancel</button>
            </div>
        </div>
    </div>
</div>


<!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Daftar Bank Soal</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
 
 <script>
function deleteItem() {
 	var txt_mapel = $("#txt_koso").val();	

    if (confirm("Are you sure?")) {
        // your deletion code
			$.ajax({
			type:"POST",
			url:"hapus_isi_soal.php",  
			data:"aksi=tampil&txt_mapel=" + txt_mapel,  
			success: function(data){ 
					alert("Kosongkan Bank Soal " + txt_mapel + " Sukses !");
	  				document.location.reload();					
			   }
			}); 
    }
    return false;
}
</script>
     <input type="hidden" id="txt_koso" name="txt_koso" value="<?php echo $_REQUEST['soal']; ?>">

            
<?php include "../../config/server.php"; 

					$sqlsoal = mysql_num_rows(mysql_query("select * from cbt_soal where XKodeSoal = '$_REQUEST[soal]'"));
					$sqlpakai = mysql_num_rows(mysql_query("select * from cbt_siswa_ujian where XKodeSoal = '$_REQUEST[soal]' and XStatusUjian = '1'"));
					$sqlsudah = mysql_num_rows(mysql_query("select * from cbt_jawaban where XKodeSoal = '$_REQUEST[soal]'"));


if(isset($_REQUEST['aksi'])&&$_REQUEST['aksi']=="hapus"){$sqldel = mysql_query("delete from cbt_soal where Urut = '$_REQUEST[nomer]' and XKodeSoal = '$_REQUEST[soal]'");}
?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
    <?php echo "<a href=?modul=daftar_soal><button type='button' class='btn btn-default'><i class='fa fa-arrow-circle-left'></i> Kembali ke Bank Soal</button></a>"; ?>
    <?php echo "<a href=?modul=tambah_soal&jum=$_REQUEST[jum]&tambahan=ok&soal=$_REQUEST[soal]><button type='button' class='btn btn-warning'><i class='fa fa-plus-circle'></i> Pilihan Ganda</button></a>"; ?>
     <?php echo "<a href=?modul=tambah_soal&jum=1&pil=$_REQUEST[jum]&tambahan=ok&soal=$_REQUEST[soal]><button type='button' class='btn btn-info'><i class='fa fa-plus-circle'></i> Soal Esai</button></a>"; ?>
     <a href="soal_excel.php?idsoal=<?php echo $_REQUEST['soal']; ?>" target="_blank"><button type="button" class="btn btn-success" id="btnKosong">
     <i class='fa fa-file-excel-o  '></i> Download Excel</button></a>
    
     <?php if($sqlpakai>0||$sqlsudah>0){ ?>
     <button type="button" class="btn btn-danger" id="btnKosong" disabled><i class='fa fa-trash-o'></i> Kosongkan</button>
	 <?php } else { ?>
	 <button type="button" class="btn btn-danger" id="btnKosong" onClick="deleteItem()"><i class='fa fa-trash-o'></i> Kosongkan</button>
     <?php } ?>
	 
    </div>
    
    
    
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
	                                    <th width="3%">No.</th>
                                        <th width="5%">Soal</th>
                                        <th width="15%">Pertanyaan</th>
                                        <th width="8%">Jenis</th>	
                                        <th width="5%">Level</th>
                                        <th width="5%">Soal</th>   
                                        <th width="5%">Opsi</th>                                                                                
                                        <th width="5%">Lihat</th>                                                                             
                                        <th width="5%">Edit</th>                                            
                                        <th width="5%">Del</th>                                                                                                                          
                                 </tr>
                                </thead>
                                <tbody>
<?php
$sql0 = mysql_query("select * from cbt_soal where XKodeSoal= '$_REQUEST[soal]' order by XnomerSoal");

$no=1;

while($xadm = mysql_fetch_array($sql0)){
	if($xadm['XJenisSoal']==1){$jensoal = "Pilihan Ganda"; $warna = "black";}elseif($xadm['XJenisSoal']==2){$jensoal = "Esai";$acakopsi =""; $warna = "red";} else { $jensoal = "Unknown";}
	if($xadm['XKategori']==1){$katsoal = "Mudah";} elseif($xadm['XKategori']==2){$katsoal = "Sedang";} else { $katsoal = "Susah";}
	if($xadm['XAcakSoal']=="A"){$acaksoal = "Acak";} else { $acaksoal = "Tidak";}
	if($xadm['XAcakOpsi']=="Y"){$acakopsi = "Acak";} elseif($xadm['XAcakOpsi']=="T"){ $acakopsi = "Tidak";}	else { $acakopsi="";}

$sqlsoal = mysql_num_rows(mysql_query("select * from cbt_soal where XKodeSoal = '$xadm[XKodeSoal]'"));
$str = $xadm['XTanya'];
$soalnye = substr(strip_tags($str),0,110) . "...";
echo "<tr height=40 style='border=0; border-bottom:thin solid #dcddde'>
<td>$no</td>
<td>$xadm[XKodeSoal]</a></td>
<td>$soalnye</td>
<td><fon color=$warna>$jensoal</font></td>
<td>$katsoal</td>
<td>$acaksoal</td>
<td>$acakopsi</td>
";

if($xadm['XJenisSoal']==1){$ling = "<a href=?modul=edit_data_soal&jum=$_REQUEST[jum]&soal=$xadm[XKodeSoal]&nomer=$xadm[Urut]>";} else { 
$ling = "<a href=?modul=edit_soal_esai&jum=$_REQUEST[jum]&soal=$xadm[XKodeSoal]&nomer=$xadm[Urut]>";}
echo "
<td align=center>
<button type='button' class='btn btn-default'  data-toggle='modal' data-target='#myModalR$xadm[Urut]' alt='Lihat'><i class='fa fa-search'></i> </button>
</td><td align=center>";
?>

<?php
					$sqlsudah1 = mysql_num_rows(mysql_query("select * from cbt_jawaban where XKodeSoal = '$xadm[XKodeSoal]' and XNomerSoal = '$xadm[XNomerSoal]'"));
					if($sqlsoal==0){$katakosong="disabled";}  else {$katakosong="";}	
					if($sqlsudah>0||$sqlpakai>0){$katasudah="disabled";}  else {$katasudah="";}			
					if($sqlpakai>0){$katapakai="disabled";}  else {$katapakai="";}	
 
if($sqlpakai>0||$sqlsudah1>0){ 
echo "
<button type='button' class='btn btn-info' disabled><i class='fa fa-edit'></i></button></a>&nbsp;
</td>
<td align=center>
<button type='button' class='btn btn-danger' disabled><i class='fa fa-times'></i></button></a>
"; 

} else {
echo "
$ling
<button type='button' class='btn btn-info'><i class='fa fa-edit'></i></button></a>&nbsp;
</td>
<td align=center><a href=?modul=edit_soal&aksi=hapus&jum=$_REQUEST[jum]&soal=$xadm[XKodeSoal]&nomer=$xadm[Urut]>
<button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button></a>
"; 
}
?>
<?php echo "</td></tr>"; ?>  

<div class="modal fade" id="myModalR<?php echo $xadm['Urut']; ?>" role="dialog">
    <div class="modal-dialog">
<div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title page-label">Preview Soal</h1>
                </div>
                <div class="panel-body">
                    <div class="inner-content">
                        <div class="row" style="background-color:#fff">
                            
                            <div class="col-xs-12">
                                <div class="wysiwyg-content" style="width:100%">
									<?php 
									
									if(isset($jumz)){echo "anu $jumz";} 
									//echo "select * from cbt_soal where XKodeSoal = '$xadm[XKodeSoal]' and Urut = '$xadm[Urut]'";
									$sqlprev = mysql_query("select * from cbt_soal where XKodeSoal = '$xadm[XKodeSoal]' and Urut = '$xadm[Urut]'");
									$sp = mysql_fetch_array($sqlprev);
									$js = $sp['XJenisSoal'];
																	
									if(!$sp['XGambarTanya']==''){$gambarsoalnye = "<img src='../../pictures/$sp[XGambarTanya]' width='60%' align=center><br>";}
										else {$gambarsoalnye = "";}
									if(!$sp['XAudioTanya']==''){$audiosoalnye = "$sp[XAudioTanya]<br>";} else {$audiosoalnye = "";}
									if(!$sp['XVideoTanya']==''){$videosoalnye = "$sp[XVideoTanya]<br>";} else {$videosoalnye = "";}


								
									if(str_replace(" ","",$sp['XGambarJawab1'])==''){$ambilfile1 = "";}else{									
										if(file_exists("../../pictures/$sp[XGambarJawab1]")){$ambilfile1 = "<img src=../../pictures/$sp[XGambarJawab1] width='100px'>";} else 
										{$ambilfile1 = "<img src=images/kross.png> $sp[XGambarJawab1] tidak belum diUpload";}
									}
									if(str_replace(" ","",$sp['XGambarJawab2'])==''){$ambilfile2 = "";}else{									
										if(file_exists("../../pictures/$sp[XGambarJawab2]")){$ambilfile2 = "<img src=../../pictures/$sp[XGambarJawab2] width='100px'>";} else 
										{$ambilfile2 = "<img src=images/kross.png> $sp[XGambarJawab2] tidak belum diUpload";}
									}
									if(str_replace(" ","",$sp['XGambarJawab3'])==''){$ambilfile3 = "";}else{									
										if(file_exists("../../pictures/$sp[XGambarJawab3]")){$ambilfile3 = "<img src=../../pictures/$sp[XGambarJawab3] width='100px'>";} else 
										{$ambilfile3 = "<img src=images/kross.png> File Gambar tidak ada [Upload File]";}
									}
									if(str_replace(" ","",$sp['XGambarJawab4'])==''){$ambilfile4 = "";}else{									
										if(file_exists("../../pictures/$sp[XGambarJawab4]")){$ambilfile4 = "<img src=../../pictures/$sp[XGambarJawab4] width='100px'>";} else 
										{$ambilfile4 = "<img src=images/kross.png> File Gambar tidak ada [Upload File]";}
									}

									if(str_replace(" ","",$sp['XGambarJawab5'])==''){$ambilfile5 = "";}else{									
										if(file_exists("../../pictures/$sp[XGambarJawab5]")){$ambilfile5 = "<img src=../../pictures/$sp[XGambarJawab5] width='100px'>";} else 
										{$ambilfile5 = "<img src=images/kross.png> File Gambar tidak ada [Upload File]";}
									}
										
									
									
									if($js=='2'){$katsoal = "Esai/Uraiai";
									//echo "<p>Pertanyaan : $_REQUEST[jum] asdasd $xadm[Urut] $js</p>";		
									$soalnye = strip_tags($sp['XTanya']);							
									echo "$soalnye
									<hr>						
									<p>$gambarsoalnye</p>								
									<hr>						
									<p>Audio Soal : $audiosoalnye</p>								
									<hr>						
									<p>Video Soal : $videosoalnye</p>								
									<hr>																
									";

									} 									
									elseif($_REQUEST['jum']=='4'){ 						
									//$katsoal = "Pilihan Ganda (4 Pilihan Jawaban)";<p>Pertanyaan : $katsoal dengan Opsi Jawaban $_REQUEST[jum]</p>
										if($sp['XKunciJawaban']=='1'){$kunci1 = "<img src='images/benar.png' width=20px>";} else {$kunci1="";}
										if($sp['XKunciJawaban']=='2'){$kunci2 = "<img src='images/benar.png' width=20px>";} else {$kunci2="";}
										if($sp['XKunciJawaban']=='3'){$kunci3 = "<img src='images/benar.png' width=20px>";} else {$kunci3="";}
										if($sp['XKunciJawaban']=='4'){$kunci4 = "<img src='images/benar.png' width=20px>";} else {$kunci4="";}
										if($sp['XKunciJawaban']=='5'){$kunci5 = "<img src='images/benar.png' width=20px>";} else {$kunci5="";}
										
									$Jawab1 = str_replace("<p>","",$sp['XJawab1']);
									$Jawab1 = str_replace("</p>","",$Jawab1);									
									$Jawab2 = str_replace("<p>","",$sp['XJawab2']);
									$Jawab2 = str_replace("</p>","",$Jawab2);									
									$Jawab3 = str_replace("<p>","",$sp['XJawab3']);
									$Jawab3 = str_replace("</p>","",$Jawab3);									
									$Jawab4 = str_replace("<p>","",$sp['XJawab4']);
									$Jawab4 = str_replace("</p>","",$Jawab4);									
									$Jawab5 = str_replace("<p>","",$sp['XJawab5']);
									$Jawab5 = str_replace("</p>","",$Jawab5);									
									$soalnye = strip_tags($sp['XTanya']);							
									//echo "$soalnye";												
									echo "
									<p style='background-color:#eee; padding:10px'>$soalnye</font></p>";
									echo "
									<hr>						
									<p>$gambarsoalnye</p>								
									<hr>						
									<p>Audio Soal : $audiosoalnye</p>								
									<hr>						
									<p>Video Soal : $videosoalnye</p>								
									<hr>						
						

									<p>Jawaban  : </p>									
									<p>&#8226; $ambilfile1 $Jawab1 $kunci1</p>
									<p>&#8226; $ambilfile2 $Jawab2 $kunci2</p>									
									<p>&#8226; $ambilfile3 $Jawab3 $kunci3</p>
									<p>&#8226; $ambilfile4 $Jawab4 $kunci4</p>	
									";
									} elseif($_REQUEST['jum']=='5'){ 
										if($sp['XKunciJawaban']=='1'){$kunci1 = "<img src='images/benar.png' width=20px>";} else {$kunci1="";}
										if($sp['XKunciJawaban']=='2'){$kunci2 = "<img src='images/benar.png' width=20px>";} else {$kunci2="";}
										if($sp['XKunciJawaban']=='3'){$kunci3 = "<img src='images/benar.png' width=20px>";} else {$kunci3="";}
										if($sp['XKunciJawaban']=='4'){$kunci4 = "<img src='images/benar.png' width=20px>";} else {$kunci4="";}
										if($sp['XKunciJawaban']=='5'){$kunci5 = "<img src='images/benar.png' width=20px>";} else {$kunci5="";}
									
									$Jawab1 = str_replace("<p>","",$sp['XJawab1']);
									$Jawab1 = str_replace("</p>","",$Jawab1);									
									$Jawab2 = str_replace("<p>","",$sp['XJawab2']);
									$Jawab2 = str_replace("</p>","",$Jawab2);									
									$Jawab3 = str_replace("<p>","",$sp['XJawab3']);
									$Jawab3 = str_replace("</p>","",$Jawab3);									
									$Jawab4 = str_replace("<p>","",$sp['XJawab4']);
									$Jawab4 = str_replace("</p>","",$Jawab4);									
									$Jawab5 = str_replace("<p>","",$sp['XJawab5']);
									$Jawab5 = str_replace("</p>","",$Jawab5);	
									$katsoal = "Pilihan Ganda (5 Pilihan Jawaban $js\)";	
									$soalnye = strip_tags($sp['XTanya'], '<br>');	
									$soalnye = str_replace("`","'",$soalnye);	
																	
									echo "
																
									<p style='background-color:#eee; padding:10px'>$soalnye</font></p>
									<hr>						
									<p>$gambarsoalnye</p>								
									<hr>						
									<p>Audio Soal : $audiosoalnye</p>								
									<hr>						
									<p>Video Soal : $videosoalnye</p>								
									<hr>						
									<p>Jawaban : <br>
									<ul>
									<p>&#8226; $ambilfile1 $Jawab1 $kunci1</p>
									<p>&#8226; $ambilfile2 $Jawab2 $kunci2</p>									
									<p>&#8226; $ambilfile3 $Jawab3 $kunci3</p>
									<p>&#8226; $ambilfile4 $Jawab4 $kunci4</p>	
									<p>&#8226; $ambilfile5 $Jawab5 $kunci5</p>											
									</ul></p>
									";
									}
									?>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row" style="background-color:#fff">
                        
                        <div class="col-xs-6 col-center" style="margin-left:25%">
                            <button data-bind="click: handleNotConfirm" type="submit" class="btn btn-default btn-block"  data-dismiss="modal" id="lanjut">Tutup</button></a>
                        </div>
                    </div>
                </div>
                
            </div>
</div></div>


  <script>
$('#myModal').modal('show');
</script>
  <div class="modal fade" id="lihat" tabindex="-1" role="dialog" aria-labelledby="lihat" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Image preview</h4>
      </div>
      <div class="modal-body">
        <img src="" id="imagepreview" style="width: 400px; height: 264px;" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
$no++;
}
?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                            <p></p>
                                <h4>Keterangan</h4>
                                <li>Langkah-langkah pembuatan soal<ul>
                                	<li>Membuat Bank Soal</li>
                                	<li>Upload File excel untuk soal yang sudah diisi</li>                                    
                                	<li>Edit Soal apabila dirasa perlu, seperti equation dan insert gambar (Jangan lupa pengacakan soal dan Kunci Jawaban)</li>
                                	<li>Mengaktifkan Status Bank Soal, <br>sehingga akan nampak pada halaman administrator untuk dibuat Paket Soal bersama Bank soal dari guru
                                    lain apabila akan melakukan tes pada waktu yang bersamaan.</li>
                                	<li>Generate Token oleh administrator</li>                                    
                                </ul></li>
                                <li>Bank Soal tidak bisa dihapus atau Ubah pengacakan selama Sedang AKTIF digunakan ujian (masuk dalam paket soal)</li>
                                <li>Bank Soal yang aktif disini belum bisa dipergunakan untuk ujian.</li>
                                <li>Administrator akan mengaktifkan Paket Ujian (yang terdiri dari beberapa tes) dan generate TOKEN</li>                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
    <script src="../vendor/jquery/jquery-1.12.3.js"></script>
    <script src="../vendor/jquery/jquery.dataTables.min.js"></script>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    
	
	
	});
    </script>
    <script>$(document).ready(function() {
    var table = $('#example').DataTable();
 
    $('#example tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );
} );</script>
    
 
<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Buat Bank Soal Baru</h4>
      </div>
      <div class="modal-body">
        <?php include "buat_banksoalbaru.php";?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>




<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
!-->
<script>
	$('#myModal').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	})
	$('#myModal').on('hidden.bs.modal', function () {
	  document.location.reload();
	 // alert("tes");
	})
	
	$('#confirmModal').on('hidden.bs.modal', function () {
	  document.location.reload();
	  //alert("hapus");
	})
</script>


</body>

</html>

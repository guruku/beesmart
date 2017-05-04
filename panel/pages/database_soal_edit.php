<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
 <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-8">
 <script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
<script type="text/javascript"
  src="../../MathJax/MathJax.js?config=AM_HTMLorMML-full"></script>
<!-- script untuk refresh/reload mathjax setiap content baru !-->
   <script>
  MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
</script>
<!-- script untuk refresh/reload mathjax setiap content baru !-->
  
 <link href="src/facebox-soal.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'fb/loading.gif',
        closeImage   : 'fb/closelabel.gif'
      })
    })
  </script>

  <script>$('table').tableCheckbox({

// The class that will be applied to selected rows.
selectedRowClass: 'warning',

// The selector used to find the checkboxes on the table. 
// You may customize this in order to match your table layout
//  if it differs from the assumed one.
checkboxSelector: 'td:first-of-type input[type="checkbox"],th:first-of-type input[type="checkbox"]',

// A callback that is used to determine wether a checkbox is selected or not.
isChecked: function($checkbox) {
  return $checkbox.is(':checked');
}

});</script>

<?php
include "../../config/server.php";
?>

<?php

if(isset($_REQUEST['aksi'])&&$_REQUEST['aksi']=='hapus'){

$id=$_REQUEST['nomer'];
$sqlambil = mysql_query("select * from cbt_paketsoal where XKodeSoal = '$_REQUEST[soal]'  and Urut = '$id'");
$sa = mysql_fetch_array($sqlambil);
$jumz = $sa['XJumPilihan'];

$sql = mysql_query("select * from cbt_soal where XKodeSoal = '$_REQUEST[soal]'  and Urut = '$id'");
$s = mysql_num_rows($sql);
$soal = str_replace(" ","",$_REQUEST['soal']);
	if($s>0){
	$sql1 = "delete from cbt_soal where XKodeSoal = '$soal' and Urut = '$id'";
	mysql_query( $sql1);
	//echo "hapus no mer soal ini";
	}
}

if(isset($_REQUEST['tambahan'])){
echo "Munculkan form ini";
}
?>

<?php
$sql0 = mysql_query("select * from cbt_soal where XKodeSoal= '$_REQUEST[soal]'");
?>
<?php echo "<a href=?modul=tambah_soal&jum=$_REQUEST[jum]&tambahan=ok&soal=$_REQUEST[soal]><button type='button' class='btn btn-info'><i class='fa fa-plus-circle'></i> Tambah Soal</button></a>"; ?>
<br>
<div class="panel panel-info">
	<div class="panel-heading">
    <?php echo "<a href=?modul=daftar_soal><button type='button' class='btn btn-default'><i class='fa fa-arrow-circle-left'></i> Kembali ke Bank Soal</button></a>"; ?>
    <?php echo "<a href=?modul=tambah_soal&jum=$_REQUEST[jum]&tambahan=ok&soal=$_REQUEST[soal]><button type='button' class='btn btn-info'><i class='fa fa-plus-circle'></i> Tambah Soal</button></a>"; ?>
    </div>
	
    <div class="panel-body">
<table width="100%" border="0">
<tr>
	                                    <th width="6%">No.</th>
                                        <th width="8%">Kode</th>
                                        <th width="20%">Mata Pelajaran</th>
                                        <th width="8%">Soal</th>	
                                        <th width="8%">Kelas</th>
                                        <th width="7%">Copy</th>                                        
                                        <th width="8%">Acak</th>                                                                             
                                        <th width="7%">Upl</th>                                      
                                        <th width="8%">Edit</th>                                            
                                        <th width="8%">Status</th>                                        
                                        <th width="8%">Del</th>
</tr>
<?php
$no=1;

while($xadm = mysql_fetch_array($sql0)){
if($xadm['XJenisSoal']==1){$jensoal = "Pilihan Ganda";} else { $jensoal = "Esai";}
if($xadm['XKategori']==1){$katsoal = "Mudah";} elseif($xadm['XKategori']==2){$katsoal = "Sedang";} else { $katsoal = "Susah";}
if($xadm['XAcakSoal']=="A"){$acaksoal = "Acak";} else { $acaksoal = "Tidak";}

$sqlsoal = mysql_num_rows(mysql_query("select * from cbt_soal where XKodeSoal = '$xadm[XKodeSoal]'"));
$str = $xadm['XTanya'];
echo "<tr height=40 style='border=0; border-bottom:thin solid #dcddde'>
<td>$no</td>
<td>$xadm[XKodeSoal]</a></td>
<td>$str</td>
<td>$jensoal</td>
<td>$katsoal</td>
<td>$acaksoal</td>

<td>
<button type='button' class='btn btn-default'  data-toggle='modal' data-target='#myModalR$xadm[Urut]' alt='Lihat'><i class='fa fa-eye'></i> </button>
<a href=?modul=edit_data_soal&jum=$_REQUEST[jum]&soal=$xadm[XKodeSoal]&nomer=$xadm[Urut]>
<button type='button' class='btn btn-info'><i class='fa fa-edit'></i></button></a>&nbsp;
<a href=?modul=edit_soal&aksi=hapus&jum=$_REQUEST[jum]&soal=$xadm[XKodeSoal]&nomer=$xadm[Urut]>
<button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button></a>
"; ?>
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
                            
                            <div class="col-xs-9">
                                <div class="wysiwyg-content">
									<?php 
									
									if(isset($jumz)){echo "anu $jumz";} 
									
									$sqlprev = mysql_query("select * from cbt_soal where XKodeSoal = '$xadm[XKodeSoal]' and Urut = '$xadm[Urut]'");
									$sp = mysql_fetch_array($sqlprev);
									
									
									if(str_replace(" ","",$sp['XGambarJawab1'])==''){$ambilfile1 = "";}else{									
										if(file_exists("../../pictures/$sp[XGambarJawab1]")){$ambilfile1 = "<img src=../../pictures/$sp[XGambarJawab1] width='150px'>";} else 
										{$ambilfile1 = "<img src=images/kross.png> $sp[XGambarJawab1] tidak belum diUpload";}
									}
									if(str_replace(" ","",$sp['XGambarJawab2'])==''){$ambilfile2 = "";}else{									
										if(file_exists("../../pictures/$sp[XGambarJawab2]")){$ambilfile2 = "<img src=../../pictures/$sp[XGambarJawab2] width='150px'>";} else 
										{$ambilfile2 = "<img src=images/kross.png> $sp[XGambarJawab2] tidak belum diUpload";}
									}
									if(str_replace(" ","",$sp['XGambarJawab3'])==''){$ambilfile3 = "";}else{									
										if(file_exists("../../pictures/$sp[XGambarJawab3]")){$ambilfile3 = "<img src=../../pictures/$sp[XGambarJawab3] width='150px'>";} else 
										{$ambilfile3 = "<img src=images/kross.png> File Gambar tidak ada [Upload File]";}
									}
									if(str_replace(" ","",$sp['XGambarJawab4'])==''){$ambilfile4 = "";}else{									
										if(file_exists("../../pictures/$sp[XGambarJawab4]")){$ambilfile4 = "<img src=../../pictures/$sp[XGambarJawab4] width='150px'>";} else 
										{$ambilfile4 = "<img src=images/kross.png> File Gambar tidak ada [Upload File]";}
									}

									if(str_replace(" ","",$sp['XGambarJawab5'])==''){$ambilfile5 = "";}else{									
										if(file_exists("../../pictures/$sp[XGambarJawab5]")){$ambilfile5 = "<img src=../../pictures/$sp[XGambarJawab5] width='150px'>";} else 
										{$ambilfile5 = "<img src=images/kross.png> File Gambar tidak ada [Upload File]";}
									}
										
									
									
									if($_REQUEST['jum']=='1'){$katsoal = "Esai/Uraiai";
									echo "
									<p>Pertanyaan : $_REQUEST[jum] asdasd</p>									
									<p>$sp[XTanya]</p>";

									} 									
									elseif($_REQUEST['jum']=='4'){ 						
									$katsoal = "Pilihan Ganda (4 Pilihan Jawaban)";			
									echo "
									<p>Pertanyaan : $_REQUEST[jum]  cvbnvbn</p>									
									<p>$sp[XTanya]</p>
									<p>Jawaban : <br>
									<ul>
									<li><span>1. </span><span>$ambilfile1</span><span> $sp[XJawab1]</span></li>
									<li><span>2. </span><span>$ambilfile2</span><span> $sp[XJawab2]</span></li>									
									<li><span>3. </span><span>$ambilfile3</span><span> $sp[XJawab3]</span></li>
									<li><span>4. </span><span>$ambilfile4</span><span> $sp[XJawab4]</span></li>	
									</ul></p>
									";
									} elseif($_REQUEST['jum']=='5'){ 
									$katsoal = "Pilihan Ganda (5 Pilihan Jawaban)";			
									echo "
									<p>Pertanyaan : $_REQUEST[jum]  cvbnvbn</p>									
									<p>$sp[XTanya]</p>
									<p>Jawaban : <br>
									<ul>
									<li><span>1. </span><span>$ambilfile1</span><span> $sp[XJawab1]</span></li>
									<li><span>2. </span><span>$ambilfile2</span><span> $sp[XJawab2]</span></li>									
									<li><span>3. </span><span>$ambilfile3</span><span> $sp[XJawab3]</span></li>
									<li><span>4. </span><span>$ambilfile4</span><span> $sp[XJawab4]</span></li>	
									<li><span>5. </span><span>$ambilfile5</span><span> $sp[XJawab5]</span></li>										
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

</table>
</div></div>
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



<style>.tombol  
/* Or better yet try giving an ID or class if possible*/
{
 border: 0;
 background: #66bda8;
 box-shadow:none;
 padding:3px;
 width:50px;
 border-radius: 0px;
}</style>


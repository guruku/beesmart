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

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

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

 <?php 
 $tgljam = date("Y/m/d H:i");  
 $tgl = date("Y/m/d"); 
 ?>
  <link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>
<style type="text/css">

.custom-date-style {
	background-color: red !important;
}

.input{	
}
.input-wide{
	width: 500px;
}

</style>
<style>
.asd {
  display: inline-block;
  width: 50%;
}
</style>
<?php 
$tgx = 29;
$blx = 09;
$thx = 2016;

$tglx = date("Y/m/d");
$jamx = date("H:i:s");
?>
<script src="date/jquery.js"></script>
<script src="jquery.datetimepicker.full.js"></script>


<body>

            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Daftar Paket Tes</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <table width="100%"><tr><td>Data Paket Tes</td><td align="right">
                                        
                                        </td></tr>
							</table>
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                        	                       
                        
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
	                                    <th width="6%">No.</th>
                                        <th width="10%">Kode</th>
                                        <th width="25%">Mata Pelajaran</th>
                                        <th width="8%">Soal</th>	
                                        <th width="8%">Kelas</th>
                                        <th width="15%">Waktu</th>                                                                             
                                        <th width="8%">Sesi</th>                                                                             
                                        <th width="8%">Status</th>  
                                        <th width="8%">Jadwal</th>                                                                                
                                 </tr>
                                </thead>
                                <tbody>
                                <?php 
$sql = mysql_query("select p.*,m.*,p.Urut as Urutan,p.XKodeKelas  as kokel from cbt_paketsoal p left join cbt_mapel m on m.XKodeMapel = p.XKodeMapel where p.XStatusSoal='Y' order by p.Urut desc");
//$sql = mysql_query("select u.*,m.*,u.Urut as Urutan,u.XKodeKelas as kokel from cbt_ujian u left join cbt_mapel m on m.XKodeMapel = u.XKodeMapel left join cbt_paketsoal p on p.XKodeSoal = u.XKodeSoal where u.XStatusUjian='1'");

					while($s = mysql_fetch_array($sql)){ 
					$sqlsoal = mysql_num_rows(mysql_query("select * from cbt_soal where XKodeSoal = '$s[XKodeSoal]'"));
					$sqlpakai = mysql_num_rows(mysql_query("select * from cbt_siswa_ujian where XKodeSoal = '$s[XKodeSoal]' and XStatusUjian = '1'"));
					$sqlsudah = mysql_num_rows(mysql_query("select * from cbt_jawaban where XKodeSoal = '$s[XKodeSoal]'"));
					if($sqlsoal<1){$kata="disabled";}  else {$kata="";}	
					if($sqlsudah>0||$sqlpakai>0){$kata="disabled";}  else {$kata="";}			
					if($sqlpakai>0){$katapakai="disabled";}  else {$katapakai="";}			
							
								
$sqltes = mysql_query("select XJamUjian,XTglUjian,XStatusUjian,XSesi from cbt_ujian where XKodeSoal = '$s[XKodeSoal]' and  XKodeMapel = '$s[XKodeMapel]' and  XKodeJurusan = '$s[XKodeJurusan]' and  XKodeKelas = '$s[kokel]' and XStatusUjian='1'");		
 $stu = mysql_fetch_array($sqltes);
 $tjamujian = $stu['XJamUjian'];
 $ttglujian = $stu['XTglUjian'];
 $sttsujian = $stu['XStatusUjian'];
								?>
                                
                                    <tr class="odd gradeX">
                                        <td><input type="hidden" value="<?php echo $s['Urutan']; ?>" id="txt_mapel<?php echo $s['Urutan']; ?>"><?php echo $s['Urutan']; ?></td>
                                        <td><?php echo $s['XKodeSoal']; ?></td>
                                        <td><?php echo  $s['XKodeMapel']." ".$s['XNamaMapel']; ?></td>
                                        <td><?php echo "$sqlsoal (". $s['XJumPilihan']." opsi)"; ?></td>                                           
                                        <td><?php echo $s['kokel']." | ".$s['XKodeJurusan']."."; ?></td> 
                                        <td><?php echo "$ttglujian $tjamujian"; ?></td>
                                        <td align="center">
                                        <!--
                                        <?php if($s['XAcakSoal']=="Y"){ ?>
                                        <input type="button" class="btn btn-success btn-small" id="acak<?php echo $s['Urutan']; ?>"  <?php echo $kata; ?>
                                         value="Acak">
                                         <?php } else { ?>
                                         <input type="button" class="btn btn-warning btn-small" id="acak<?php echo $s['Urutan']; ?>"  <?php echo $kata; ?>
                                         value="Tidak">
                                         <?php } ?>
                                         !-->
                                         
                                         <?php echo "$stu[XSesi]"; ?>
                                        </td>
                                        <td>													
                                        <?php if($sttsujian=="1"){ ?>
                                        <input type="button" id="simpan<?php echo $s['Urutan']; ?>" class="btn btn-success" value="Aktif"  <?php echo $katapakai; ?> disabled>
                                        <?php } else { ?>
                                        <input type="button" id="simpan<?php echo $s['Urutan']; ?>" class="btn btn-default" value="Non Aktif">                                        <?php } ?>
                                        </td>     
                                        
                                        <td>					
                                        <a href="?modul=edit_tes&idtes=<?php echo $s['Urutan']; ?>">
                                       <button type="button" class="btn btn-info btn-small">
                                        <i class="fa fa-clock-o  ">&nbsp;Set</i></button></a>
                                        
<!--                                        <button type="button" class="btn btn-info btn-small"  data-toggle="modal" 
                                        data-target="#myJadwal<?php echo $s['Urutan']; ?>" id="jadwal<?php echo $s['Urutan']; ?>">
                                        <i class="fa fa-clock-o  ">&nbsp;Set</i></button>!-->								
                                      
                                        </td>     
                                                                                                              
                                    </tr>
<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/
$.noConflict();
jQuery( document ).ready(function( $ ) {
$.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
	$("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
	$.datetimepicker.setLocale($(e.currentTarget).val());
});

$('#datetimepicker<?php echo $s['Urutan']; ?>').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'1986/01/05'
});
$('#datetimepicker<?php echo $s['Urutan']; ?>').datetimepicker({value:'2015/04/15 05:03',step:10});
$('.some_class').datetimepicker();
$('#default_datetimepicker<?php echo $s['Urutan']; ?>').datetimepicker({
	formatTime:'H:i',
	//formatDate:'d.m.Y',
	formatDate:'Y.m.d',
	//defaultDate:'8.12.1986', // it's my birthday
	defaultDate:'+03.01.1970', // it's my birthday
	defaultTime:'10:00',
	timepickerScrollbar:false
});
$('#datetimepicker10').datetimepicker({
	step:5,
	inline:true
});
$('#datetimepicker_mask<?php echo $s['Urutan']; ?>').datetimepicker({
	mask:'9999/19/39 29:59'
});
$('#datetimepicker_mask<?php echo $s['Urutan']; ?>').datetimepicker({value:'<?php echo "$tglx $jamx"; ?>',step:10});
$('#datetimepicker_dark').datetimepicker({theme:'dark'})
        }); 
</script>                                    
<script>    
$(document).ready(function(){
	$("#txt_durasi<?php echo $s['Urutan']; ?>").change(function(){
		var txt_durasi = $("#txt_durasi<?php echo $s['Urutan']; ?>").val();
		$.ajax({
		url: "ambil_token.php",
		data: "txt_ujian="+txt_durasi,
		cache: false,
		success: function(msg){
		$("#txt_token<?php echo $s['Urutan']; ?>").val(msg);
		}
		});
	});

 $("#kirim<?php echo $s['Urutan']; ?>").click(function(){
 //alert("tes");
 var txt_ujian = $("#txt_ujian<?php echo $s['Urutan']; ?>").val();
 var txt_semester = $("#txt_semester<?php echo $s['Urutan']; ?>").val();
 var txt_waktu = $("#datetimepicker_mask<?php echo $s['Urutan']; ?>").val();
 var txt_token = $("#txt_token<?php echo $s['Urutan']; ?>").val();
 var txt_durasi = $("#txt_durasi<?php echo $s['Urutan']; ?>").val();
 var txt_telat = $("#txt_telat<?php echo $s['Urutan']; ?>").val();
 var txt_kodesoal = $("#txt_kodesoal<?php echo $s['Urutan']; ?>").val();
 var txt_sesi = $("#txt_sesi<?php echo $s['Urutan']; ?>").val();
 
 
 if(txt_durasi==""){
 alert("Durasi Ujian masih KOSONG");
 return false;
 }
 else if(txt_telat>txt_durasi){
 alert("Keterlambatan tidak boleh melebihi Durasi");
 return false;
 }
  
 $.ajax({
     type:"POST",
     url:"simpan_jadwal.php",    
     data: "aksi=simpan&txt_ujian=" + txt_ujian + "&txt_waktu=" + txt_waktu + "&txt_token=" + txt_token + "&txt_telat=" + txt_telat + "&txt_durasi=" + txt_durasi
	  + "&txt_kodesoal=" + txt_kodesoal + "&txt_semester=" + txt_semester + "&txt_sesi=" + txt_sesi,
	 success: function(data){
	  $("#infoz").html(data);
	  document.getElementById("ndelik").style.display = "block";
	  //alert(txt_waktu);
		//tampildata();
	 }
	 });
	 });
	

});
</script>                            
                                           
<script>    
$(document).ready(function(){
$("#simpan<?php echo $s['Urutan']; ?>").click(function(){
//alert("<?php echo $s['Urutan']; ?>");
 var txt_ujian = $("#txt_ujian").val();
 var txt_jawab = $("#txt_jawab").val();
 var txt_acak = $("#switch_left").val();
 var txt_durasi = $("#txt_durasi").val();
 var txt_telat = $("#txt_telat").val();
 var txt_soal = $("#txt_soal").val();  
 var txt_mapel = $("#txt_mapel<?php echo $s['Urutan']; ?>").val();
 var txt_level = $("#txt_level").val(); 
 var txt_nama = $("#txt_nama").val();  
 var txt_sesi = $("#txt_sesi").val();    
 $.ajax({
     type:"POST",
     url:"simpan_soal.php",    
     data: "aksi=simpan&txt_ujian=" + txt_ujian + "&txt_jawab=" + txt_jawab + "&txt_acak=" + txt_acak + "&txt_telat=" + txt_telat + "&txt_durasi=" + txt_durasi + "&txt_soal=" + txt_soal + "&txt_level=" + txt_level + "&txt_mapel=" + txt_mapel + "&txt_nama=" + txt_nama + "&txt_sesi=" + txt_sesi,
	 success: function(data){
		if( $("#simpan<?php echo $s['Urutan']; ?>").hasClass( "btn-success" ) )
		{
		 $("#simpan<?php echo $s['Urutan']; ?>").removeClass("btn-success").addClass("btn-default");
		 $("#simpan<?php echo $s['Urutan']; ?>").val("Non Aktif");
		} else {	 	
	 	 $("#simpan<?php echo $s['Urutan']; ?>").removeClass("btn-info").addClass("btn-success");
		 $("#simpan<?php echo $s['Urutan']; ?>").val("Aktif");		 

		}
	  document.location.reload();
		loading.fadeOut();
		tampilkan.html(data);
		tampilkan.fadeIn(100);
	 tampildata();
	 }
	 });
	 });
	 
$("#acak<?php echo $s['Urutan']; ?>").click(function(){
//alert("<?php echo $s['Urutan']; ?>");
 var txt_ujian = $("#txt_ujian").val();
 var txt_jawab = $("#txt_jawab").val();
 var txt_acak = $("#switch_left").val();
 var txt_durasi = $("#txt_durasi").val();
 var txt_telat = $("#txt_telat").val();
 var txt_soal = $("#txt_soal").val();  
 var txt_mapel = $("#txt_mapel<?php echo $s['Urutan']; ?>").val();
 var txt_level = $("#txt_level").val(); 
 var txt_nama = $("#txt_nama").val(); 
 var txt_sesi = $("#txt_sesi").val();  
  
 $.ajax({
     type:"POST",
     url:"simpan_soal.php",    
     data: "aksi=acak&txt_ujian=" + txt_ujian + "&txt_jawab=" + txt_jawab + "&txt_acak=" + txt_acak + "&txt_telat=" + txt_telat + "&txt_durasi=" + txt_durasi + "&txt_soal=" + txt_soal + "&txt_level=" + txt_level + "&txt_mapel=" + txt_mapel + "&txt_nama=" + txt_nama + "&txt_sesi=" + txt_sesi,
	 success: function(data){

		if( $("#acak<?php echo $s['Urutan']; ?>").hasClass( "btn-success" ) )
		{
		 $("#acak<?php echo $s['Urutan']; ?>").removeClass("btn-success").addClass("btn-warning");
		 $("#acak<?php echo $s['Urutan']; ?>").val("Tidak");
		} else {	 	
	 	 $("#acak<?php echo $s['Urutan']; ?>").removeClass("btn-warning").addClass("btn-success");
		 $("#acak<?php echo $s['Urutan']; ?>").val("Acak");
		}

		loading.fadeOut();
		tampilkan.html(data);
		tampilkan.fadeIn(100);
	 tampildata();
	 }
	 });
	 });	 


$("#hapus<?php echo $s['Urutan']; ?>").click(function(){
//	 alert("<?php echo $s['Urutan']; ?>");
 var txt_ujian = $("#txt_ujian").val();
 var txt_jawab = $("#txt_jawab").val();
 var txt_acak = $("#switch_left").val();
 var txt_durasi = $("#txt_durasi").val();
 var txt_telat = $("#txt_telat").val();
 var txt_soal = $("#txt_soal").val();  
 var txt_mapel = $("#txt_mapel<?php echo $s['Urutan']; ?>").val();
 var txt_level = $("#txt_level").val(); 
  var txt_nama = $("#txt_nama").val();  
  
 $.ajax({
     type:"POST",
     url:"hapus_soal.php",    
     data: "aksi=hapus&txt_ujian=" + txt_ujian + "&txt_jawab=" + txt_jawab + "&txt_acak=" + txt_acak + "&txt_telat=" + txt_telat + "&txt_durasi=" + txt_durasi + "&txt_soal=" + txt_soal + "&txt_level=" + txt_level + "&txt_mapel=" + txt_mapel + "&txt_nama=" + txt_nama,
	 success: function(data){

		loading.fadeOut();
		tampilkan.html(data);
		tampilkan.fadeIn(100);
	 tampildata();
	 }
	 });
	 });

$('#btnDelete<?php echo $s['Urutan']; ?>').on('click', function(e){
    confirmDialog("Apakah yakin akan menghapus Bank Soal ini? ", function(){
        //My code to delete
		var txt_ujian = $("#txt_ujian").val();
 var txt_jawab = $("#txt_jawab").val();
 var txt_acak = $("#switch_left").val();
 var txt_durasi = $("#txt_durasi").val();
 var txt_telat = $("#txt_telat").val();
 var txt_soal = $("#txt_soal").val();  
 var txt_mapel = $("#txt_mapel<?php echo $s['Urutan']; ?>").val();
 var txt_level = $("#txt_level").val(); 
  var txt_nama = $("#txt_nama").val();  
  
 $.ajax({
     type:"POST",
     url:"hapus_soal.php",    
     data: "aksi=hapus&txt_ujian=" + txt_ujian + "&txt_jawab=" + txt_jawab + "&txt_acak=" + txt_acak + "&txt_telat=" + txt_telat + "&txt_durasi=" + txt_durasi + "&txt_soal=" + txt_soal + "&txt_level=" + txt_level + "&txt_mapel=" + txt_mapel + "&txt_nama=" + txt_nama,
	 success: function(data){
	  document.location.reload();
	 // alert("hapus");

		loading.fadeOut();
		tampilkan.html(data);
		tampilkan.fadeIn(100);
	 tampildata();
	 }
	 });
    });
});

function confirmDialog(message, onConfirm){
    var fClose = function(){
        modal.modal("hide");
    };
    var modal = $("#confirmModal");
    modal.modal("show");
    $("#confirmMessage").empty().append(message);
    $("#confirmOk").one('click', onConfirm);
    $("#confirmOk").one('click', fClose);
    $("#confirmCancel").one("click", fClose);
}



});


</script>
<script>
function myFunction() {
   document.location.reload();
}
</script>
                                 
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

<div class="modal fade" id="myJadwal<?php echo $s['Urutan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
     						 
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Setting Jadwal Ujian</h4>
      </div>
      <div class="modal-body">
        
							<div id="infoz" class="infoz"></div>
                            
                                    
        <p> <span class="asd" class="asd">Entry Nama Paket Tes </span><span>: 
                            <select id="txt_ujian<?php echo $s['Urutan']; ?>">
                             <?php 
							 $sqlkelas = mysql_query("select * from cbt_tes order by Urut");
							 while($k = mysql_fetch_array($sqlkelas)){
                             echo "<option value='$k[XKodeUjian]'>$k[XNamaUjian]</option>";
							 }
							 ?>
                             </select>
        </span></p>                 	
        
        <p> <span class="asd" class="asd">Semester</span><span>: 
                            <select id="txt_semester<?php echo $s['Urutan']; ?>">
                             <?php 
                             echo "<option value='1'>1</option>";
                             echo "<option value='2'>2</option>";

							 ?>
                             </select>
        </span></p>                 	

        <p> <span class="asd" class="asd">Sesi Ujian</span><span>: 
                            <select id="txt_sesi<?php echo $s['Urutan']; ?>">
                             <?php 
							 $sqlsesi = mysql_query("select * from cbt_siswa group by XSesi");
							 while($sk = mysql_fetch_array($sqlsesi)){
                             echo "<option value='$sk[XSesi]'>$sk[XSesi]</option>";
							 }
							 ?>
                             </select>
        </span></p>                 	


         <p> <span class="asd" class="asd">Waktu Pelaksanaan </span><span>: 
         <input type="text" value="" id="datetimepicker_mask<?php echo $s['Urutan']; ?>"/></span></p>
		 <p> <span class="asd" class="asd">Durasi Tes </span><span>: <input type="text" size="3" id="txt_durasi<?php echo $s['Urutan']; ?>"> menit </span></p>
		 <p> <span class="asd" class="asd">
                                    Maksimum Keterlambatan </span><span>: <input type="text" size="3" id="txt_telat<?php echo $s['Urutan']; ?>">
                                    <input type="hidden" size="3" id="txt_kodesoal<?php echo $s['Urutan']; ?>" value="<?php echo $s['XKodeSoal']; ?>">
                                     menit </span><font color="#cd0202">*</font></p>
 		 <p> <span class="asd" class="asd">Token </span><span>: <input type="text" size="10" id="txt_token<?php echo $s['Urutan']; ?>"></span></p>
          <p> <span class="asd" class="asd"> </span><button type="button" class="btn btn-info btn-small" id="kirim<?php echo $s['Urutan']; ?>"> Rilis Token </i></button> 		</span></p>
       
       <div style="background-color:#f2f1e8; padding:5px;"> 
       <p><font color="#cd0202">* Perhatian </font></p>
       <p>- Kosongkan untuk Disable Waktu Keterlambatan (Timer dihitung saat Klik)</p>
       <p>- Bila waktu keterlambatan melebihi durasi akan dianggap sama seperti Durasi</p>
       </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="myFunction()">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>

                              <?php } ?>
                                   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
<li><font color="#FF0033">*Bank Soal Yang dipakai Seluruh Kelas dan Jurusan harus berdiri sendiri. TIDAK BOLEH AKTIF dengan Bank Soal lain</font></li>
<li>Beberapa ujian (untuk Kelas dan Jurusan berbeda) bisa di setting waktu bersamaan. </li>
<li>Apabila Satu kelas ada beberapa Tes bersamaan (untuk kelas dan jurusan yang sama). 
Akan mengakibatkan Peserta tidak dapat mengikuti Ujian (* Terlambat mengikuti Ujian)</li>
<li>Daftar diatas merupakan Paket Soal yang sudah diaktifkan oleh Guru. Silahkan melakukan pengaturan Jadwal ujian (Klik tombol 'Set' pada Menu Jadwal)</li>
                                
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


  <!-- Button trigger modal -->
  <!-- Modal -->
  <!-- Modal

                            

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
</script> -->


</body>

</html>

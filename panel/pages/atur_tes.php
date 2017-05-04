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
                    <h3 class="page-header">Status Tes</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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

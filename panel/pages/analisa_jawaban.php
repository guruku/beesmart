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
<body>
<?php include "../../config/server.php"; ?>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Hasil dan Analisa Soal</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <table width="100%"><tr><td><a href="?modul=analisasoal"><button class="btn btn-default">
                            <i class="fa fa-arrow-circle-left"></i> Kembali ke Daftar</button></a> Daftar Peserta Ujian</td><td align="right">
                           
                           <a href=?modul=analisabutir&soal=<?php echo $_REQUEST['soal']; ?>><button type="button" class="btn btn-primary btn-small">
                           <i class="fa fa-file-text"></i> Analisa Butir Soal </button></a>
                           
                           <a href=?modul=rekapesai&soal=<?php echo $_REQUEST['soal']; ?>><button type="button" class="btn btn-success btn-small">
                           <i class="fa fa-file-text"></i> Rekap Jawaban Esai </button></a>
                           <!--
                            <a href="?modul=sebaran_nilai&soal=<?php echo $_REQUEST['soal']; ?>"><button class="btn btn-info">
                            <i class="fa fa-bar-chart-o  "></i> Sebaran Nilai</button></a>!-->

                           </td></tr>
							</table>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        		
                        
                        
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
	                                    <th width="7%">No.</th>
                                        <th width="10%">No.Ujian</th>
                                        <th width="7%">Ujian</th>
                                        <th width="27%">Nama</th>
                                        <th width="8%">Kelas</th>
                                        <th width="8%">Jur.</th>
                                        <th width="8%">Token</th>                                           
                                        <th width="8%">Esai</th>
                                        <th width="8%">Nilai</th>                                        
                                        <th width="8%">Hasil</th>                                          
                                                                                                                          
                                 </tr>
                                </thead>
                                <tbody>
                                <?php 
								$sql = mysql_query("select * from cbt_siswa_ujian c left join cbt_siswa s on s.XNomerUjian = c.XNomerUjian  
									left join cbt_ujian u on u.XTokenUjian = c.XTokenUjian  where c.XKodeSoal = '$_REQUEST[soal]'");
								$so = 1;
								while($s = mysql_fetch_array($sql)){ 
					$sqlsoal = mysql_num_rows(mysql_query("select * from cbt_soal where XKodeSoal = '$s[XKodeSoal]'"));
					$sqlpakai = mysql_num_rows(mysql_query("select * from cbt_nilai where XKodeSoal = '$s[XKodeSoal]'"));
					
					
						$sqljumlahx = mysql_query("select sum(XNilaiEsai) as hasil from cbt_jawaban where XKodeSoal = '$s[XKodeSoal]' and XUserJawab = 
						'$s[XNomerUjian]' and XTokenUjian = '$s[XTokenUjian]'");
						$o = mysql_fetch_array($sqljumlahx);
						$cekjum = mysql_num_rows($sqljumlahx);
						$nilaiawal = round($o['hasil'],2);

								?>
                                
                                    <tr class="odd gradeX">
                                        <td><input type="hidden" value="<?php echo $s['Urutan']; ?>" id="txt_mapel<?php echo $s['Urut']; ?>">
                                        <?php echo $so; ?></td>
                                        <td><?php echo $s['XNomerUjian']; ?></td>
                                        <td align="center"><?php echo $s['XKodeUjian']; ?></td>
                                        <td><?php echo $s['XNamaSiswa']; ?></td>                                      
                                        <td align="center"><?php echo $s['XKodeKelas']; ?></td>                                         
                                        <td align="center"><?php echo $s['XKodeJurusan']; ?></td>
                                        <td align="center"><?php echo $s['XTokenUjian']; ?></td>
                                        <td align="center"><?php echo $nilaiawal; ?></td>                                        
                                        <td align="center"><a href=?modul=lks&soal=<?php echo $s['XKodeSoal']; ?>&siswa=<?php echo $s['XNomerUjian']; ?>&token=<?php echo $s['XTokenUjian']; ?>>
                                        <button type="button" class="btn btn-info btn-small"><i class="fa fa-file-text-o"></i></button></a></td>		

										<td align="center"><a href=?modul=jawabansiswa&soal=<?php echo $s['XKodeSoal']; ?>&siswa=<?php echo $s['XNomerUjian']; ?>&token=<?php echo $s['XTokenUjian']; ?>>
                                        <button type="button" class="btn btn-success btn-small"><i class="fa fa-edit"></i></button></a></td>                                        
                                    </tr>
  <!-- Button trigger modal -->
  <!-- Modal -->
                            <div class="modal fade" id="myModal<?php echo $s['XNomerUjian']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><?php echo "Peserta Ujian : $s[XNomerUjian]"; ?></h4>
                                        </div>
                                        <div class="modal-body" style="text-align:center">
                                        
                                               <?php 
												if(file_exists("../../fotosiswa/$s[XFoto]")&&!$gbr==''){ ?>
                                                <img src="../../fotosiswa/<?php echo $s['XFoto']; ?>" width="400px">
                                                <?php 
												} else {
												echo "<img src=../../fotosiswa/nouser.png>";
												}
												?>
                                       

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal --> 
                            
                                           
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
  
 $.ajax({
     type:"POST",
     url:"simpan_soal.php",    
     data: "aksi=simpan&txt_ujian=" + txt_ujian + "&txt_jawab=" + txt_jawab + "&txt_acak=" + txt_acak + "&txt_telat=" + txt_telat + "&txt_durasi=" + txt_durasi + "&txt_soal=" + txt_soal + "&txt_level=" + txt_level + "&txt_mapel=" + txt_mapel + "&txt_nama=" + txt_nama,
	 success: function(data){
		if( $("#simpan<?php echo $s['Urutan']; ?>").hasClass( "btn-success" ) )
		{
		 $("#simpan<?php echo $s['Urutan']; ?>").removeClass("btn-success").addClass("btn-default");
		 $("#simpan<?php echo $s['Urutan']; ?>").val("Non Aktif");
		} else {	 	
	 	 $("#simpan<?php echo $s['Urutan']; ?>").removeClass("btn-info").addClass("btn-success");
		 $("#simpan<?php echo $s['Urutan']; ?>").val("Aktif");		 
		}
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
  
 $.ajax({
     type:"POST",
     url:"simpan_soal.php",    
     data: "aksi=acak&txt_ujian=" + txt_ujian + "&txt_jawab=" + txt_jawab + "&txt_acak=" + txt_acak + "&txt_telat=" + txt_telat + "&txt_durasi=" + txt_durasi + "&txt_soal=" + txt_soal + "&txt_level=" + txt_level + "&txt_mapel=" + txt_mapel + "&txt_nama=" + txt_nama,
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
                              <?php 
							  $so++;
							  } ?>
                                   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                            <p></p>
                                <h4>Keterangan</h4>
                                <li>Download File Excel (Rekap Hasil Ujian) DISABLE, apabiila <ul>
                                	<li>Belum ada peserta yang mengambil tes</li>
                                	<li>Belum ada soal pada Tes</li>                                    
                                </ul></li>
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
    
</body>

</html>

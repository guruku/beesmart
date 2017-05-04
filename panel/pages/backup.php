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
<?php 
if(!empty($_REQUEST['datax'])&&$_REQUEST['datax']=="ujian"){
include "../../database/cbt_ujian.php";
}
if(!empty($_REQUEST['datax'])&&$_REQUEST['datax']=="siswa"){
include "../../database/cbt_siswa.php";
}
if(!empty($_REQUEST['datax'])&&$_REQUEST['datax']=="semua"){
include "../../database/cbt_semua.php";
}
?>
<?php include "../../config/server.php"; ?>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Backup Database</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <table width="100%"><tr><td>Daftar Tabel</td><td align="right">
                            </td></tr>
							</table>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
<br /><div class="alert alert-info" >
                                
                                Tombol &nbsp; <button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button> 
                                &nbsp; : selain Backup, juga akan menghapus semua table yang berkaitan dengan Pilihan Jenis Data<br> 
                                Lokasi file Backup, Silahkan Lihat folder C:/CBT_BEESMART/
                            </div>                        		
                        
                        
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
	                                    <th width="10%">No.</th>
                                        <th width="60%">Jenis Data</th>
                                        <th width="15%">Backup </th>                                           
                                        <th width="15%">Hapus </th>    
                                                                                                                          
                                 </tr>
                                </thead>
                                <tbody>
                                                                
                                    <tr class="odd gradeX">
                                        <td>1<input type="hidden" value="<?php echo $s['Urutan']; ?>" id="txt_mapel<?php echo $s['Urutan']; ?>"></td>
                                        <td>Backup Mapel, Kelas, Siswa </td>
                                        <td align="center"><a href="?modul=backup&datax=siswa&aksi=1">
                                        <button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></a></td>
                                        <td align="center"><a href="?modul=backup&datax=siswa&aksi=2">
                                        <button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button></a></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>2<input type="hidden" value="<?php echo $s['Urutan']; ?>" id="txt_mapel<?php echo $s['Urutan']; ?>"></td>
                                        <td>Backup Soal dan Jawaban</td>
                                        <td align="center"><a href="?modul=backup&datax=ujian&aksi=1">
                                        <button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></a></td>
                                        <td align="center"><a href="?modul=backup&datax=ujian&aksi=2">
                                        <button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button></a></td>
                                    </tr>

                                    <tr class="odd gradeX">
                                        <td>3<input type="hidden" value="<?php echo $s['Urutan']; ?>" id="txt_mapel<?php echo $s['Urutan']; ?>"></td>
                                        <td>Backup Database</td>
                                        <td align="center"><a href="?modul=backup&datax=semua&aksi=1">
                                        <button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></a></td>
                                        <td align="center"><a href="?modul=backup&datax=semua&aksi=2">
                                        <button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button></a></td>
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
                                           

                                  
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>Restore Database</h4>
<br>
                                	<form action="?modul=restore" method="post">
                           <table><tr><td><input type="file" id="anu" name="anu"></td><td>
                           <button type="submit" class="btn btn-info btn-small" ><i class="fa fa-plus-circle"></i> Restore</button>
                           </td></tr></table>
                            </form>                                  

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

<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
include "../../config/server.php";
if(isset($_REQUEST['aksi'])){
//echo "delete from cbt_kelas where Urut = '$_REQUEST[urut]'";
$sql = mysql_query("delete from cbt_mapel where Urut = '$_REQUEST[urut]'");
}
if(isset($_REQUEST['simpan'])){

	$sql = mysql_query("update cbt_mapel set XKodeMapel = '$_REQUEST[txt_kokel]', XNamaMapel = '$_REQUEST[txt_nakel]', XPersenUH = '$_REQUEST[txt_UH]',
	XPersenUTS = '$_REQUEST[txt_UTS]',XPersenUAS = '$_REQUEST[txt_UAS]',XKKM = '$_REQUEST[txt_KKM]',XMapelAgama='$_REQUEST[txt_mapelagama]'  where Urut = '$_REQUEST[id]'");

}
if(isset($_REQUEST['tambah'])){

$sqlcek = mysql_num_rows(mysql_query("select * from cbt_mapel where XKodeMapel = '$_REQUEST[txt_kokel]'"));
	if($sqlcek>0){
	$message = "Kode Mapel SUDAH ADA";
	echo "<script type='text/javascript'>alert('$message');</script>";
	} else {
	$sql = mysql_query("insert into cbt_mapel (XKodeMapel, XNamaMapel, XPersenUH,
	XPersenUTS,XPersenUAS ,XKKM,XMapelAgama) values ('$_REQUEST[txt_kokel]','$_REQUEST[txt_nakel]','$_REQUEST[txt_UH]','$_REQUEST[txt_UTS]','$_REQUEST[txt_UAS]','$_REQUEST[txt_KKM]','$_REQUEST[txt_mapelagama]')");
	}
}

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

<body>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Mata Pelajaran</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Mata Pelajaran  
<?php echo "<a href='#myTam' id='custId' data-toggle='modal' data-id=''>"; ?>
<button type="button" class="btn btn-info btn-small" ><i class="fa fa-plus-circle"></i> 
Tambah Mapel</button>
<?php echo "</a>";?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
	                                    <th width="7%">No.</th>
                                        <th width="10%">Kode</th>
                                        <th width="20%">Mata Pelajaran</th>
                                        <th width="10%">% Harian</th> 
                                        <th width="10%">% UTS</th>                                        
                                        <th width="10%">% UAS</th>                                        
                                        <th width="7%">KKM</th>
                                        <th width="10%">Agama</th>
                                        <th width="13%">Aksi</th>                                    
                                                                                                                                                                
                                 </tr>
                                </thead>
                                <tbody>
                                <?php 
								$sql = mysql_query("select * from cbt_mapel order by Urut");
								while($s = mysql_fetch_array($sql)){ 
								?>
                                
                                    <tr class="odd gradeX">
                                        <td><input type="hidden" value="<?php echo $s['Urut']; ?>" id="txt_mapel<?php echo $s['Urut']; ?>"><?php echo $s['Urut']; ?></td>
                                        <td><?php echo $s['XKodeMapel']; ?></td>
                                        <td><?php echo $s['XNamaMapel']; ?></td>
                                        <td><?php echo $s['XPersenUH']; ?></td> 
                                        <td><?php echo $s['XPersenUTS']; ?></td>
                                        <td><?php echo $s['XPersenUAS']; ?></td>
                                        <td><?php echo $s['XKKM']; ?></td>      
                                        <td><?php echo $s['XMapelAgama']; ?></td>                      
										<?php echo "<td><a href='#myModal' id='custId' data-toggle='modal' data-id=".$s['Urut'].">"; ?>
                                        <button type="button" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button></a>
                                        <a href="?modul=daftar_mapel&aksi=hapus&urut=<?php echo $s['Urut']; ?>">
                                        <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "></i></button></a></td>                                                                                                                                                           
                                    </tr>
  <!-- Button trigger modal -->
         
                                                     
                                <?php } ?>
                                   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                            <p></p>
                                <h4>CBT BEESMART </h4>
                                <p>
                                </p>
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


    
<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Data Mapel</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    
<div class="modal fade" id="myTam" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah  Data Mapel</h4>
                </div>
                <div class="modal-body">
        <!-- MEMBUAT FORM -->
        <form action="?modul=daftar_mapel&tambah=yes" method="post">

            <div class="form-group">
 				<table width="100%" border="0" cellpadding="5px" cellspacing="5px">
                <tr>
                <td><label>Kode Mapel</label></td>
                <td>&nbsp;</td>
                <td><label>Nama Mapel</label></td>
                <td>&nbsp;</td>
                <td><label>Mapel Agama</label></td>
                <td>&nbsp;</td>
                </tr>
				<tr><td>
                <input type="text" class="form-control" name="txt_kokel">                
                </td><td>&nbsp;</td><td>
                <input type="text" class="form-control" name="txt_nakel">                
                </td>
                </td><td>&nbsp;</td><td>
                <select id="txt_mapelagama"  name="txt_mapelagama" class="form-control" >
								<option value='N' class='form-control' >MAPEL UMUM</option>
								<option value='Y' class='form-control' >PEMINATAN</option>                                
								<option value='A' class='form-control' >PEND. AGAMA</option>                                
                                </select>                 
                </td>
                </tr>
                </table>
			</div>
<hr />
            <div class="form-group">
  				<table width="100%" border="0" cellpadding="5px" cellspacing="5px">
                <tr>
                <td><label>Persen Harian</label></td>
                <td>&nbsp;</td>
                <td><label>Persen UTS </label></td>
                <td>&nbsp;</td>
                <td><label>Persen UAS</label></td>
                <td>&nbsp;</td>
                <td><label>Nilai KKM </label></td>
                <td>&nbsp;</td>
                </tr>
				<tr>
                <td>
                <input type="text" class="form-control" name="txt_UH">                
                </td><td>&nbsp;</td><td>
                <input type="text" class="form-control" name="txt_UTS">                
                </td>
                </td><td>&nbsp;</td>
                <td>
                <input type="text" class="form-control" name="txt_UAS">                
                </td><td>&nbsp;</td><td>
                <input type="text" class="form-control" name="txt_KKM">                
                </td>
                </td><td>&nbsp;</td>
                </tr>
                </table>
            </div>
 
              <button class="btn btn-primary" type="submit">Tambah</button>
        </form>
                
                    <div class="fetched-data2"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>    
 
  <script src="js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'edit_mapel.php',
                data :  'urut='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });

        $('#myTam').on('show.bs.modal', function (e) {
           // var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'tambah_mapel.php',
                data :  'urut='+ rowid,
                success : function(data){
                $('.fetched-data2').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
  
  
</body>

</html>

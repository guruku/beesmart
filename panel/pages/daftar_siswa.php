<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
include "../../config/server.php";
if(isset($_REQUEST['aksi'])){
//echo "delete from cbt_kelas where Urut = '$_REQUEST[urut]'";
$sql = mysql_query("delete from cbt_siswa where Urut = '$_REQUEST[urut]'");
}
if(isset($_REQUEST['simpan'])){
//echo "Urut = '$_REQUEST[txt_kodkel] - $_REQUEST[txt_namkel] - $_REQUEST[txt_kodlev] - $_REQUEST[txt_jur]' $_REQUEST[id]";
$sql = mysql_query("update cbt_siswa set XNamaSiswa = '$_REQUEST[txt_nam]', XPassword = '$_REQUEST[txt_pas]', XNomerUjian = '$_REQUEST[txt_nom]',
XKodeJurusan = '$_REQUEST[jur2]', XKodeKelas = '$_REQUEST[txt_kelas]', XKodeLevel = '$_REQUEST[txt_level]',
XNIK = '$_REQUEST[txt_nisn]', XFoto='$_REQUEST[txt_potret]',XJenisKelamin = '$_REQUEST[txt_jekel]',
XSesi = '$_REQUEST[txt_sesi]',XRuang = '$_REQUEST[txt_ruang]',XAgama = '$_REQUEST[txt_agama]',XPilihan = '$_REQUEST[txt_pilih]'
 where Urut = '$_REQUEST[id]'");
}

if(isset($_REQUEST['tambah'])){
	$sqlcek = mysql_num_rows(mysql_query("select * from cbt_siswa where (XNomerUjian = '$_REQUEST[txt_nom]' or XNIK = '$_REQUEST[txt_nisn]')"));
	if($sqlcek>0){
	$message = "NISN atau Nomer Ujian SUDAH ADA";
	echo "<script type='text/javascript'>alert('$message');</script>";
	} else {
		if(!$_REQUEST['txt_nom']==""||!$_REQUEST['txt_nisn']==""){
		$sql = mysql_query("insert into cbt_siswa (XNamaSiswa, XPassword, XNomerUjian, XKodeJurusan, XKodeKelas, XKodeLevel,
		XNIK, XFoto,XJenisKelamin,XSesi,XRuang,XAgama,XPilihan) values 	
		('$_REQUEST[txt_nam]','$_REQUEST[txt_pas]','$_REQUEST[txt_nom]','$_REQUEST[jur2]','$_REQUEST[txt_kelas]','$_REQUEST[txt_level]','$_REQUEST[txt_nisn]', 
		'$_REQUEST[txt_potret]','$_REQUEST[txt_jekel]','$_REQUEST[txt_sesi]','$_REQUEST[txt_ruang]','$_REQUEST[txt_agama]','$_REQUEST[txt_pilih]')");
		}
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
<?php include "../../config/server.php"; ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Peserta</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data siswa peserta ujian
<?php echo "<a href='#myTam' id='custId' data-toggle='modal' data-id=''>"; ?>
<button type="button" class="btn btn-info btn-small" ><i class="fa fa-plus-circle"></i> 
Tambah Siswa</button>
<?php echo "</a>";?>                            
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="10%">Foto</th>
                                        <th width="15%">Nomer Peserta</th>
                                        <th width="30%">Nama Peserta</th>
                                        <th width="13%">Kelas</th>
                                        <th width="10%">Agama</th>
                                        <th width="7%">Pil.</th>
                                        <th width="13%">Aksi</th>                                    
                                        </tr>
                                </thead>
                                <tbody>
                                <?php 
								$sql = mysql_query("select * from cbt_siswa order by XNomerUjian");
								while($s = mysql_fetch_array($sql)){ 
								$gbr=str_replace(" ","",$s['XFoto']);
								if($gbr==""){$gbr="nouser.png";}
								?>
                                
                                    <tr class="odd gradeX">
                                        <td align="center"><img src="../../fotosiswa/<?php echo $gbr; ?>" style="max-height:90px"></td>
                                        <td><a href="#" data-toggle="modal" data-target="#myModal<?php echo $s['XNomerUjian']; ?>">
										<?php echo $s['XNomerUjian']; ?></a> | Sesi <?php echo $s['XSesi']; ?></td>
                                        <td><?php echo $s['XNamaSiswa']; ?></td>
                                        <td class="center"><?php echo $s['XKodeKelas']; ?> - <?php echo $s['XKodeJurusan']; ?></td>
                                        <td class="center"><?php echo $s['XAgama']; ?></td>
                                        <td class="center"><?php echo $s['XPilihan']; ?></td>
                            <?php echo "<td><a href='#myModal' id='custId' data-toggle='modal' data-id=".$s['Urut'].">"; ?>
                                            <button type="button" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button></a>
                                            
                                            
                                            <a href="?modul=daftar_siswa&aksi=hapus&urut=<?php echo $s['Urut']; ?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "></i></button></a></td>
                                        
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
                                <?php } ?>
                                   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>Upload Foto Siswa </h4>
                                <p>Untuk melengkapi gambar/foto siswa peserta Ujian. Penamaan File gambar haruslah sesuai dengan data yang ada dalam excel pada kolom Foto. Selanjutnya, Silahkan tekan tombol dibawah ini : </p><p>
                                <a class="btn btn-danger btn-lg btn-small" href="?modul=upl_foto">Upload Foto</a>
                                <a class="btn btn-info btn-lg btn-small" href="#" data-toggle="modal" data-target="#myCetakKartu"> 
                                Cetak Kartu</a>
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
  
    <!-- Modal -->
<div class="modal fade" id="myCetakKartu" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title page-label"><i class="glyphicon glyphicon-print"></i> | Kartu Ujian</h1>
                </div><form action="?modul=cetak_kartu" method="post">
                <div class="panel-body">
                    <div class="inner-content">
                        <div class="wysiwyg-content">
                            <p><table width="100%">
                                <tr height="30px"><td>Jurusan </td><td>:                                 
                                <select id="jur2"  name="jur2">
<?php 
								$sqk = mysql_query("select * from cbt_kelas group by XKodeJurusan");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XKodeJurusan]'>$rs[XKodeJurusan]</option>";
								} ?>                                
                                </select>
</td></tr> 
                                <tr><td width="30%">Kelas </td><td>:
                                <select id="iki2"  name="iki2">
<?php 
								$sqk = mysql_query("select * from cbt_kelas group by XKodeKelas");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XKodeKelas]'>$rs[XKodeKelas]</option>";
								} ?>                                
                                
                                </select>
                                </td></tr>

                                </table>                               
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-offset-7 col-xs-6">
                           <button type="submit" class="btn btn-default btn-sm">
                           <i class="glyphicon glyphicon-print"></i> Tampilkan</button>
                           <button type="submit" class="btn btn-default btn-sm" data-dismiss="modal">
                           <i class="glyphicon glyphicon-minus-sign"></i> Tutup</button>
                        </div>
                    </div>
                </div></form>
            </div>
        </div>
    </div>
</div>
  
   
   
       
       <div class="modal fade" id="myTam" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Data Siswa</h4>
                </div>
                <div class="modal-body">
        <!-- MEMBUAT FORM -->
      <form action="?modul=daftar_siswa&tambah=yes" method="post">            
       <div class="form-group">
                <label>Nama Peserta</label>
                <input type="text" class="form-control" name="txt_nam">
            </div>
            <div class="form-group">
                <label>Nomer Ujian Peserta</label>
                <input type="text" class="form-control" name="txt_nom">
            </div>
            <div class="form-group">
                <table width="100%" border="0" cellpadding="5px" cellspacing="5px">
                <tr>
                <td><label>Level</label></td>
                <td>&nbsp;</td>
                <td><label>Kelas</label></td>
                <td>&nbsp;</td>
                <td><label>Jurusan</label></td>
                </tr>
				<tr><td>
                				<select id="txt_level"  name="txt_level" class="form-control" >
								<?php $sqk = mysql_query("select * from cbt_kelas group by XKodeLevel");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XKodeLevel]' class='form-control' >$rs[XKodeLevel]</option>";} ?>                                
                                </select>     
                </td><td>&nbsp;</td><td>
                				<select id="txt_kelas"  name="txt_kelas" class="form-control" >
								<?php $sqk = mysql_query("select * from cbt_kelas group by XKodeKelas");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XKodeKelas]' class='form-control' >$rs[XKodeKelas]</option>";} ?>                                
                                </select>              
                </td>
                </td><td>&nbsp;</td><td>
                				<select id="jur2"  name="jur2" class="form-control">
								<?php 
								$sqk = mysql_query("select * from cbt_kelas group by XKodeJurusan");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XKodeJurusan]'>$rs[XKodeJurusan]</option>";
								} ?>                                
                                </select>                
                </td>
                
                </tr>
                </table>
            </div>

            <div class="form-group">
 
                 <table width="100%" border="0" cellpadding="5px" cellspacing="5px">
                <tr>
				<td><label>Nomer Induk</label></td>
                <td>&nbsp;</td>
                <td><label>Foto Peserta</label></td>
                <td>&nbsp;</td>                
                <td><label>Jenis Kelamin</label></td>
                </tr>
                <tr><td>
                <input type="text" class="form-control" name="txt_nisn" size="5">
                </td><td>&nbsp;</td><td>
                <input type="text" class="form-control" name="txt_potret">                
                </td><td>&nbsp;</td><td>
              
                				<select id="txt_jekel"  name="txt_jekel" class="form-control">
								<option value='L'>Laki-laki</option>
								<option value='P'>Perempuan</option>                                
                                </select>                
                </td>                                
                </td></tr>
                </table>
            </div>
            <div class="form-group">
                
                          <table width="100%" border="0" cellpadding="5px" cellspacing="5px">
                <tr>
				<td><label>Password</label></td>
                <td>&nbsp;</td>
                <td><label>Sesi Ujian</label></td>
                <td>&nbsp;</td>                
                <td><label>Ruang Ujian</label></td>
				<td>&nbsp;</td>                
                <td><label>Agama</label></td>                
                </tr>
                <tr><td>
                <input type="text" class="form-control" name="txt_pas" value="" size="5">
                </td><td>&nbsp;</td><td>
                 <select id="txt_sesi"  name="txt_sesi" class="form-control">
								<?php 
								$sqk = mysql_query("select * from cbt_siswa group by XSesi");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XSesi]'>$rs[XSesi]</option>";
								} ?>                                
                                </select>               
                </td><td>&nbsp;</td><td>
                                <select id="txt_ruang"  name="txt_ruang" class="form-control">
								<?php 
								$sqk = mysql_query("select * from cbt_siswa group by XRuang");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XRuang]'>$rs[XRuang]</option>";
								} ?>                                
                                </select>                   
               
                </td><td>&nbsp;</td><td>
              
                				<select id="txt_agama"  name="txt_agama" class="form-control">
								<?php 
								$sqk = mysql_query("select * from cbt_siswa where not XAgama ='' group by XAgama");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XAgama]'>$rs[XAgama]</option>";
								} ?>                                 
                                </select>                
                </td>                                               
                </td></tr>
                <tr>
				<td>&nbsp;</td>
                </tr>
                <tr>
				<td><label>Mapel Pilihan</label></td>
                </tr>
                <tr><td>
              
                				<select id="txt_pilih"  name="txt_pilih" class="form-control">
								<?php 
								$sqk = mysql_query("select * from cbt_siswa where not XPilihan ='' group by XPilihan");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XPilihan]'>$rs[XPilihan]</option>";
								} ?>                                 
                                </select>                
                </td>                                               
                </td></tr>                
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
                    <h4 class="modal-title">Edit Data Siswa</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
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
                url : 'edit_siswa.php',
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
                url : 'tambah_siswa.php',
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

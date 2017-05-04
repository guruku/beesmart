
<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>

<?php
if(isset($_REQUEST['aksi'])&&$_REQUEST['aksi']=="simpan"){
$sss= str_replace("'","\'",$_REQUEST['tanyasoal']);
	$sql0 = mysql_query("update cbt_soal set XTanya = '$sss' where XKodeSoal = '$_REQUEST[soal]' and Urut = '$_REQUEST[nom]'");
	//echo "update cbt_soal set XTanya = '$sss' where XKodeSoal = '$_REQUEST[txt_soal]' and Urut = '$_REQUEST[txt_nom]'";
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
<script type="text/javascript" src="jquery-1.4.js"></script>
<script>    
$(document).ready(function(){
		$("#txt_durasi").change(function(){
	var txt_durasi = $("#txt_durasi").val();
	$.ajax({
	url: "ambil_token.php",
	data: "txt_ujian="+txt_durasi,
	cache: false,
	success: function(msg){
	$("#txt_token").val(msg);
	}
	});
	});

 $("#kirim").click(function(){

 var ed = tinyMCE.get('tanyasoal');
 
    // Do you ajax call here, window.setTimeout fakes ajax call
    ed.setProgressState(1); // Show progress
    window.setTimeout(function() {
        ed.setProgressState(0); // Hide progress
        //alert(ed.getContent());
    }, 2000);


var a = tinymce.get('tanyasoal').getContent();
var b6 = $("#gambar").val();
var b7 = $("#audio").val();
var b8 = $("#video").val();

var c = $("#nom").val();
var d = $("#soal").val();
 //alert(e);
var f = $("#map").val();
 
 $.ajax({
     type:"POST",
     url:"simpan_soal_esai.php",    
     data: "aksi=simpan&txt_tanya=" + a + "&txt_jawab1=" + "&txt_gbr=" + b6  + "&txt_aud=" + b7  + "&txt_vid=" + b8 + "&txt_soal=" + d + "&txt_nom=" + c + "&txt_mapel=" + f,
	 success: function(data){
	 alert("Kirim");
	 //$("#info").html(data);
		//alert(txt_durasi);
		//tampildata();
	 }
	 });
	 });
	

});
</script> 

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="js/lc_switch.js" type="text/javascript"></script>
<link rel="stylesheet" href="js/lc_switch.css">
<script type="text/javascript">
var $jnoc = jQuery.noConflict();
          
$jnoc(document).ready(function(e) {

	$jnoc ('input').lc_switch();

	// triggered each time a field changes status
	$jnoc('body').delegate('.lcs_check', 'lcs-statuschange', function() {
		var status = ($(this).is(':checked')) ? 'checked' : 'unchecked';
		console.log('field changed status: '+ status );
	});
	
	
	// triggered each time a field is checked
	$jnoc('body').delegate('.lcs_check', 'lcs-on', function() {
		console.log('field is checked');
	});
	
	
	// triggered each time a is unchecked
	$jnoc('body').delegate('.lcs_check', 'lcs-off', function() {
		console.log('field is unchecked');
		
	});
});
</script>

<body>

<form  method="post"> 
<?php	
$sqltanya = mysql_query("select * from cbt_paketsoal where XKodeSoal= '$_REQUEST[soal]' and XGuru = '$_COOKIE[beeuser]'");
	$so=mysql_fetch_array($sqltanya); ?>

<div class="panel panel-info">
	<div class="panel-heading">
    Data Bank Soal (Bentuk soal Esai) &nbsp; &nbsp; | &nbsp; &nbsp; 
	<?php echo "<a href=?modul=edit_soal&jum=$_REQUEST[jum]&soal=$_REQUEST[soal]><button type='button' class='btn btn-info'><i class='fa fa-arrow-left'></i> Kembali ke Bank Soal</button></a>"; ?>	
          

    </div>
	
    <div class="panel-body">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td colspan="2"  style="font-size:18px"> &nbsp;Soal No. <?php echo $_REQUEST['nomer']; ?></td>

<td align="right">
<button type="submit" class="btn btn-success btn-small" id="kirim"><i class='fa fa-save'></i> Update Soal</button>     
	<input type="hidden" id="nom" name="nom" value="<?php echo $_REQUEST['nomer']; ?>" />
    <input type="hidden" id="soal" name="soal" value="<?php echo $_REQUEST['soal']; ?>" />
    </strong></td>
  </tr>
  <tr>
<tr><td colspan="3">&nbsp;</td></tr>    
    <td colspan="3" align="right">
    <textarea name="tanyasoal"  id="tanyasoal" style="font-size:18px; width:100%; height:300px"><?php 
	$sql0 = mysql_query("select * from cbt_soal where XKodeSoal= '$_REQUEST[soal]' and Urut = '$_REQUEST[nomer]'");
	$s=mysql_fetch_array($sql0);
	echo "$s[XTanya]"; ?></textarea>
        <input type="text" id="map" name="map" value="<?php echo $s['XKodeMapel']; ?>" />
    
    </td>
  </tr>
  
<tr><td ><br>
<div class="col-sm-12"><label class="list-group-item-heading" style="width:100px">File Gambar</label>
<input type="text" id="gambar" name="gambar" class="input-lg" value="<?php echo $s['XGambarTanya']; ?>" />
 </div>
 <div class="col-sm-12"><label class="list-group-item-heading" style="width:100px">File Audio</label>
<input type="text" id="audio" name="audio" class="input-lg" value="<?php echo $s['XAudioTanya']; ?>"/>
 </div>
 <div class="col-sm-12"><label class="list-group-item-heading" style="width:100px">File Video</label>
<input type="text" id="video" name="video" class="input-lg" value="<?php echo $s['XVideoTanya']; ?>"/>
 </div>


</td>
  </tr>

   <tr><td colspan="2">&nbsp;</td></tr>
  <tr><td align="center" colspan="3"><input type="submit" class="btn btn-info btn-block" style="padding-top:20px; padding-bottom:20px" value="Update" id="ubah"/></td></tr>
     <tr><td colspan="2">&nbsp;</td></tr> 
 </table>
  </form> 
</div></div> 

                        
                        
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
                                            
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal --> 
                                           
<script>    
$(document).ready(function(){

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
                            <!-- /.table-responsive -->
                            <div class="well">
                            <p></p>
                                
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
        <button type="button" class="btn btn-primary">Save changes</button>
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

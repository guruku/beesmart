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

    <title>CBT BEESMART</title>

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
<body>
<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Daftar Bank Soal</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>


            <div class="row">
                <div class="col-lg-12" style="margin-top:0px;">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                           Download File Excel (Template Soal)
                        </div>
                        <div class="panel-body">
<div style="width: 20%; float:left">
   <img src="images/xls.png" style=" width:90%; max-width:100px;padding-right:10px;"/>
</div>

<div style="width: 80%; float:right">
   Silahkan Klik logo Excel disamping, untuk <a href="../../file-excel/bee_soal_temp.xls" target="_blank"> download </a> file excel template soal. 
   <br />Jangan ada inputan apapun setelah nomer terakhir. Karena akan dibaca dan diacak oleh sistem. <p>
   
</div>
                        </div>
                        <div class="panel-footer">
                          CBT BEESMART 
                        <a href="../../file-excel/bee_soal_temp.xls" target="_blank">
                        <button type="button" class="btn btn-warning btn-small"><i class="fa fa-cloud-upload"></i> Template Soal Umum</button></a>
                        <a href="../../file-excel/bee_soal_peminatan.xls" target="_blank">
                        <button type="button" class="btn btn-warning btn-small"><i class="fa fa-cloud-upload"></i> Template Peminatan</button></a>
                        <a href="../../file-excel/bee_soal_agama.xls" target="_blank">
                        <button type="button" class="btn btn-warning btn-small"><i class="fa fa-cloud-upload"></i> Template Agama</button></a>
                          
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
            </div>
            <!-- /.row -->
            
<?php include "../../config/server.php"; ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <table width="100%"><tr><td>Daftar Bank Soal</td><td align="right">
                                        <button type="button" class="btn btn-info btn-small"  data-toggle="modal" data-target="#myModal">
                                        <i class="fa fa-file-o"></i>&nbsp;Buat Bank Soal Baru</button>
                                        </td></tr>
							</table>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
	                                    <th width="6%">No.</th>
                                        <th width="8%">Kode</th>
                                        <th width="20%">Mata Pelajaran</th>
                                        <th width="8%">Soal</th>	
                                        <th width="8%">Kelas</th>
                                        <th width="7%">Copy</th>                                        
                                        <th width="7%">Upl</th>                                      
                                        <th width="8%">Edit</th>                                            
                                        <th width="8%">Status</th>                                        
                                        <th width="8%">Del</th>                                                                                                                          
                                 </tr>
                                </thead>
                                <tbody>
                                <?php 
if($_COOKIE['beelogin']=='admin'){								
$sql = mysql_query("select p.*,m.*,p.Urut as Urutan,p.XKodeKelas  as kokel from cbt_paketsoal p left join cbt_mapel m on m.XKodeMapel = p.XKodeMapel order by p.Urut desc");
} else {
$sql = mysql_query("select p.*,m.*,p.Urut as Urutan,p.XKodeKelas  as kokel from cbt_paketsoal p left join cbt_mapel m on m.XKodeMapel = p.XKodeMapel where p.XGuru = '$_COOKIE[beeuser]' order by p.Urut desc");								
}								
								while($s = mysql_fetch_array($sql)){ 
					$sqlsoal = mysql_num_rows(mysql_query("select * from cbt_soal where XKodeSoal = '$s[XKodeSoal]'"));
					$sqlpakai = mysql_num_rows(mysql_query("select * from cbt_siswa_ujian where XKodeSoal = '$s[XKodeSoal]' and XStatusUjian = '1'"));
					$sqlsudah = mysql_num_rows(mysql_query("select * from cbt_jawaban where XKodeSoal = '$s[XKodeSoal]'"));
					if($sqlsoal==0){$katakosong="disabled";}  else {$katakosong="";}	
					if($sqlsudah>0||$sqlpakai>0){$katasudah="disabled";}  else {$katasudah="";}			
					if($sqlpakai>0){$katapakai="disabled";}  else {$katapakai="";}			
								?>
                                
                                    <tr class="odd gradeX">
                                        <td><input type="hidden" value="<?php echo $s['Urutan']; ?>" id="txt_mapel<?php echo $s['Urutan']; ?>"><?php echo $s['Urutan']; ?></td><input type="hidden" value="<?php echo $s['XKodeSoal']; ?>" id="txt_soal<?php echo $s['Urutan']; ?>">
                                        <td><?php echo $s['XKodeSoal']; ?></td>
                                        <td><?php echo $s['XNamaMapel']; ?></td>
                                        <td><?php echo "$sqlsoal (". $s['XJumPilihan']." opsi)"; ?></td>                                           
                                        <td><?php echo $s['kokel']." | ".$s['XKodeJurusan']."."; ?></td> 
										<td align="center">
                                        <button type="button" class="btn btn-info btn-small"  data-toggle="modal" data-target="#myCopy<?php echo $s['Urutan']; ?>"><i class="fa fa-copy"></i></button>
                                        
                                        </td>                                          
                                        
                                        <td align="center">
										<!-- Tombol Mati kalau sudah ada yng ambil ujian / dipakai
										<?php
										if($sqlpakai>0||$sqlsudah>0){ ?>
										<button type="button" class="btn btn-warning btn-small disabled"><i class="fa fa-cloud-upload"></i></button>
                                        <?php } else {?><a href=?modul=upl_soal&soal=<?php echo $s['XKodeSoal']; ?>&mapel=<?php echo $s['XKodeMapel']; ?>>
                                        <button type="button" class="btn btn-warning btn-small"<?php echo "$katapakai $katasudah"; ?>
                                        ><i class="fa fa-cloud-upload"></i></button></a>
                                        <?php } ?>
                                        </td>
                                        !-->
                                         <!-- Tombol Nyala meski sudah ada yng ambil ujian / dipakai !-->
										
										<a href=?modul=upl_soal&soal=<?php echo $s['XKodeSoal']; ?>&mapel=<?php echo $s['XKodeMapel']; ?>>
                                        <button type="button" class="btn btn-warning btn-small">
                                        <i class="fa fa-cloud-upload"></i></button></a>
                                        </td>
                                        
										<td align="center">
										<!-- Tombol Mati kalau sudah ada yng ambil ujian / dipakai
										<?php
										if($sqlpakai>0||$sqlsudah>0){ ?>
										<button type="button" class="btn btn-primary btn-small" disabled><i class="fa fa-list"></i></button>
                                        <?php } else {?><a href=?modul=edit_soal&jum=<?php echo $s['XJumPilihan']; ?>&soal=<?php echo $s['XKodeSoal']; ?>>
                                        <button type="button" class="btn btn-primary btn-small" <?php echo $katapakai; ?>> <i class="fa fa-list"></i></button></a>
                                        <?php } ?>
                                        </td>
                                        !-->
                                        
                                        <!-- Tombol Nyala meski sudah ada yng ambil ujian / dipakai !-->
										<a href=?modul=edit_soal&jum=<?php echo $s['XJumPilihan']; ?>&soal=<?php echo $s['XKodeSoal']; ?>>
                                        <button type="button" class="btn btn-primary btn-small" <?php echo $katapakai; ?>> <i class="fa fa-list"></i></button>
                                        </a>
                                        </td>
                                        
                                        <td>													
                                        <?php if($s['XStatusSoal']=="Y"){ ?>
                                        <input type="button" id="simpan<?php echo $s['Urutan']; ?>" class="btn btn-success" value="Aktif"  
                                        <?php echo "$katapakai $katakosong $katasudah"; ?> >
                                        <input type="hidden" value="AKTIF" id="ingat<?php echo $s['Urutan']; ?>"> 
                                        <?php } else { ?>
                                        <input type="button" id="simpan<?php echo $s['Urutan']; ?>" class="btn btn-default" value="Non Aktif" 
										<?php 
										echo "$katakosong"; 
										// echo "$katapakai $katakosong $katasudah"; ?> >                                 
                                        <input type="hidden" value="NON" id="ingat<?php echo $s['Urutan']; ?>">                                               
                                         <?php } ?>
                                        </td>     
                                        <td align="center">
                                        <button type="button" class="btn btn-danger btn-small" id="btnDelete<?php echo $s['Urutan']; ?>" 
                                        <?php // echo "$katapakai"; ?>
                                        ><i class="fa fa-times"></i></button>
                                        </td>                                                                           
                                    </tr>
  <!-- Button trigger modal -->
    
    
                                           
<script>    
$(document).ready(function(){
$("#simpan<?php echo $s['Urutan']; ?>").click(function(){
//alert("<?php echo $s['Urutan']; ?>");
 var txt_ujian = $("#txt_ujian").val();
 var txt_jawab = $("#txt_jawab").val();
 var txt_acak = $("#switch_left").val();
 var txt_durasi = $("#txt_durasi").val();
 var txt_telat = $("#txt_telat").val();
 var txt_soal = $("#txt_soal<?php echo $s['Urutan']; ?>").val();  
 var txt_mapel = $("#txt_mapel<?php echo $s['Urutan']; ?>").val();
 var txt_level = $("#txt_level").val(); 
 var txt_nama = $("#txt_nama").val();  
 var txt_status = $("#ingat<?php echo $s['Urutan']; ?>").val();    
 $.ajax({
     type:"POST",
     url:"simpan_soal.php",    
     data: "aksi=simpan&txt_ujian=" + txt_ujian + "&txt_jawab=" + txt_jawab + "&txt_acak=" + txt_acak + "&txt_telat=" + txt_telat + "&txt_durasi=" + txt_durasi + "&txt_soal="
	 + txt_soal + "&txt_level=" + txt_level + "&txt_mapel=" + txt_mapel + "&txt_nama=" + txt_nama + "&txt_status=" + txt_status,
	 success: function(data){
		//alert(data);
	 	if(data > 0){
		alert("masalah");
		} else {
				if( $("#simpan<?php echo $s['Urutan']; ?>").hasClass( "btn-success" ) )
		{
		 $("#simpan<?php echo $s['Urutan']; ?>").removeClass("btn-success").addClass("btn-default");
		 $("#simpan<?php echo $s['Urutan']; ?>").val("Non Aktif");
		} else {	 	
	 	 $("#simpan<?php echo $s['Urutan']; ?>").removeClass("btn-info").addClass("btn-success");
		 $("#simpan<?php echo $s['Urutan']; ?>").val("Aktif");		 
		}
		}
	  
	 loading.fadeOut();
	 tampilkan.html(data);
	 tampilkan.fadeIn(100);
	 tampildata();
	 window.location.reload();
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
 var txt_soal = $("#txt_soal<?php echo $s['Urutan']; ?>").val();  
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
					
    confirmDialog("Apakah yakin akan menghapus Bank Soal ini?" , function(){
        //My code to delete
 var txt_ujian = $("#txt_ujian").val();
 var txt_jawab = $("#txt_jawab").val();
 var txt_acak = $("#switch_left").val();
 var txt_durasi = $("#txt_durasi").val();
 var txt_telat = $("#txt_telat").val();
 var txt_soal = $("#txt_soal<?php echo $s['Urutan']; ?>").val();  
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

$("#tambah<?php echo $s['Urutan']; ?>").click(function(){
//alert("<?php echo $s['Urutan']; ?>");
 var txt_ujianx = $("#txt_ujianx<?php echo "$s[Urutan]"; ?>").val();
 var txt_jawabx = $("#txt_jawabx<?php echo "$s[Urutan]"; ?>").val();
 var txt_acakx = $("#txt_acakx<?php echo "$s[Urutan]"; ?>").val();
 var txt_kelasx = $("#txt_kelasx<?php echo "$s[Urutan]"; ?>").val();
 var txt_jurusanx = $("#txt_jurusanx<?php echo "$s[Urutan]"; ?>").val();
 var txt_mapelx = $("#txt_mapelx<?php echo "$s[Urutan]"; ?>").val();
 var txt_levelx = $("#txt_levelx<?php echo "$s[Urutan]"; ?>").val(); 
 var txt_namax = $("#txt_namax<?php echo "$s[Urutan]"; ?>").val();  
 var txt_jumsoalx = $("#txt_jumsoalx<?php echo "$s[Urutan]"; ?>").val(); 
 var txt_jawabx = $("#txt_jawabx<?php echo "$s[Urutan]"; ?>").val();  

 var txt_jumsoalz1 = $("#txt_jumsoalz1<?php echo "$s[Urutan]"; ?>").val();  
 var txt_jumsoalz2 = $("#txt_jumsoalz2<?php echo "$s[Urutan]"; ?>").val();  
 var txt_bobotsoalz1 = $("#txt_bobotsoalz1<?php echo "$s[Urutan]"; ?>").val();  
 var txt_bobotsoalz2 = $("#txt_bobotsoalz2<?php echo "$s[Urutan]"; ?>").val();  

  
//alert(txt_ujianx);  
  
 $.ajax({
     type:"POST",
     url:"gandakan_soal.php",    
     data: "aksi=simpan&txt_jumsoalx=" + txt_jumsoalx + "&txt_jawabx=" + txt_jawabx + "&txt_acakx=" + txt_acakx + "&txt_kelasx=" + txt_kelasx + "&txt_levelx=" + txt_levelx + "&txt_mapelx=" + txt_mapelx + "&txt_namax=" + txt_namax + "&txt_jurusanx=" + txt_jurusanx + "&txt_ujianx=" + txt_ujianx + "&txt_jumsoalz1=" + txt_jumsoalz1 + "&txt_jumsoalz2=" + txt_jumsoalz2  + "&txt_bobotsoalz1=" + txt_bobotsoalz1 + "&txt_bobotsoalz2=" + txt_bobotsoalz2,
	 success: function(data){
	      //alert("Soal Sukses Digandakan");
		  document.location.reload();
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


function confirmDialog2(message, onConfirm){
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

<div class="modal fade" id="myCopy<?php echo $s['Urutan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  style="display: none; z-index: 1050;"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php // echo $s['Urutan']; ?>
                            <div class="panel panel-primary">
                        <div class="panel-heading">
                            Bank Soal yang akan digandakan
                        </div>
                        
                        <div class="panel-body">
                        <p> <span class="asd" class="asd">Entry </span><span>:
								<?php $soale = "$s[XKodeSoal]"; 
								$carisoal = mysql_num_rows(mysql_query("select * from cbt_paketsoal where XKodeSoal = '$soale' and XKodeJurusan = '$s[XKodeJurusan]' and 
								XKodeKelas = '$s[kokel]' and XKodeMapel ='$s[XKodeMapel]'"));								
								if($carisoal>0){
								$urutz = date("ymdhi");
								$soalez = preg_replace('/[0-9]+/', '', $soale);																
								$soalez = "$soalez".$urutz;} 
								else {$soalez = $soale;}
								?>
                                <input size="2" type="hidden" id="txt_ujianx<?php echo "$s[Urutan]"; ?>" value="<?php echo "$s[XKodeSoal]"; ?>"/>
                            	<input type="text" id="txt_namax<?php echo "$s[Urutan]"; ?>" value="<?php echo "$soalez"; ?>"/>
                               </span></p>
                        
                            <p> <span class="asd" class="asd">Mata Pelajaran</span><span>:
                            	<select name="txt_mapelx<?php echo "$s[Urutan]"; ?>" id="txt_mapelx<?php echo "$s[Urutan]"; ?>">
                                <?php 
                                echo "<option value='$s[XKodeMapel]' selected>$s[XNamaMapel]</option>";
                                ?>
                                <?php 
                                $sqlkelas = mysql_query("select * from cbt_mapel where NOT XKodeMapel = '$s[XKodeMapel]' order by XNamaMapel");
                                while($sk = mysql_fetch_array($sqlkelas)){
                                echo "<option value='$sk[XKodeMapel]'>$sk[XNamaMapel]</option>";
                                }
                                ?>
                                </select>
                               </span></p>
                        <?php 
                         $sqladmin = mysql_query("select * from cbt_admin");
                         $sa = mysql_fetch_array($sqladmin);
						 $skul = $sa['XTingkat'];
						 ?>

                            
                            
                            <p><span class="asd" class="asd">Level</span><span>: 
                            <select id="txt_levelx<?php echo "$s[Urutan]"; ?>">
                            <option value="SMP" <?php if($skul=='SMP'){echo "selected";} ?>>SMP</option>
                            <option value="MTs" <?php if($skul=='MTs'){echo "selected";} ?>>MTs</option>                            
                            <option value="SMU" <?php if($skul=='SMU'){echo "selected";} ?>>SMU</option>
                            <option value="MA" <?php if($skul=='MA'){echo "selected";} ?>>MA</option>                            
                            <option value="SMK" <?php if($skul=='SMK'){echo "selected";} ?>>SMK</option>                            
							</select>
                            </span></p>
                            
                            <p><span class="asd" class="asd">Jurusan</span><span>: 
                            							<select id="txt_jurusanx<?php echo "$s[Urutan]"; ?>">
                             <?php 
                             echo "<option value='$s[XKodeJurusan]' selected>$s[XKodeJurusan]</option>";
							 ?>
                             <?php 
							 $sqljur = mysql_query("select * from cbt_kelas where NOT XKodeJurusan = '$s[XKodeJurusan]' group by XKodeJurusan");
							 while($j = mysql_fetch_array($sqljur)){
                             echo "<option value='$j[XKodeJurusan]'>$j[XKodeJurusan]</option>";
							 }
							 ?>
                             </select>
							</span></p>
                            
                            <p>
                            <span class="asd" class="asd">
                            Kelas</span><span>: 
							<select id="txt_kelasx<?php echo "$s[Urutan]"; ?>">
                            <option value="<?php echo "$s[kokel]"; ?>" selected><?php echo "$s[kokel]"; ?></option>
                             <?php 
							 $sqlkelas = mysql_query("select * from cbt_kelas group by XKodeKelas");
							 while($k = mysql_fetch_array($sqlkelas)){
                             echo "<option value='$k[XKodeKelas]'>$k[XKodeKelas]</option>";
							 }
							 ?>
                             </select>
							</span></p>

                            <p>
                            <span class="asd" class="asd">
                            Opsi Pilihan Jawaban</span><span>: <input size="2" type="text" id="txt_jawabx<?php echo "$s[Urutan]"; ?>" value="<?php echo "$s[XJumPilihan]"; ?>"/> * Default 5 Pilihan
                            </span></p>
                            
<p><span class="asd" class="asd">Pilihan Ganda</span><span>: <input size="2" type="text" id="txt_jumsoalz1<?php echo "$s[Urutan]"; ?>" value="<?php echo "$s[XPilGanda]"; ?>"/> Jumlah Soal ditampilkan
</span></p>     
<p><span class="asd" class="asd">Bobot Pilihan </span><span>: <input size="2" type="text" id="txt_bobotsoalz1<?php echo "$s[Urutan]"; ?>" value="<?php echo "$s[XPersenPil]"; ?>"/> * %
</span></p>  
<p><span class="asd" class="asd">Esai</span><span>: <input size="2" type="text" id="txt_jumsoalz2<?php echo "$s[Urutan]"; ?>" value="<?php echo "$s[XEsai]"; ?>"/> Jumlah Soal ditampilkan
</span></p>     
<p><span class="asd" class="asd">Bobot Pilihan </span><span>: <input size="2" type="text" id="txt_bobotsoalz2<?php echo "$s[Urutan]"; ?>" value="<?php echo "$s[XPersenEsai]"; ?>"/> * %
</span></p>     
                            	                                                  
                        </div>

                        <div class="panel-footer">
                            <input type="submit"  class="btn btn-info btn-lg btn-small" id="tambah<?php echo $s['Urutan']; ?>" value="Gandakan" name="tambah<?php echo $s['Urutan']; ?>">
                           
                        </div>
                    </div>
                  
        
        
      </div>
      
      <script>$("#cart").on('hide', function () {
        window.location.reload();
    });</script>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
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
                            <p></p>
                                <h4>Keterangan</h4>
                                
                                <ul><li><font color="#FF0000">Menghapus Bank Soal yang SUDAH/SEDANG dipakai Ujian, 
                                akan membuat soal pada Lembar Jawaban Siswa menjadi <b>KOSONG / ERROR</b></font>
                                </li>

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
                                </ul>                              
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

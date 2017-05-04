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
<script type="text/javascript" src="tableExport.js"></script>
<script type="text/javascript" src="jquery.base64.js"></script>
<body>
<?php include "../../config/server.php"; 
$soal = $_REQUEST['soal'];
?>
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
                        <?php $sqlsoalan = mysql_query("select * from cbt_soal s left join cbt_mapel m on s.XKodeMapel = m.XKodeMapel 
						where s.XKodeSoal = '$soal'");
						$ss = mysql_fetch_array($sqlsoalan);
						$mapelz = $ss['XNamaMapel']; ?>

                           <table width="100%"><tr><td>
                           
                           <a href="?modul=analisajawaban&soal=<?php echo $_REQUEST['soal']; ?>" ><button class="btn btn-default">
                            <i class="fa fa-arrow-circle-left"></i> Kembali ke Daftar</button></a>
                           Analisa Butir Soal <?php echo "$soal Mapel : $mapelz"; ?>
                           </td><td align="right">
                            <a href="excel_butirsoal.php?soal=<?php echo $_REQUEST['soal']; ?>" target="_blank"><button class="btn btn-success">
                            <i class="fa fa-file-excel-o"></i> Download Excel</button></a>
                           </td></tr>
							</table>
                        </div>
                        <!-- /.panel-heading -->
 
 
                        <div class="panel-body">
<style>
div.scroll {
    width: 100%;
    height: 300px;
    overflow: scroll;
}</style>
<div class="scroll">
                            <table width="auto" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>

                                </thead>
                                <tbody>
                                <?php 
echo "<table width=200% border=0 cellpadding=0px cellspacing=0px>
<tr align=center height=50px >
<td width='50px' bgcolor='#999' style='border-left:thin solid #000; border-right:thin solid #000;'>NO</td>
<td bgcolor='#999' style='border-right:thin solid #000;'  width='100px'>NIS</td><td bgcolor='#999' style='border-right:thin solid #000;'  width='550px'>Nama Siswa </td>"; 
$sql = mysql_query("select * from cbt_soal where XKodeSoal = '$soal' and XJenisSoal = '1' order by XNomerSoal");
$no =1;
while($s = mysql_fetch_array($sql)){ 
echo "<td bgcolor='#999'  style='border-right:thin solid #000;' width='50px'>$s[XNomerSoal]</td>
";
$no++;
}						
echo "<td bgcolor='#999' style='border-right:thin solid #000;' width='80px'>BENAR</td><td bgcolor='#999' style='border-right:thin solid #000;' width='80px'>SALAH</td><td bgcolor='#999' style='border-right:thin solid #000;' width='100px'>SKOR TOTAL</td><td bgcolor='#999'  style='border-right:thin solid #000;' width:'100px'>KETERANGAN</td></tr>";

//jawaban siswa
$sqljwb = mysql_query("select * from cbt_jawaban j left join cbt_siswa s on s.XNomerUjian = j.XUserJawab where XKodeSoal = '$soal' 
and j.XJenisSoal = '1' group by XUserJawab order by XUserJawab");
$nom =1;
					$sqlujian = mysql_query("select * from cbt_ujian where XKodeSoal = '$soal' ");
					$su = mysql_fetch_array($sqlujian); 
					$jumsoal = $su['XPilGanda'];
					$mapel = $su['XKodeMapel'];


while($sj = mysql_fetch_array($sqljwb)){ 

echo "<tr height=30px style='border-bottom:thin solid #000; '><td style='border-right:thin solid #000; border-left:thin solid #000; ' align=right>$nom &nbsp;</td>
<td style='border-right:thin solid #000; '>&nbsp; $sj[XNIK]</td>
<td style='border-right:thin solid #000; '>&nbsp; $sj[XNamaSiswa]</td>";
		$sql0 = mysql_query("select * from cbt_soal where XKodeSoal ='$soal'  and XJenisSoal = '1' order by XNomerSoal");
		while($s0 = mysql_fetch_array($sql0)){ 
				if($s0['XKategori']==1){$bg = "#20bc10";}
				elseif($s0['XKategori']==2){$bg = "#f8c207";}
				elseif($s0['XKategori']==3){$bg = "#f80723";}
												
		echo "<td align=center width=50px style='border-right:thin solid #000;color:$bg' >";
						
	$sql1 = mysql_query("select * from cbt_jawaban where XUserJawab = '$sj[XUserJawab]' and XNomerSoal = '$s0[XNomerSoal]' and XKodeSoal = '$soal' ");
					while($s1 = mysql_fetch_array($sql1)){ 
					echo "<b>$s1[XNilai]</b>";
					}				
			
					echo "</td>";			

					$sql2 = mysql_query("select sum(XNilai) as skor2 from cbt_jawaban where XUserJawab = '$sj[XUserJawab]' and XKodeSoal = '$soal' and XJenisSoal = '1'");
					$s2 = mysql_fetch_array($sql2);
					$skor = $s2['skor2'];

					$nilai = ($skor/$jumsoal)*100;
					$nilaine = number_format($nilai,2,',','.');
					$salah = $jumsoal-$skor;

					$sqlkkm = mysql_query("select * from cbt_mapel where XKodeMapel = '$mapel'");
					$sk = mysql_fetch_array($sqlkkm); 
					$kkm = $sk['XKKM'];
					
					if($nilai>=$kkm){$sta = "TUNTAS";} else {$sta = "BELUM TUNTAS";}

$kolom = 6+$jumsoal;
		}			
echo "<td align=center style='border-right:thin solid #000; '>$skor</td><td align=center style='border-right:thin solid #000; '>$salah</td><td align=center style='border-right:thin solid #000; '>$nilaine</td><td align=center style='border-right:thin solid #000; '>$sta</td></tr>";
$nom++;
}						
echo "</tr></table>";
		
?>
                                   
                                </tbody >
</div>                               
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

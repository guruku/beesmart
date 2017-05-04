<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
include "../../config/server.php";
$sql = mysql_query("select * from cbt_admin");
$xadm = mysql_fetch_array($sql);
$skull= $xadm['XSekolah'];
$skul_pic= $xadm['XLogo'];
$admpic= $xadm['XPicAdmin']; 
$skul_ban= $xadm['XBanner']; 
$skul_tkt= $xadm['XTingkat']; 
$skul_warna= $xadm['XWarna']; 
$skul_adm= strtoupper($xadm['XAdmin']); 
$status_server = 1;
?>

				<?php 
  				$serv = php_uname('n');
			    //$link = mysql_connect('localhost', 'root', '');
				if (!$sqlconn) {$status_server='0'; die('Could not connect: ' . mysql_error());}
				$a = mysql_get_server_info();
				$b = substr($a, 0, strpos($a, "-"));
				$b = str_replace(".","",$b);
				?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CBT BEESMART </title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-color:#293438;">
<header>
        <!-- Navigation -->
        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; height:90px; background-color:#ffca01; border-bottom-color:#364145">
       <table width="100%" border="1"><tr><td bgcolor="<?php echo "$skul_warna"; ?>"> <img src="../../images/<?php echo "$skul_ban"; ?>" style="margin-top:0px; height:100px; overflow:hidden">
           </td><td align="right" bgcolor="#000" width="30%">
           
           
                   <table width="100%" border="0"><tr><td rowspan="2" width="120px" align="center"><img src="../../images/<?php echo "$admpic"; ?>" style="margin-top:0px; height:90px; overflow:hidden">
                   </td><td><font color="#cfcdcd">&nbsp;CBT Administrator : </label><br>
				   <label style="text-align:right; color:#fff; font-size:18px; margin-top:12x; margin-right:20px">&nbsp;<?php echo "$skul_adm"; ?></label></td></tr>
                   <tr><td>         
						   <?php
                           if($status_server==1){
                           ?>
                           <font color="#cfcdcd"> Status Server : AKTIF</font>
                           <?php } else { ?>
                           <font color="#cfcdcd"> Status Server : OFFLINE</font>
                           <?php } ?>
                    </td></tr></table>
           </td></tr>
           </table>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                </button>
            </div>
            <!-- /.navbar-header -->
</nav>
            <!-- /.navbar-top-links -->
</header>

<?php
			if(!isset($_REQUEST['modul'])||$_REQUEST['modul']==''){
			$bread = "Beranda";
			}	
			elseif($_REQUEST['modul']=="info_skul"){
			$bread = "Update Data Sekolah";
			}		
			elseif($_REQUEST['modul']=="upl_kelas"||$_REQUEST['modul']=="uploadkelas"){
			$bread = "Upload Kelas";
			}		
			elseif($_REQUEST['modul']=="upl_mapel"||$_REQUEST['modul']=="uploadmapel"){
			$bread = "Upload Mapel";
			}	
			elseif($_REQUEST['modul']=="upl_siswa"||$_REQUEST['modul']=="uploadsiswa"){
			$bread = "Upload Siswa";
			}
			elseif($_REQUEST['modul']=="upl_siswa"||$_REQUEST['modul']=="uploadsiswa"){
			$bread = "Upload Siswa";
			}	
			elseif($_REQUEST['modul']=="daftar_siswa"){
			$bread = "Daftar Siswa";
			}	
			elseif($_REQUEST['modul']=="daftar_kelas"){
			$bread = "Daftar Kelas";
			}			
			elseif($_REQUEST['modul']=="daftar_mapel"){
			$bread = "Daftar Mata Pelajaran";
			}			
			elseif($_REQUEST['modul']=="buat_soal"){
			$bread = "Bank Soal";
			}			
			elseif($_REQUEST['modul']=="upl_foto"||$_REQUEST['modul']=="upload_foto"){
			$bread = "Upload Foto Peserta";
			}	
			elseif($_REQUEST['modul']=="status_tes"){
			$bread = "Status Tes";
			}		

			elseif($_REQUEST['modul']=="daftar_soal"){
			$bread = "Bank Soal";
			}	
			elseif($_REQUEST['modul']=="upl_soal"){
			$bread = "<a href=?modul=buat_soal&soal=$_REQUEST[soal]>Bank Soal</a> &#8226; Upload File Template";
			}			
			elseif($_REQUEST['modul']=="edit_soal"){
			$bread = "<a href=?modul=buat_soal&soal=$_REQUEST[soal]>Bank Soal</a> &#8226; Daftar Edit Soal";
			}
			elseif($_REQUEST['modul']=="edit_data_soal"){
			$bread = "<a href=?modul=buat_soal&soal=$_REQUEST[soal]>Bank Soal</a> &#8226; <a href=?modul=edit_soal&soal=$_REQUEST[soal]>Daftar Soal</a>  &#8226; Edit Soal";
			}																									
			?>

			<!-- Breadcrumb margin : atas-kiri-bawah-kanan !-->
<div id="headtop"  style="width:98%; margin:15px 15px 1px 15px; height:60px; background-color:#fffefb; border-bottom-color:#e4e4e2; font-size:20px; padding:15px;">
<a href="?"><i class="fa fa-home fa-fw"></i> Dashboard </a>&#8226; <?php
if(isset($bread)){
 echo $bread;} ?>
</div>


<div style="width:98%; margin:1px 15px 15px 15px; background-color:#fff; border-bottom-color:#e4e4e2;">

    <!-- /#headtop-->
    <div id="wrapper" style="width:98%; margin-left:15px;height:100%; ">

    <div class="navbar-default sidebar" role="navigation" style="margin-top:15px; border:thin; border-top-color:#CCCCCC">

                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#" data-toggle='modal' data-target='#myInfo'><i class="fa fa-exclamation-circle fa-fw"></i> Info & Tutorial</a>                        </li> 

<?php
if($_COOKIE['beelogin']=="admin"){?>
                        <li>
                            <a href="#"><i class="fa fa-building-o fa-fw"></i> Data Sekolah <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?modul=info_skul"><i class="fa fa-credit-card"></i> Identitas Sekolah</a>                                </li>  
                                <li>
                                    <a href="?modul=buat_user"><i class="fa fa-group"></i> Manajemen User</a>                                </li>
                                <li>
                                    <!-- <a href="?modul=backup_db"> !-->
                                    <a href="?modul=backup"><i class="fa fa-database fa-fw"></i> Database</a>                                </li>                        
                            </ul>
                        </li>

<li>
                            <a href="#"><i class="fa fa-gears fa-fw"></i> Sistem <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?modul=upl_kelas"><i class="fa fa-list-alt "></i> Daftar Kelas</a>                                </li>
                                <li>
                                    <a href="?modul=upl_mapel"><i class="fa fa-flask "></i> Mata Pelajaran</a>                                </li>

                                <li>
                                    <a href="?modul=upl_siswa"><i class="fa fa-group"></i> Daftar Siswa</a>                                </li> 
                            </ul>
                            <!-- /.nav-second-level -->
                      </li>
 
<?php } 
if($_COOKIE['beelogin']=='guru'||$_COOKIE['beelogin']=='admin') {?>
 
						<li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Bank Soal <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
								<a href="?modul=daftar_soal"><i class="fa fa-briefcase   fa-fw"></i> Bank Soal</a>                                </li>
                                <li>
                                 <a href="?modul=upl_filesoal"><i class="fa fa-music fa-fw"></i> File Pendukung Soal</a>                                </li>
                                <li>
                                    <a href="?modul=upl_tugas"><i class="fa fa-cloud-upload"></i> Upload Nilai Tugas</a>                                </li>                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>      
                                
<?php } ?>   
<?php if($_COOKIE['beelogin']=="admin"){?>                        
                        <li>
                            <a href="#"><i class="fa fa-print fa-fw"></i> Cetak<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="#" data-toggle="modal" data-target="#myCetakKartu"><i class="fa fa-credit-card  fa-fw"></i> Kartu Ujian</a>
                                   <!--   <a href="?modul=cetak_kartu">Kartu Ujian</a> !-->
                                </li>
                                <li><a href="#" data-toggle="modal" data-target="#myDaftarHadir"><i class="fa fa-list-alt "></i> Daftar Hadir</a>
                                    <!-- <a href="?modul=cetak_absensi">Daftar Hadir</a> !-->
                                </li>
                                 <li>
                                    <a href="?modul=berita_acara"><i class="fa fa-file-o fa-fw"></i> Berita Acara</a>                                </li>

                                <li>
                                    <a href="#" data-toggle="modal" data-target="#myCetakHasil"><i class="fa fa-file-text-o fa-fw"></i> Daftar Nilai</a>                                </li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#myCetakTO"><i class="fa fa-file-text-o fa-fw"></i> Hasil Try Out</a>                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                        
<li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Status Tes <span class="fa arrow"></span></a>
                            	<ul class="nav nav-second-level">
                                <li>
                                 <a href="?modul=daftar_tesbaru"><i class="fa fa-folder-o fa-fw"></i> Setting Ujian</a>                                </li>
                                <li>
                                 <a href="?modul=aktifkan_jadwaltes"><i class="fa fa-clock-o  fa-fw"></i> Jadwal Tes</a>                                </li>
                            </ul>
                      </li>

<li>
                            <a href="?modul=daftar_peserta"><i class="fa fa-user fa-fw"></i> Status Peserta</a>                        </li>

<li>
                            <a href="?modul=aktifkan_jadwaltes"><i class="fa fa-refresh fa-fw"></i> Reset Login Peserta</a>                        </li>
<?php } ?> 
<?php 
if($_COOKIE['beelogin']=='guru'||$_COOKIE['beelogin']=='admin') {?>
                        <li>
                            <a href="?modul=analisasoal"><i class="fa fa-bar-chart-o fa-fw"></i> Analisa</a>
<!--                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?modul=hasil_peserta" >Hasil Peserta</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#myCetakHasil">Analisa Soal</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                        
						
 
<li>
                            <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Log Out</a>                        </li> 

				
<?php } ?>                                         
                    </ul>
            <!-- /.navbar-static-side -->
        </nav>
                </div>
                <!-- /.sidebar-collapse -->
            </div>


        	<div id="page-wrapper">
  			<?php
			if(isset($_REQUEST['modul'])==""){
			include "none.php";
			}				
			elseif($_REQUEST['modul']=="info_skul"){
			include "upl_skul.php";
			}	
			elseif($_REQUEST['modul']=="detilsiswa"){
			include "detil_siswa.php";
			}				
			elseif($_REQUEST['modul']=="status_tes"){
			include "status_tes.php";
			}	
			elseif($_REQUEST['modul']=="pilih_banksoal"){
			//include "pilih_banksoal.php";
			include "buat_paketbaru.php";
			}	
			elseif($_REQUEST['modul']=="buat_paketsoal"){
			//include "pilih_banksoal.php";
			include "buat_paketbaru.php";
			}												
			elseif($_REQUEST['modul']=="daftar_kelas"){
			include "daftar_kelas.php";
			}	
			elseif($_REQUEST['modul']=="daftar_mapel"){
			include "daftar_mapel.php";
			}	
			elseif($_REQUEST['modul']=="daftar_siswa"){
			include "daftar_siswa.php";
			}
			elseif($_REQUEST['modul']=="daftar_soal"){
			include "daftar_soal.php";
			}		
			elseif($_REQUEST['modul']=="daftar_tesbaru"){
			include "daftar_tesbaru.php";
			}	
			elseif($_REQUEST['modul']=="daftar_peserta"){
			include "daftar_peserta.php";
			}
			elseif($_REQUEST['modul']=="reset_peserta"){
			include "resetpeserta.php";
			}									
			elseif($_REQUEST['modul']=="buat_soal"){
			include "buat_banksoal.php";
			}
			elseif($_REQUEST['modul']=="buat_user"||$_REQUEST['modul']=="hapus_user"){
			include "buat_user.php";
			}			
			elseif($_REQUEST['modul']=="upl_soal"){
			include "upload_soal.php";
			}
			elseif($_REQUEST['modul']=="upl_filesoal"){
			//include "bee_upload.php";
			include "upload_file.php";
			}
			elseif($_REQUEST['modul']=="upl_foto"){
			include "upload_foto.php";
			}	
			elseif($_REQUEST['modul']=="upload_filesoal"){
			include "upload_filesoal.php";
			}	
			elseif($_REQUEST['modul']=="upl_kelas"||$_REQUEST['modul']=="uploadkelas"){
			include "upload_kelas.php";
			}		
			elseif($_REQUEST['modul']=="upl_mapel"||$_REQUEST['modul']=="uploadmapel"){
			include "upload_mapel.php";
			}	
			elseif($_REQUEST['modul']=="upl_siswa"||$_REQUEST['modul']=="uploadsiswa"){
			include "upload_siswa.php";
			}
			elseif($_REQUEST['modul']=="upl_soal"||$_REQUEST['modul']=="uploadsoal"){
			include "upload_soal.php";
			}	
			elseif($_REQUEST['modul']=="upl_tugas"||$_REQUEST['modul']=="uploadtugas"){
			include "upload_tugas.php";
			}				
					
			elseif($_REQUEST['modul']=="tambah_soal"){
				if($_REQUEST['jum']==5){
				include "tambah_soal5.php";}
				elseif($_REQUEST['jum']==4){
				include "tambah_soal4.php";
				}
				elseif($_REQUEST['jum']==1){
				include "tambah_soal.php";
				}			
			}
			elseif($_REQUEST['modul']=="edit_soal"){
				//include "database_soal_edit.php";
				include "edit_daftar_soal.php";
			}			
			elseif($_REQUEST['modul']=="edit_soal_esai"){
				//include "database_soal_edit.php";
				include "bank_soal.php";
			}			
			elseif($_REQUEST['modul']=="edit_data_soal"){
				if($_REQUEST['jum']==5){
				include "bank_soal5.php";}
				elseif($_REQUEST['jum']==4){
				include "bank_soal4.php";
				}
				elseif($_REQUEST['jum']==1){
				include "bank_soal.php";
				}									
			//include "coba.php";
			}
			elseif($_REQUEST['modul']=="hapus_nosoal"){
			include "hapus_nosoal.php";
			}	
			elseif($_REQUEST['modul']=="aktifkan_jadwaltes"){
			include "daftar_tes.php";
			}				
			elseif($_REQUEST['modul']=="cetak_kartu"){
			include "cetak_kartu.php";
			}																																									
			elseif($_REQUEST['modul']=="cetak_absensi"){
			include "cetak_absen.php";
			}	
			elseif($_REQUEST['modul']=="cetak_berita"){
			include "cetak_berita.php";
			}	
			elseif($_REQUEST['modul']=="cetak_hasil"){
			include "cetak_hasil_all.php";
			}	
			elseif($_REQUEST['modul']=="cetak_TO"){
			include "cetak_hasil_TO.php";
			}	
			elseif($_REQUEST['modul']=="hasil_peserta"){
			include "cetak_hasil_analisa.php";
			}	
			elseif($_REQUEST['modul']=="jawabansiswa"){
			include "jawabansiswa.php";
			}	
			elseif($_REQUEST['modul']=="jawabanesai"){
			include "jawabanesai_siswa.php";
			}	

			elseif($_REQUEST['modul']=="analisasoal"){
			include "analisa_soal.php";
			}	
			elseif($_REQUEST['modul']=="analisajawaban"){
			include "analisa_jawaban.php";
			}																																																								
			elseif($_REQUEST['modul']=="analisabutir"){
			include "analisa_butirsoal.php";
			}	
			elseif($_REQUEST['modul']=="sebaran_nilai"){
			include "sebaran_nilai.php";
			}	
			elseif($_REQUEST['modul']=="lks"){
			include "lks.php";
			}	
			elseif($_REQUEST['modul']=="backup"){
			include "backup.php";
			}
			elseif($_REQUEST['modul']=="restore"){
			include "../../database/restore.php";
			}
			elseif($_REQUEST['modul']=="backup_db"){
			include "../../database/cbt_jawaban.php";
			}	
			elseif($_REQUEST['modul']=="edit_tes"){
			include "edit_tes.php";
			}	
			elseif($_REQUEST['modul']=="sinkron"||$_REQUEST['modul']=="sinkronsatu"){
			include "sinkron.php";
			}	
			elseif($_REQUEST['modul']=="berita_acara"){
			include "berita_acara.php";
			}																																																															
			/*
			elseif($_REQUEST['modul']=="backup"){
			include "../../database/cbt_jawaban.php";
			}*/				
			?>

            </div>
            <!-- /page wrapper -->                            

    </div>
    <!-- /#wrapper -->
</div>  



               <!-- Modal -->
<div class="modal fade" id="myInfo" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title page-label" align="right">
                    CBT BeeSMART  V3.0 by <a href="http://www.tuwagapat.com" target="_blank">TUWAGAPAT.COM </a>| Find us on Facebook <a href="https://www.facebook.com/BSMARTLabs/"><img src="images/fb.png"> </a> </h1>
                </div>
                <div class="panel-body">
                    <div class="inner-content">
                        <div class="wysiwyg-content">
                             <p> <img src="../../images/besmart.png" width="570"></p>
                        	<p> <a href="https://www.youtube.com/watch?v=aceevCaKKH8&list=PLaRJCwMbrhIIj44b9JY08hf9C-FyJMtEt" target="_blank">Click</a> 
                            to Watch CBT BeeSMART on <a href="https://www.youtube.com/watch?v=aceevCaKKH8&list=PLaRJCwMbrhIIj44b9JY08hf9C-FyJMtEt" target="_blank">
                            <img src="images/youtube.png" width="100"></a> or Join us on <a href="https://t.me/joinchat/AAAAAAtB2PtpcsPMaFEuKQ" target="_blank">
                            <img src="images/telegram.png" width="50"></a> <b>Telegram </b> </p>                           
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-offset-4 col-xs-9">
                            <button type="submit" class="btn btn-default btn-sm" data-dismiss="modal">
                           <i class="fa fa-file-pdf-o"></i> PDF Download</button>
                           <button type="submit" class="btn btn-default btn-sm" data-dismiss="modal">
                           <i class="glyphicon glyphicon-minus-sign"></i> Close</button>
                        </div>
                    </div>
                </div></form>
            </div>
        </div>
    </div>
</div>


               <!-- Modal -->
<div class="modal fade" id="myDaftarHadir" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title page-label"><i class="glyphicon glyphicon-print"></i> | Daftar Hadir</h1>
                </div><form action="?modul=cetak_absensi" method="post">
                <div class="panel-body">
                    <div class="inner-content">
                        <div class="wysiwyg-content">
                            <p><table width="100%">
                                <tr height="30px"><td>Jurusan </td><td>:                                 
                                <select id="jur1"  name="jur1">
<?php 
								$sqk = mysql_query("select * from cbt_kelas group by XKodeJurusan");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XKodeJurusan]'>$rs[XKodeJurusan]</option>";
								} ?>                                
                                </select>
</td></tr> 
                                <tr height="30px"><td width="30%">Kelas </td><td>:
                                <select id="iki1"  name="iki1">
<?php 
								$sqk = mysql_query("select * from cbt_kelas group by XKodeKelas");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XKodeKelas]'>$rs[XKodeKelas]</option>";
								} ?>                                
                                </select>
                                </td></tr>
                                <tr height="30px"><td width="30%">Sesi </td><td>:
                                <select id="sesi1"  name="sesi1">
<?php 
								$sqk = mysql_query("select * from cbt_siswa group by XSesi");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XSesi]'>$rs[XSesi]</option>";
								} ?>                                
                                </select>
                                </td></tr>
                                <tr height="30px"><td width="30%">Ruang </td><td>:
                                <select id="ruang1"  name="ruang1">
<?php 
								$sqk = mysql_query("select * from cbt_siswa group by XRuang");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XRuang]'>$rs[XRuang]</option>";
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

    <!-- Modal -->
<div class="modal fade" id="myCetakHasil" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title page-label"><i class="glyphicon glyphicon-print"></i> | Hasil Ujian</h1>
                </div><form action="?modul=cetak_hasil" method="post">
                <div class="panel-body">
                    <div class="inner-content">
                        <div class="wysiwyg-content">
                            <p><table width="100%">
<tr height="30px"><td>Jenis Tes</td><td>:                                 
                                <select id="tes3"  name="tes3">
<?php 
								$sqk = mysql_query("select * from cbt_tes");
								echo "<option value='A' selected>Semua</option>";								
								//while($rs = mysql_fetch_array($sqk)){
                             	//echo "<option value=$rs[XKodeUjian]>$rs[XNamaUjian]</option>";
								//} 
								?>                                
                                </select>
</td></tr>        
                                <tr><td width="30%">Semester</td><td>:
                                <select id="sem3"  name="sem3">
<?php 
  							   echo "<option value=1>Ganjil</option>";
                               echo "<option value=2>Genap</option>";
								?>                                
                                </select>
                                </td></tr>
                     
                                <tr height="30px"><td>Jurusan </td><td>:                                 
                                <select id="jur3"  name="jur3">
<?php 
								$sqk = mysql_query("select * from cbt_kelas group by XKodeJurusan");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XKodeJurusan]'>$rs[XKodeJurusan]</option>";
								} ?>                                
                                </select>
</td></tr> 
                                <tr><td width="30%">Kelas </td><td>:
                                <select id="iki3"  name="iki3">
<?php 
								$sqk = mysql_query("select * from cbt_kelas group by XKodeKelas");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XKodeKelas]'>$rs[XKodeKelas]</option>";
								} ?>                                
                                </select>
                                </td></tr>
                                <tr height="30px"><td>Mata Pelajaran </td><td>:                                 
                                <select id="map3"  name="map3">
<?php 
								$sqk = mysql_query("select * from cbt_mapel");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XKodeMapel]'>$rs[XNamaMapel]</option>";
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

    <!-- Modal -->
<div class="modal fade" id="myCetakTO" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title page-label"><i class="glyphicon glyphicon-print"></i> | Hasil Ujian</h1>
                </div><form action="?modul=cetak_TO" method="post">
                <div class="panel-body">
                    <div class="inner-content">
                        <div class="wysiwyg-content">
                            <p><table width="100%">
<tr height="30px"><td>Jenis Tes</td><td>:                                 
                                <select id="tes3"  name="tes3">
<?php 
								$sqk = mysql_query("select * from cbt_tes");
								echo "<option value='TO' >Try Out</option>";																							
								//while($rs = mysql_fetch_array($sqk)){
                             	//echo "<option value=$rs[XKodeUjian]>$rs[XNamaUjian]</option>";
								//} 
								?>                                
                                </select>
</td></tr>        
                                <tr><td width="30%">Semester</td><td>:
                                <select id="sem3"  name="sem3">
<?php 

  							   echo "<option value=1>Ganjil</option>";
                               echo "<option value=2>Genap</option>";

								?>                                
                                </select>
                                </td></tr>
                     
                                <tr height="30px"><td>Jurusan </td><td>:                                 
                                <select id="jur3"  name="jur3">
<?php 
								$sqk = mysql_query("select * from cbt_kelas group by XKodeJurusan");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XKodeJurusan]'>$rs[XKodeJurusan]</option>";
								} ?>                                
                                </select>
</td></tr> 
                                <tr><td width="30%">Kelas </td><td>:
                                <select id="iki3"  name="iki3">
<?php 
								$sqk = mysql_query("select * from cbt_kelas group by XKodeKelas");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XKodeKelas]'>$rs[XKodeKelas]</option>";
								} ?>                                
                                </select>
                                </td></tr>
                                <tr height="30px"><td>Mata Pelajaran </td><td>:                                 
                                <select id="map3"  name="map3">
<?php 
								$sqk = mysql_query("select * from cbt_mapel");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XKodeMapel]'>$rs[XNamaMapel]</option>";
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

<!-- margin : atas-kiri-bawah-kanan !-->
<div id="headtop"  style="width:98%; margin:0px 15px 15px 15px; height:60px; background-color:#fffefb; border-bottom-color:#e4e4e2; font-size:14px; padding:15px; text-align:center">CBT BEESMART | By tuwagapat.com</div>

</body>

</html>
    <script>
        function disableBackButton() {
            window.history.forward();
        }
        setTimeout("disableBackButton()", 0);
    </script>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

<script src="../../js/jquery.wallform.js"></script>
    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
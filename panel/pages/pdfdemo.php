<html>
<head>
<title>gDocsViewer Demo</title>
<script type="text/javascript" src="jquery.gdocsviewer.min.js"></script> 

<script type="text/javascript"> 
/*<![CDATA[*/
$(document).ready(function() {
	$('a.embed').gdocsViewer({width: 600, height: 750});
	$('#embedURL').gdocsViewer();
});
/*]]>*/
</script> 
</head>
<body>
<?php

function kartu($am) {

$sqlam = mysql_query("select * from cbt_siswa where Urut = '$am'");
$a = mysql_fetch_array($sqlam);

if(str_replace(" ","",$a['XFoto'])==""){$pic = "nouser.png";}else{$pic="$a[XFoto]";}
?>
<table style="width:10.2cm;border:1px solid black; padding:55px; font-family:Arial, Helvetica, sans-serif; font-size:12px" class="kartu" border="0">
					<tbody>
                    <tr>
						<td colspan="3" style="border-bottom:1px solid black; padding:2px" align="center">
							<table width="98%" class="kartu" cellpadding="10px">
							<tbody><tr>
								<td><img src="images/tut.jpg" height="50"></td>
								<td align="center" style="font-weight:bold">
									KARTU PESERTA UBK <br>UJIAN BERBASIS KOMPUTER <BR /> 
							  </td>
							</tr>
							</tbody></table>
						</td>
					</tr>
			<tr height="20px"><td width="90">&nbsp;Nama Peserta</td><td width="8">:</td><td width="226" style="font-size:12px;font-weight:bold;"><?php echo $a['XNamaSiswa']; ?></td></tr>
			<tr height="20px"><td>&nbsp;Jurusan</td><td>:</td><td style="font-size:12px;font-weight:bold;"><?php echo $a['XKodeJurusan']; ?></td></tr>            
			<tr height="20px"><td height="25px">&nbsp;Username</td><td>:</td><td style="font-size:12px;font-weight:bold;"><?php echo $a['XNomerUjian']; ?></td></tr>
			<tr height="20px"><td>&nbsp;Password</td><td>:</td><td style="font-size:12px;font-weight:bold;"><?php echo $a['XPassword']; ?></td></tr>
			<tr height="80px"><td rowspan="4" align="center"><img src="../../fotosiswa/<?php echo $pic; ?>" height="80px" border="thin solid red"></td>
            <td colspan="2" valign="top" align="center"><br>Nama Sekolah</td></tr>                   
			<td style="font-size:12px;font-weight:bold;" colspan="2" align="center">Ttd ,</td></tr>
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr><td colspan="2" align="center">Kepala Sekolah</td></tr>
                    
				</tbody></table>
<?php        
}

//koneksi database
mysql_connect("localhost:3307", "root", "");
mysql_select_db("cbt");//fungsi pagination
$BatasAwal = 50;
$cekQuery = mysql_query("SELECT * FROM cbt_siswa");
$jumlahData = mysql_num_rows($cekQuery);
$jumlahn = 8;
$n = ceil($jumlahData/$jumlahn);

for($i=1;$i<=$n;$i++){ ?>
	<div style="background:#999; height:1275px;" ><br>
	<div style="background:#fff; width:70%; margin:0 auto; padding:30px; height:90%;">
<?php
$mulai = $i-1;
$batas = ($mulai*$jumlahn);
$startawal = $batas;
$batasakhir = $batas+$jumlahn;

?>
		<table width="100%" border="0">
        <tr><td><?php kartu($startawal+1); ?></td><td><?php kartu($startawal+5); ?></td></tr>
        <tr><td><?php kartu($startawal+2); ?></td><td><?php kartu($startawal+6); ?></td></tr>
        <tr><td><?php kartu($startawal+3); ?></td><td><?php kartu($startawal+7); ?></td></tr>
        <tr><td><?php kartu($startawal+4); ?></td><td><?php kartu($startawal+8); ?></td></tr>
        </table>
    </div>
    </div>
<?php } ?>
</body>
</html>
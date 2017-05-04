<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<table width="470" border=0>
<tr>
<?php
//koneksi database
mysql_connect("localhost:3307", "root", "");
mysql_select_db("cbt");//fungsi pagination
$BatasAwal = 50;

if (!empty($_GET['page']))  {
$hal = $_GET['page'] - 1;
$MulaiAwal = $BatasAwal * $hal;
} else if (!empty($_GET['page']) and $_GET['page'] == 1) {
$MulaiAwal = 0;
} else if (empty($_GET['page'])) {
$MulaiAwal = 0;
}//tampil data
$kolom = 2;
$i = 0;
$query = mysql_query("SELECT * FROM cbt_siswa LIMIT $MulaiAwal , $BatasAwal");
while ($record = mysql_fetch_array($query)) {
	   if ($i >= $kolom) {
        echo "<tr></tr>";
        $i = 0;
    }
    $i++;
?>
    <td width="464"><table width="394">
<table style="width:9cm;border:1px solid black;" class="kartu">
					<tbody><tr>
						<td colspan="3" style="border-bottom:1px solid black">
							<table width="100%" class="kartu">
							<tbody><tr>
								<td><img src="images/1.jpg" height="40"></td>
								<td align="center" style="font-weight:bold">
									KARTU PESERTA UJIAN CBT <BR /> 
							  </td>
							</tr>
							</tbody></table>
						</td>
					</tr>
					<tr><td width="90">Nama Peserta</td><td width="8">:</td><td width="226" style="font-size:12px;font-weight:bold;"><?php echo $record['XNamaSiswa']; ?></td></tr>
					
					<tr><td>Username</td><td>:</td><td style="font-size:12px;font-weight:bold;"><?php echo $record['XNomerUjian']; ?></td></tr>
					<tr><td>Password</td><td>:</td><td style="font-size:12px;font-weight:bold;"><?php echo $record['XPassword']; ?></td></tr>
					<tr><td>&nbsp;</td><td></td>
					<td style="font-size:12px;font-weight:bold;">Ttd ,</td></tr>
					<tr><td>&nbsp;</td><td></td>
					<td>&nbsp; </td></tr>
					<tr><td>&nbsp;</td><td></td>
					<td><span style="font-size: 12px">Panitia Ujian CBT</span></td></tr>
				</tbody></table><hr size="25" color="#FFFFFF"></td>
                
<?php
}

?>
</tr>
</table>
<?php
$cekQuery = mysql_query("SELECT * FROM cbt_siswa");
$jumlahData = mysql_num_rows($cekQuery);
if ($jumlahData > $BatasAwal) {
echo '<br/><center><div style="font-size:10pt;">Page : ';
$a = explode(".", $jumlahData / $BatasAwal);
$b = $a[0];
$c = $b + 1;
for ($i = 1; $i <= $c; $i++) {
echo '<a style="text-decoration:none;';
if ($_GET['page'] == $i) {
echo 'color:red';
}
echo '" href="?page=' . $i . '">' . $i . '</a>, ';
}
echo '</div><button onclick="window.print()">Cetak Halaman Web</button></center>';
}
?>
<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>

<?php
include "../../config/server.php";
    if($_REQUEST['urut']) {
        $id = $_POST['urut'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = mysql_query("SELECT * FROM cbt_siswa WHERE Urut = '$id'");
        $r = mysql_fetch_array($sql);
        ?>
 
        <!-- MEMBUAT FORM -->
        <form action="?modul=daftar_siswa&simpan=yes" method="post">
            <input type="hidden" name="id" value="<?php echo $r['Urut']; ?>">
            <div class="form-group">
                <label>Nama Pesertas</label>
                <input type="text" class="form-control" name="txt_nam" value="<?php echo $r['XNamaSiswa']; ?>">
            </div>
            <div class="form-group">
                <label>Nomer Peserta</label>
                <input type="text" class="form-control" name="txt_nom" value="<?php echo $r['XNomerUjian']; ?>">
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
								<?php 
								echo "<option value='$r[XKodeLevel]' selected >$r[XKodeLevel]</option>";
								$sqk = mysql_query("select * from cbt_kelas group by XKodeLevel");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XKodeLevel]' class='form-control' >$rs[XKodeLevel]</option>";} ?>                                
                                </select>     
                </td><td>&nbsp;</td><td>
                				<select id="txt_kelas"  name="txt_kelas" class="form-control" >
								<?php 
								echo "<option value='$r[XKodeKelas]' selected >$r[XKodeKelas]</option>";
								$sqk = mysql_query("select * from cbt_kelas group by XKodeKelas");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XKodeKelas]' class='form-control' >$rs[XKodeKelas]</option>";} ?>                                
                                </select>              
                </td>
                </td><td>&nbsp;</td><td>
                				<select id="jur2"  name="jur2" class="form-control">
								<?php 
								echo "<option value='$r[XKodeJurusan]' selected >$r[XKodeJurusan]</option>";
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
                <input type="text" class="form-control" name="txt_nisn" value="<?php echo $r['XNIK']; ?>" size="5">
                </td><td>&nbsp;</td><td>
                <input type="text" class="form-control" name="txt_potret" value="<?php echo $r['XFoto']; ?>">                
                </td><td>&nbsp;</td><td>
              
                				<select id="txt_jekel"  name="txt_jekel" class="form-control">
								<option value='L' <?php if($r['XJenisKelamin']=="L"){echo "selected";} ?>>Laki-laki</option>
								<option value='P' <?php if($r['XJenisKelamin']=="P"){echo "selected";} ?>>Perempuan</option>                                
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
                <td><label>Agama</label></td>
                </tr>
                <tr><td>
                <input type="text" class="form-control" name="txt_pas" value="<?php echo $r['XPassword']; ?>" size="5">
                </td><td>&nbsp;</td><td>
                 <select id="txt_sesi"  name="txt_sesi" class="form-control">
								<?php 
								echo "<option value='$r[XSesi]' selected>$r[XSesi]</option>";
								$sqk = mysql_query("select * from cbt_siswa group by XSesi");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XSesi]'>$rs[XSesi]</option>";
								} ?>                                
                                </select>               
                </td><td>&nbsp;</td><td>
                                <select id="txt_ruang"  name="txt_ruang" class="form-control">
								<?php 
								echo "<option value='$r[XRuang]' selected >$r[XRuang]</option>";
								$sqk = mysql_query("select * from cbt_siswa group by XRuang");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XRuang]'>$rs[XRuang]</option>";
								} ?>                                
                                </select>                   
               
                </td> <td>
                                <select id="txt_agama"  name="txt_agama" class="form-control">
								<?php 
								echo "<option value='$r[XAgama]' selected >$r[XAgama]</option>";
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
								echo "<option value='$r[XPilihan]' selected >$r[XPilihan]</option>";
								$sqk = mysql_query("select * from cbt_siswa where not XPilihan ='' group by XPilihan");
								while($rs = mysql_fetch_array($sqk)){
                             	echo "<option value='$rs[XPilihan]'>$rs[XPilihan]</option>";
								} ?>                                 
                                </select>                
                </td>                                               
                </td></tr>                    
                
                </table>
                
                   
                
            </div>

              <button class="btn btn-primary" type="submit">Update</button>
        </form>
 
        <?php } 
?>
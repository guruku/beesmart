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
        $sql = mysql_query("SELECT * FROM cbt_kelas WHERE Urut = '$id'");
        $r = mysql_fetch_array($sql);
        ?>
 
        <!-- MEMBUAT FORM -->
        <form action="?modul=daftar_kelas&simpan=yes" method="post">
            <input type="hidden" name="id" value="<?php echo $r['Urut']; ?>">
            <div class="form-group">
                <label>Kode Kelas</label>
                <input type="text" class="form-control" name="txt_kodkel" value="<?php echo $r['XKodeKelas']; ?>">
            </div>

            <div class="form-group">
                <label>Nama Kelas</label>
                <input type="text" class="form-control" name="txt_namkel" value="<?php echo $r['XNamaKelas']; ?>">
            </div>
            <div class="form-group">
                <label>Kode Level</label>
                <input type="text" class="form-control" name="txt_kodlev" value="<?php echo $r['XKodeLevel']; ?>">
            </div>
            <div class="form-group">
                <label>Jurusan</label>
                <input type="text" class="form-control" name="txt_jur" value="<?php echo $r['XKodeJurusan']; ?>">
            </div>

              <button class="btn btn-primary" type="submit">Update</button>
        </form>
 
        <?php } 
?>
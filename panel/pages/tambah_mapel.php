        <!-- MEMBUAT FORM -->
        <form action="?modul=daftar_mapel&simpan=yes" method="post">
            <input type="hidden" name="id" value="<?php echo $r['Urut']; ?>">
            <div class="form-group">
 				<table width="100%" border="0" cellpadding="5px" cellspacing="5px">
                <tr>
                <td><label>Kode Mapel</label></td>
                <td>&nbsp;</td>
                <td><label>Nama Mapel</label></td>
                <td>&nbsp;</td>
                </tr>
				<tr><td>
                <input type="text" class="form-control" name="txt_kokel" value="<?php echo $r['XKodeMapel']; ?>">                
                </td><td>&nbsp;</td><td>
                <input type="text" class="form-control" name="txt_nakel" value="<?php echo $r['XNamaMapel']; ?>">                
                </td>
                </td><td>&nbsp;</td>
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
                <input type="text" class="form-control" name="txt_UH" value="<?php echo $r['XPersenUH']; ?>">                
                </td><td>&nbsp;</td><td>
                <input type="text" class="form-control" name="txt_UTS" value="<?php echo $r['XPersenUTS']; ?>">                
                </td>
                </td><td>&nbsp;</td>
                <td>
                <input type="text" class="form-control" name="txt_UAS" value="<?php echo $r['XPersenUAS']; ?>">                
                </td><td>&nbsp;</td><td>
                <input type="text" class="form-control" name="txt_KKM" value="<?php echo $r['XKKM']; ?>">                
                </td>
                </td><td>&nbsp;</td>
                </tr>
                </table>
            </div>
 
              <button class="btn btn-primary" type="submit">Update</button>
        </form>

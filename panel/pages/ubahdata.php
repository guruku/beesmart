<?php
include "../../config/server.php";
$sql = mysql_query("update cbt_admin set 
XSekolah = '$_REQUEST[txt_nama]',
XTingkat = '$_REQUEST[txt_ting]',
XAlamat = '$_REQUEST[txt_alam]',
XTelp = '$_REQUEST[txt_telp]',
XFax = '$_REQUEST[txt_facs]',
XEmail = '$_REQUEST[txt_emai]',
XWeb = '$_REQUEST[txt_webs]',
XAdmin = '$_REQUEST[txt_adm]',
XWarna = '$_REQUEST[txt_col]',
XKodeSekolah = '$_REQUEST[txt_kode]',
XNIPKepsek = '$_REQUEST[txt_nip1]',
XNIPAdmin = '$_REQUEST[txt_nip2]',
XKepSek = '$_REQUEST[txt_ip]'");

echo "Ubah data berhasil !"; 
?>
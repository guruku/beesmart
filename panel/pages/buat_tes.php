<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<?php include "../../config/server.php";   ?>
<script type="text/javascript" src="jquery-1.4.js"></script>
<script>    
$(document).ready(function(){

	var loading = $("#loading");
	var tampilkan = $("#tampilkan1");
	var tampilkan2 = $("#tampilkan2");
 	var idstu = $("#idstu").val();

	function tampildata(){
	tampilkan.hide();
	loading.fadeIn();
	
	$.ajax({
    type:"POST",
    url:"tampiltabel.php",  
	data:"aksi=tampil&idstu=" + idstu,  
	success: function(data){ 
		loading.fadeOut();
		tampilkan.html(data);
		tampilkan.fadeIn(2000);
	   }
    }); 
	}// akhir fungsi tampildata
	tampildata();


});
</script>
<script>    
$(document).ready(function(){

	var loading = $("#loading");
	var tampilkan2 = $("#tampilkan2");

	function tampildata2(){
	tampilkan2.hide();
	loading.fadeIn();
	
	
	$.ajax({
    type:"POST",
    url:"tampiltes.php",  
	data:"aksi=tampil",  
	success: function(data){ 
		loading.fadeOut();
		tampilkan2.html(data);
		tampilkan2.fadeIn(2000);
	   }
    }); 
	}// akhir fungsi tampildata
	tampildata2();


 $("#simpan").click(function(){
 var txt_ujian = $("#txt_ujian").val();
 var txt_waktu = $("#datetimepicker_mask").val();
 var txt_token = $("#txt_token").val();
 var txt_durasi = $("#txt_durasi").val();
 var txt_telat = $("#txt_telat").val();
 var txt_soal = $("#txt_soal").val();  
 var txt_mapel = $("#txt_mapel").val();
 var txt_level = $("#txt_level").val();  
  
 $.ajax({
     type:"POST",
     url:"ubahtes.php",    
     data: "aksi=simpan&txt_ujian=" + txt_ujian + "&txt_waktu=" + txt_waktu + "&txt_token=" + txt_token + "&txt_telat=" + txt_telat + "&txt_durasi=" + txt_durasi + "&txt_soal=" + txt_soal + "&txt_level=" + txt_level + "&txt_mapel=" + txt_mapel,
	 success: function(data){
	 $("#info").html(data);
	 tampildata2();
	 }
	 });
	 });

$("#tambah").click(function(){
 var pesan = $("#pesan").val();
 var kelas = $("#kelas").val();
 var pesan = $("#pesan").val();
 var jawaban = $("#jawaban").val();

 $.ajax({
     type:"POST",
     url:"jawab.php",    
     data: "aksi=simpan&pesan=" + pesan + "&kelas=" + kelas + "&jawaban=" + jawaban,
	 success: function(data){
	 $("#info").html(data);
	 tampildata();
	 }
	 });
	 });

}); // akhir script
</script>

    <script src="js/jquery1.min.js"></script>
    <script src="js/nedna.js"></script>
    <script type="text/javascript">
$.noConflict();
jQuery( document ).ready(function( $ ) {
  // Code that uses jQuery's $ can follow here.

      $( 'ul.nav.nav-tabs  a' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
      } );

      ( function( $ ) {
          // Test for making sure event are maintained
          $( '.js-alert-test' ).click( function () {
            alert( 'Button Clicked: Event was maintained' );
          } );
          fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
      } )( jQuery );
});
// Code
    </script>
       
 <?php $tgljam = date("Y/m/d H:i");  
 $tgl = date("Y/m/d"); 
 ?>
  <link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>
<style type="text/css">

.custom-date-style {
	background-color: red !important;
}

.input{	
}
.input-wide{
	width: 500px;
}

</style>
<?php 
$tglx = date("Y/m/d");
$jamx = date("H:i:s");
?>
<script src="date/jquery.js"></script>
<script src="jquery.datetimepicker.full.js"></script>
<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/
$.noConflict();
jQuery( document ).ready(function( $ ) {
$.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
	$("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
	$.datetimepicker.setLocale($(e.currentTarget).val());
});

$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'1986/01/05'
});
$('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});
$('.some_class').datetimepicker();
$('#default_datetimepicker').datetimepicker({
	formatTime:'H:i',
	//formatDate:'d.m.Y',
	formatDate:'Y.m.d',
	//defaultDate:'8.12.1986', // it's my birthday
	defaultDate:'+03.01.1970', // it's my birthday
	defaultTime:'10:00',
	timepickerScrollbar:false
});
$('#datetimepicker10').datetimepicker({
	step:5,
	inline:true
});
$('#datetimepicker_mask').datetimepicker({
	mask:'9999/19/39 29:59'
});
$('#datetimepicker_mask').datetimepicker({value:'<?php echo "$tglx $jamx"; ?>',step:10});
$('#datetimepicker_dark').datetimepicker({theme:'dark'})
        }); 
</script>
    <link href="nedna.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="jquery.datetimepicker.css"/>

<div id="main">
    <div id="left" style="float: left; width: 45%; height: 500px; margin-top:10px"> 
       <table border="0" width="90%" align="center">
                        <tr height="40px"><td> Mata Uji </td><td>
								<select name="txt_mapel" id="txt_mapel">
                                <?php
                                include "../cbt_con.php";
                                $sqlkelas = mysql_query("select * from cbt_mapel order by XNamaMapel");
                                while($sk = mysql_fetch_array($sqlkelas)){
                                echo "<option value='$sk[XKodeMapel]'>$sk[XNamaMapel]</option>";
                                }
                                ?>
                                </select>
                            </td></tr>
                        	<tr height="40px"><td> Kelas </td><td>
								<select name="txt_level" id="txt_level">
                                <?php echo "<option>-- Pilih Kelas --</option>";
                                include "../cbt_con.php";
                                $sqlkelas = mysql_query("select * from cbt_kelas where XStatusKelas = '1' order by Urut");
                                while($sk = mysql_fetch_array($sqlkelas)){
                                echo "<option value='$sk[XLevelKelas]'>$sk[XKodeLevel] - $sk[XLevelKelas]</option>";
                                }
                                ?>
                                </select>
                            </td></tr>
                        	<tr height="40px"><td> Grup Soal </td><td>
                                <select name="txt_ujian" id="txt_ujian">
                                <?php echo "<option>-- Pilih Tes --</option>";
                                $sqltes= mysql_query("select * from cbt_ujian where XStatusKelas = '1' order by XKodeKelas");
                                while($sk = mysql_fetch_array($sqlkelas)){
                                echo "<option value='$sk[XKodeSoal]'>$sk[XKodeSoal]</option>";
                                }
                                ?>
                                </select>
                            </td></tr>
                        	<tr height="40px"><td> Jumlah Soal </td><td>
                            		<input type="text" value="" id="txt_soal" size="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
                                    &nbsp;<label id="txt_jumsoal" style="font-style:normal; font-weight:normal; color:#999"></label>
                            </td></tr>
                            
                        	<tr height="40px"><td> Waktu Tes </td><td>
                            		<input type="text" value="" id="datetimepicker_mask"/>
                            </td></tr>
                        	<tr height="40px"><td> Durasi Tes</td><td>
                            	<input type="text" id="txt_durasi" name="txt_durasi" size="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> Menit 
                            </td></tr>
                        	<tr height="40px"><td> Maks. Terlambat </td><td>
                                <input type="text" id="txt_telat" name="txt_telat" size="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> Menit
                            </td></tr>
                        	<tr height="40px"><td> Token </td><td>
                                <input type="text" id="txt_token" name="txt_token" value="-" size="" readonly>
                            </td></tr>
                        	<tr height="40px"><td>  </td><td>
							<input type="submit" class="btn btn-success" id="simpan" value="Simpan">
                            </td></tr></table>
    </div>

    <div id="right" style="float: left; background: #EEEEEE;height: 500px; width:600px">
        <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title">Tes Sedang Aktif di Server Ini</h3>
                              </div>
                              <div class="panel-body">
                               	             <div id="tampilkan2"></div>                                             
                              </div>                           
         </div>
    </div>
    
	</div> <!-- div main !-->

    <title>CBT BEESMART </title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
</head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
.left {
    float: left;
    width: 55%;
}
.right {
    float: right;
    width: 45%;
	margin-top:300px;
}
.group:after {
    content:"";
    display: table;
    clear: both;
}
img {
    max-width: 100%;
    height: auto;
}
@media screen and (max-width: 480px) {
    .left, 
    .right {
        float: none;
        width: auto;
		margin-top:10px;		
    }
	input[type=password]:focus {
    background-color: #fff;
    color: #999;
	width:100%;
	}
	input[type=password] {
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
	border:0;
	border-bottom: 2px solid #939292;
    background-color: #eae9e9;
    color: white;
	padding-right:50px;
	margin-right:150;
	width:100%;	
	}
input[type=text] {
	width:100%;
}
input[type=text]:focus {
	width:80%;
}	
}
</style>
<style>
input[type=text] {
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
	border:0;
	    border-bottom: 2px solid #939292;
    background-color: #eae9e9;
    color: #999;
	width:35%;
}
input[type=text]:focus {
    background-color: #fff;
    color: #999;
	width:35%;
}
input[type=password] {
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
	border:0;
	    border-bottom: 2px solid #939292;
    background-color: #eae9e9;
    color: white;
	width:45%;
}
input[type=password]:focus {
    background-color: #fff;
    color: #999;
	width:45%;
}
.switch-field {
  font-family: "Lucida Grande", Tahoma, Verdana, sans-serif;
	overflow: hidden;
}

.switch-title {
  margin-bottom: 6px;
}

.switch-field input {
  display: none;
}

.switch-field label {
  float: left;
}

.switch-field label {
  display: inline-block;
  width: 60px;
  background-color: #e4e4e4;
  color: rgba(0, 0, 0, 0.6);
  font-size: 14px;
  font-weight: normal;
  text-align: center;
  text-shadow: none;
  padding: 6px 14px;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
  -webkit-transition: all 0.1s ease-in-out;
  -moz-transition:    all 0.1s ease-in-out;
  -ms-transition:     all 0.1s ease-in-out;
  -o-transition:      all 0.1s ease-in-out;
  transition:         all 0.1s ease-in-out;
}

.switch-field label:hover {
	cursor: pointer;
}

.switch-field input:checked + label {
  background-color: #A5DC86;
  -webkit-box-shadow: none;
  box-shadow: none;
}

.switch-field label:first-of-type {
  border-radius: 4px 0 0 4px;
}

.switch-field label:last-of-type {
  border-radius: 0 4px 4px 0;
}
#ingat{width:84%; height:90px; background-color:#FBECF0; border:0; border-left:thick #FF0000 solid; padding-left:10; padding-top:15}
</style>
    <script>
        function disableBackButton() {
            window.history.forward();
        }
        setTimeout("disableBackButton()", 0);
    </script>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="script.js"></script>
<script>function validateForm() {
    var x = document.forms["loginform"]["userz"].value;
    var y = document.forms["loginform"]["passz"].value;
    var peluru = '\u2022';
    if (x == null || x == "" || y == null || y == "") {
//        alert("Name must be filled out");
		document.getElementById("ingat").style.display = "block";
		document.getElementById("isine").textContent= peluru+"Username dan Password harus diisi";
        return false;
    }
	
	
}

</script>
<?php
// Connect to MySQL
include "../../config/server.php";

if(isset($sqlconn)){
//echo "Database $sqlconn";
} else {
$pesan1 = "Tidak dapat Koneksi Database.";
}
if (!$sqlconn) {
    die('Could not connect: ' . mysql_error());
}

// Make my_db the current database
$db_selected = mysql_select_db('beesmartv3', $sqlconn);

if (!$db_selected) {
  // If we couldn't, then it either doesn't exist, or we can't see it.
  $sql = 'CREATE DATABASE beesmartv3';

  if (mysql_query($sql, $sqlconn)) {
  //    echo "Database my_db created successfully\n";
  
  
  } else {
  //    echo 'Error creating database: ' . mysql_error() . "\n";
  }
}
$val = mysql_query('select 1 from `cbt_admin` LIMIT 1');
?>

<div class="group">
    <div class="left">
     <img src="images/bsmart2.jpg" alt="" />    
    </div>

<div id="kepala" style="margin-top:0px; color:#86898e; background-color:#e8edf0;"><br />
<h2>BEESMART STUDIO</h2><h3 style='margin-top:-5px'>www.tuwagapat.com | Griyashanta Eksekutif P333 Malang</h3><br />
    
    </div>     
    <div class="right">
	    <div>
        <h1>CBT BeeSMART Login</h1>
        <p style="color:#8b8a8a">Selamat datang di aplikasi CBT BeeSMART.
		<br>Silahkan masukkan Username dan Password </p>
        <div id="ingat" style=" display:none"> <p>
        	<span style=" padding:20px; padding-top:20; font-size:16px">Peringatan</span>
        </p>        
        <p>
            <span id="isine" style="color:#CC3300; margin-left:20px;" >
            <?php 
if($val == FALSE)
{?>
<script>
$(document).ready(function(){
    var peluru = '\u2022';
		document.getElementById("ingat").style.display = "block";
		document.getElementById("isine").textContent= peluru+" <?php echo "Database belum Terbentuk, Klik disini untuk Proses Buat Database"; ?>";
        return false;
});		
</script>
<?php 
}
?>
            </span>
            <?php 
if($val == FALSE)
{?><a href="buat_database.php">
<input type="submit"  class="btn btn-danger btn-small" value="Buat Database"></a>
<?php 
}
?>
        </p> 
        </div>
        <form id="loginform"  name="loginform" onSubmit="return validateForm();" action="../pages/ceklogin.php" method="post">
        <div>
  <input type="text" id="userz" name="userz" placeholder="Username">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="password" id="passz" name="passz" placeholder="Password">
   <div class="switch-field">
      <input type="radio" id="switch_left" name="login" value="admin" checked/>
      <label for="switch_left">Admin</label>
      <input type="radio" id="switch_right" name="login" value="guru" />
      <label for="switch_right">Guru</label>
    </div>
<?php 
if(!$val == FALSE) {?>   
<p style="text-align:right; width:84%"><input type="submit"  class="btn btn-info btn-lg btn-small" ></p>
<?php 
}
?>
</form>      

 
    	</div>    
    </div>
</div>

</body>
</html>


<script src="../../js/jquery.wallform.js"></script>

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


    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
</body>

</html>

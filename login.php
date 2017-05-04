<?php 
if(isset($_SERVER['HTTP_COOKIE'])){$kue = $_SERVER['HTTP_COOKIE'];
$cookies = explode(';', $kue);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $user = trim($parts[0]);
        setcookie($user, '', time()-1000);
        setcookie($user, '', time()-1000, '/');
		setcookie("user", '', time()-1000);
		setcookie("apl", '', time()-1000);		
    	unset($_COOKIE['user']);
    	setcookie('user', '', time() - 3600, '/'); // empty value and old timestamp
    }
}	
?>
<!DOCTYPE html>
<html class="no-js" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>CBT BEESMART | UJIAN ONLINE</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        function disableBackButton() {
            window.history.forward();
        }
        setTimeout("disableBackButton()", 0);
    </script>
    
<style>
    .no-close .ui-dialog-titlebar-close {
        display: none;
    }
</style>


     <link rel="stylesheet" href="css/bootstrap2.min.css">
<!--	<link href="css/main.css" rel="stylesheet"> !-->
	<link href="css/klien.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/inline.js"></script>
    
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.validate.js"></script>

   <script type="text/javascript">
    $(document).ready(function()
	 {
      $("#form1").validate(
	  {
	  	errorLabelContainer: "#myerror",
   		wrapper: "li",
        rules: {
          UserName: "required",// simple rule, converted to {required:true}
          Password: "required",// simple rule, converted to {required:true}
          email: {// compound rule
          required: true,
          email: true
        		},
        url: {
          required: true,
		  url: true
       		 },
        comment: {
          required: true
        		}
        },
        messages: {
		  UserName:"Masukkan Username ",
		  Password:"Masukkan Password ",
          comment: "Please enter a comment.",
		  url:"Please Enter Correct URL"
        }
      });
    });		
  </script>
</head>
<style>
.left {
    float: left;
    width: 70%;
}
.right {
    float: right;
    width: 30%;
	background-color: #333333;
			height:101px;	
		color:#FFFFFF;	
		font-size: 13px; font-style:normal; font-weight:normal;
}
.user {
		color:#FFFFFF;	
		font-size: 15px; font-style:normal; font-weight:bold;
		top:-20px;
}
.log {
		color:#3799c2;	
		font-size: 11px; font-style:normal; font-weight:bold;
		top:-20px;
}
.group:after {
    content:"";
    display: table;
    clear: both;
	
}
/*
img {
    max-width: 100%;
    height: auto;
}
*/

.visible{
    display: block !important;
}

.hidden{
    display: none !important;
}
.foto{height:80px;}	
.buntut{width:100%;bottom:0px; position:absolute; margin-top:50px;}
@media screen and (max-width: 780px) { /* jika screen maks. 780 right turun */
/*    .left, */
    .left,
    .right {
        float: none;
        width: auto;
		margin-top:0px;
		height:101px;
		color:#FFFFFF;
		display:block;	
    }
.foto{height:80px;}	
.buntut{width:100%;bottom:0px; position:absolute; margin-top:50px;}	
}
@media screen and (max-width: 400px) { /* jika screen maks. 780 right turun */
/*    .left, */
    .left{width: auto;    height: 91px;}
    .right {
        float: none;
        width: auto;
		margin-top:0px;
		height:60px;
		color:#FFFFFF;
    }
.foto{height:60px;}	
.buntut{width:100%;bottom:0px; position:absolute; padding-top:50px;}
}
</style>
<body class="font-medium">

<?php 
include "config/server.php";
$sql = mysql_query("select * from cbt_admin");
$r = mysql_fetch_array($sql);
?>

<header style="background-color:<?php echo "$r[XWarna]"; ?>">
<div class="group">
    <div class="left" style="background-color:<?php echo "$r[XWarna]"; ?>"><a href="http://tuwagapat.com"><img src="images/<?php echo "$r[XBanner]"; ?>" style=" margin-left:0px;"></a>
    </div>
    	<div class="right"><table width="100%" border="0" style="margin-top:10px">   
     					<tr><td rowspan="3" width="90px" align="center"><img src="images/avatar.gif" style=" margin-left:0px;" class="foto"></td>
						<td>Selamat Datang</td></tr>
                        <tr><td><span class="user">Siswa Peserta Ujian</span></td></tr>
                        <tr><td><span class="log"><a href="logout.php">Logout</a><span></td></tr>
						</table>
                        </div>
           
      	</div>
	</div> 
</div>         
</header>
<ul>
  	<div id="myerror" class="alert alert-danger" role="alert" style="font-size: 13px; font-style:normal; font-weight:normal; margin-left:-45px; padding-left:90px;">
    
    <?php 
	if(isset($_REQUEST['salah'])){
		if($_REQUEST['salah']==2){echo "<b><li>Database belum tersedia, Hubungi Administrator Ujian </li></b>";}
		elseif($_REQUEST['salah']==1){echo "<b><li style='padding-bottom:5px'>Username atau Password anda salah</li></b>";}
		elseif($_REQUEST['salah']==3){echo "<b><li style='padding-bottom:5px'>Anda Sudah Login di tempat lain</li></b>";
		
		}
	$_REQUEST['salah']="";}
	?>
	</div>
</ul>
    

<div  class="col-md-4 col-md-offset-4 login-wrapper" id="panel_login" style="float:inherit; margin-top:0px; min-width:400px;  max-width:500px;">
<div class="panel panel-default" style="margin-top:0px">
            <div class="panel-heading" style="font-size:22px; font-weight:bold">
                User Login
            </div>

<div class="inner-content" style="height:280px">
<form action="konfirm.php" method="post" data-toggle="validator" id="form1" ><input  type="hidden">
<div class="form-horizontal" style="margin-top:30px"><br>

                            <div class="form-group error" >
                                <label class="col-sm-3 control-label" for="UserName">Username</label>
                                <div class="col-sm-8 input-wrapper">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    <input class="form-control" style="width:87%; height:37px; margin-left:38px" data-val="true" data-val-required="User name wajib diisi" 
                                    id="inputUsername" name="UserName" placeholder="Username" type="text" value="">
                              <span class="hide error-message"><span class="field-validation-valid" data-valmsg-for="UserName" data-valmsg-replace="true"></span></span>                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="Password">Password</label>
                                <div class="col-sm-8 input-wrapper">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                    <input class="form-control" style="width:87%; height:37px; margin-left:38px"  data-val="true" data-val-required="Password wajib diisi" 
                                    id="inputPassword" name="Password" placeholder="Password" type="password" value="">
                              </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8 text-right">
                                    <button type="submit" class="btn btn-success btn-block doblockui" onClick="validateAndSend()">LOGIN</button>
                                </div>
                            </div>
                        
</div>
</form>                
</div>
</div>
</div>


<div id="buntut">

<div style="margin-top:130px; bottom:50px; background-color:#dcdcdc; padding:7px; font-size:12px">
    <div class="content">
        CBT.BSMART.Web:<strong>3.0</strong><br>
        CBT.Baseclass:<strong>1.0</strong><br>
    </div>
</div>
<footer>
    <div class="container" style=" font-size:12px">
        <p><?php echo strtoupper("$r[XSekolah]"); ?> | Supported by BEESMART</p>
    </div>
</footer>

</div>

<script src="js/jquery.cookie.js"></script>
<script src="js/common.js"></script>
<script src="js/main.js"></script>
<script src="js/cookieList.js"></script>
<script src="js/backend.js"></script>

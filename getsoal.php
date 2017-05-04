<body>
<style>
input[type="radio"] {
    /* hide the real radio button - but not with display:none as it causes x-browser problems */
    opacity:0.2;
    position:absolute;
    /*left:-10000;*/
}
input[type="radio"] + label {
    cursor: pointer;
}
.jawaban	{
	padding-bottom:10px;
	font-size: 10pt;
	border:solid;
	border-color:#CCC;
	}	
.pilihanjawaban	{
	font-size: 10pt;
	padding-bottom:15px;
	}	

.noti-jawab {
    position:absolute;
    background-color:white;
    color:#999;
    padding:4px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px;
	border-style:solid;
	border-color:#999;
    width:27px;
    height:27px;
    text-align:center;
}

.flatRoundedCheckbox
{
    width: 120px;
    height: 40px;
    margin: 20px 50px;
    position: relative;
}
.flatRoundedCheckbox div
{
    width: 100%;
    height:100%;
    background: #d3d3d3;
    border-radius: 50px;
    position: relative;
    top:-30px;
}  		
.cc-selector input{
	margin-left:0px;
	padding:0;
    -webkit-appearance:none;
       -moz-appearance:none;
            appearance:none;
							margin-top:-90px;
				top:-90px;
}
.A{background-image:url(images/A.png);}
.B{background-image:url(images/B.png);}
.C{background-image:url(images/C.png);}
.D{background-image:url(images/D.png);}
.E{background-image:url(images/E.png);}

.piljwb{
	margin-left:0;    
	border-radius: 30px;
	border-style:solid;
	border-color:#999;
	list-style:none;}

.cc-selector input:active +.drinkcard-cc{opacity: .9;}
.cc-selector input:checked +.drinkcard-cc{
	background-image:url(images/pilih.png);
    -webkit-filter: none;
       -moz-filter: none;
            filter: none;
}
.drinkcard-cc{
    cursor:pointer;
    background-size:contain;
    background-repeat:no-repeat;
    display:inline-block;
    width:38px;height:28px;;

}

.drinkcard-cc:hover{
    -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
       -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
            filter: brightness(1.2) grayscale(.5) opacity(.9);
}	
</style>
<!-- Slider !-->

<style>

#slideMenu.closed{
	right:-400px;
}

#slideMenu{
	position:fixed;
	right:0;
	top:120px;
	width:358px;
	height:500px;
	border-left:0px;
	background-color:#efefef;
	z-index:20;
}

#slideMenu a.toggleBtn{
	position:absolute;
	left:-440px;
	margin-left:300px;
	top:0;
	outline:none;
	display:block;
	height:50px;
	background-color:#e46f69;
	width:98px;
	border-width:1px 1px 1px 0px;
	padding:0 5px 0;
	color:#000;
	text-decoration:none;
	font:12px/25px Verdana, Arial, Helvetica, sans-serif;
	z-index:0;
}

#slideMenu a.toggleBtnHighlight{
	position:absolute;
	right:0px;
	margin-right:400px;	
	top:0;
	outline:none;
	display:block;
	height:47px;
	background-color:#e46f69;	
	width:35px;
	border-width:1px 1px 1px 0px;
	padding:0 5px 0;
	color:#000;
	text-decoration:none;
	font:12px/25px Verdana, Arial, Helvetica, sans-serif;
	z-index:0;
}

.contente{
	margin-top:20px;
	margin-left:20px;
	margin-bottom:20px;
	margin-right:20px;
	width:330px;
	z-index:20;
	border-style:solid;
	border:thin;
	border-color:#ccc;
	padding:20px;
	background-color:#FFF;
	overflow:scroll; height:460px;
	font:12px/25px Verdana, Arial, Helvetica, sans-serif;
}

@media (max-width: 500px) { /*breakpoint*/

	#slideMenu.closed{
		right:-240px;
	}
	
	#slideMenu{
		position:fixed;
		right:0;
		top:100px;
		width:238px;
		height:200px;
		border-left:0px;
		/*background-color:#efefef;*/
		background-color:#efefef;
		z-index:20;
	}
	#slideMenu a.toggleBtn{
		position:absolute;
		left:-260px;
		margin-left:160px;
		top:0;
		outline:none;
		display:block;
		height:50px;
		background-color:#e46f69;
		width:98px;
		border-width:1px 1px 1px 0px;
		padding:0 5px 0;
		color:#000;
		text-decoration:none;
		font:12px/25px Verdana, Arial, Helvetica, sans-serif;
		z-index:0;
	}
	#slideMenu a.toggleBtnHighlight{
		position:absolute;
		right:0px;
		margin-right:280px;	
		top:0;
		outline:none;
		display:block;
		height:47px;
		background-color:#e46f69;	
		width:35px;
		border-width:1px 1px 1px 0px;
		padding:0 5px 0;
		color:#000;
		text-decoration:none;
		font:12px/25px Verdana, Arial, Helvetica, sans-serif;
		z-index:60;
	}
	.contente{
		margin-top:20px;
		margin-left:20px;
		margin-bottom:20px;
		margin-right:20px;
		width:200px;
		z-index:20;
		border-style:solid;
		border:thin;
		border-color:#ccc;
		padding:20px;
		background-color:#FFF;
		overflow:scroll; height:160px;
		font:12px/25px Verdana, Arial, Helvetica, sans-serif;
	}
		
}

#noti-count {
    position:absolute;
    top:-12px;
    right:-15px;
    background-color:white;
    color:#313132;
    padding:5px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px;
	border-style:solid;
	border-color:#313132;
    width:27px;
    height:27px;
    text-align:center;
}
#noti-count div {
    margin-top:-5px;
}
</style>
<div id="slideMenu" class="closed">
	<div class="contente">
<style>
#awal{
	color:#FFF;
	font-family:Arial, Helvetica, sans-serif;
	line-height: 90%;
	margin:0px auto;
	margin-top:20px;
}
#ahir{
	color:#FFF;
	font-family:Arial, Helvetica, sans-serif;
	line-height: 120%;
	margin:0px auto;
	margin-top:10px;
}
#noti-count {
    position:absolute;
    top:-12px;
    right:-15px;
    background-color:white;
    color:#313132;
    padding:5px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px;
	border-style:solid;
	border-color:#313132;
    width:30px;
    height:30px;
    text-align:center;
}
#noti-count div {
    margin-top:-5px;
}
</style>
<div style="padding-bottom:20px; font-size:14px; color:#0066CC" >Soal Pilihan Ganda</div>

<div id="container" style="text-align:center; height:300px;">
<?php include "config/server.php";
$xkodemapel = "GAL1";
//$xkodesoal = "XGAL1SOAL1";
  //$user = "P090100000";
  $user = "$_COOKIE[PESERTA]";
  $sqluser = mysql_query("SELECT * FROM  `cbt_siswa` WHERE XNomerUjian = '$user'");
  $su = mysql_fetch_array($sqluser);
  $xkelz = $su['XKodeKelas'];
  $xjurz = $su['XKodeJurusan'];  
  
   
 $sqlgabung = mysql_query("SELECT * FROM  `cbt_siswa` s LEFT JOIN cbt_ujian u ON (s.XKodeKelas = u.XKodeKelas or u.XKodeKelas = 'ALL') WHERE XNomerUjian = 
  '$user' and (u.XKodeJurusan = '$xjurz' or u.XKodeJurusan = 'ALL') and (u.XKodeKelas = '$xkelz' or u.XKodeKelas = 'ALL') and u.XStatusUjian = '1'");

/* $sqlgabung = mysql_query("SELECT * FROM  `cbt_siswa` s LEFT JOIN cbt_ujian u ON s.XKodeKelas = u.XKodeKelas WHERE XNomerUjian = 
  '$user' and u.XKodeJurusan = '$xjurz' and u.XKodeKelas = '$xkelz' and u.XStatusUjian = '1'");
   
	$sqlgabung = mysql_query("SELECT * FROM  cbt_ujian where XStatusUjian = '1'");  */
 
  $s0 = mysql_fetch_array($sqlgabung);
  $xkodesoal = $s0['XKodeSoal'];
  $xtokenujian = $s0['XTokenUjian'];  
 
  $sqluser = mysql_query("
SELECT u.*,m.XNamaMapel FROM cbt_ujian u LEFT JOIN cbt_paketsoal p on p.XKodeSoal = u.XKodeSoal and p.XKodeMapel = u.XKodeMapel 
left join cbt_mapel m on u.XKodeMapel = m.XKodeMapel WHERE u.XKodeSoal='$xkodesoal' and u.XStatusUjian = '1'");


  $so = mysql_fetch_array($sqluser);
  $sopil = $so['XJumPilihan'];

		$sql = mysql_query("
		SELECT j.Urut as Urut, j.XJawaban as XJawaban, j.XJawabanEsai as XJawabanEsai , c.XNomerSoal as XNomerSoal, j.XRagu as XRagu, c.XJenisSoal as XJenisSoal 
		FROM  `cbt_soal` c LEFT JOIN cbt_jawaban j ON ( j.XNomerSoal = c.XNomerSoal AND j.XKodeSoal = c.XKodeSoal ) where c.XKodeSoal = '$xkodesoal' 
		and j.XUserJawab = '$user' and j.XTokenUjian = '$xtokenujian' and j.XJenisSoal = '1' order by j.Urut");
	
/*	echo "		SELECT j.Urut as Urut, j.XJawaban as XJawaban, j.XJawabanEsai as XJawabanEsai , c.XNomerSoal as XNomerSoal, j.XRagu as XRagu, c.XJenisSoal as XJenisSoal 
		FROM  `cbt_soal` c LEFT JOIN cbt_jawaban j ON ( j.XNomerSoal = c.XNomerSoal AND j.XKodeSoal = c.XKodeSoal ) where c.XKodeSoal = '$xkodesoal' 
		and j.XUserJawab = '$user' and j.XTokenUjian = '$xtokenujian' order by j.Urut";
	*/
		while($s = mysql_fetch_array($sql)){
		
		
		
			$jensoal = $s['XJenisSoal'];
			$jwbsoal = $s['XJawabanEsai'];

		 
		
		$urutansoal = $s['Urut'];
		if($urutansoal==""){$urutansoal=1;}else{$urutansoal=$urutansoal;}
		
		if($s['XRagu']=='1'){$cssb = "#eaca08";$csst = "#000";$noti = "noti-ragu";$border = "#eaca08";
		$iki = 'R';
		} 
		elseif(
		//$s['XNomerSoal']==$_REQUEST['pic']
		$s['Urut']==$_REQUEST['pic']
		){
				$cssb = "#336898";
				$csst = "#fff";
				$noti = "noti-ragu";
				$border = "#336898";
				$iki = 'S';
		}
		elseif(!$jwbsoal==''){
				$cssb = "#313132";
				$csst = "#fff";
				$noti = "noti-ragu";
				$border = "#313132";
				$iki = 'S';
		}
		else {
				if(!$s['XJawaban']==''){$cssb = "#313132";$csst = "#fff";$noti = "noti-count";$border = "#313132";} 
				else {$cssb = "#fff";$csst = "#313132";$noti = "noti-count";$border = "#313132";}
				$iki = 'N';
		}

?>        
           
            <?php // echo '<a href="#" data-id="'.$s['XNomerSoal'].'" class="get_pic">'; ?>
            <?php echo '<a href="#" data-id="'.$s['Urut'].'" class="get_pic" id="tombil">'; ?>
           <div class="item" id="kotakz<?php echo $s['Urut']; ?>" style="background-color:<?php echo $cssb; ?>; color:<?php echo $csst; ?>;border-color:<?php echo $border; ?>">
           <p style="margin-top:-9px; margin-left:-9px; font-family:Arial, Helvetica, sans-serif; font-size:24px">
		   <?php // echo "$iki|$_REQUEST[pic]|$s[XNomerSoal]|"; ?>
		   <?php // echo $s['Urut']; 
		   echo "$urutansoal";
		   ?></p>
           <div  id='noti-count' style="border-color:<?php echo $border; ?>"><div>
		   
		   <?php 
		   if($jensoal==2){
			   if(!$jwbsoal==''){echo "<img src=images/ijo.png style='margin-left:-5px;margin-top:-3px'>";} else 
			   {echo "";}
		   } else {
		   
		   echo $s['XJawaban']; } ?>
           
           </div></div></div></a>
           
           <?php  } ?> 
           <br><br><br><br><br>
    
        </div>


<div style="padding-bottom:20px; font-size:14px; color:#0066CC"> Soal Esai </div>
<div id="container2" style="text-align:center; height:300px;">
<?php include "config/server.php";
$xkodemapel = "GAL1";
//$xkodesoal = "XGAL1SOAL1";
  //$user = "P090100000";
  $user = "$_COOKIE[PESERTA]";
  $sqluser = mysql_query("SELECT * FROM  `cbt_siswa` WHERE XNomerUjian = '$user'");
  $su = mysql_fetch_array($sqluser);
  $xkelz = $su['XKodeKelas'];
  $xjurz = $su['XKodeJurusan'];  
  
   
 $sqlgabung = mysql_query("SELECT * FROM  `cbt_siswa` s LEFT JOIN cbt_ujian u ON (s.XKodeKelas = u.XKodeKelas or u.XKodeKelas = 'ALL') WHERE XNomerUjian = 
  '$user' and (u.XKodeJurusan = '$xjurz' or u.XKodeJurusan = 'ALL') and (u.XKodeKelas = '$xkelz' or u.XKodeKelas = 'ALL') and u.XStatusUjian = '1'");

/* $sqlgabung = mysql_query("SELECT * FROM  `cbt_siswa` s LEFT JOIN cbt_ujian u ON s.XKodeKelas = u.XKodeKelas WHERE XNomerUjian = 
  '$user' and u.XKodeJurusan = '$xjurz' and u.XKodeKelas = '$xkelz' and u.XStatusUjian = '1'");
   
	$sqlgabung = mysql_query("SELECT * FROM  cbt_ujian where XStatusUjian = '1'");  */
 
  $s0 = mysql_fetch_array($sqlgabung);
  $xkodesoal = $s0['XKodeSoal'];
  $xtokenujian = $s0['XTokenUjian'];  
 
  $sqluser = mysql_query("
SELECT u.*,m.XNamaMapel FROM cbt_ujian u LEFT JOIN cbt_paketsoal p on p.XKodeSoal = u.XKodeSoal and p.XKodeMapel = u.XKodeMapel 
left join cbt_mapel m on u.XKodeMapel = m.XKodeMapel WHERE u.XKodeSoal='$xkodesoal' and u.XStatusUjian = '1'");


  $so = mysql_fetch_array($sqluser);
  $sopil = $so['XJumPilihan'];

		$sql = mysql_query("
		SELECT j.Urut as Urut, j.XJawaban as XJawaban, j.XJawabanEsai as XJawabanEsai , c.XNomerSoal as XNomerSoal, j.XRagu as XRagu, c.XJenisSoal as XJenisSoal 
		FROM  `cbt_soal` c LEFT JOIN cbt_jawaban j ON ( j.XNomerSoal = c.XNomerSoal AND j.XKodeSoal = c.XKodeSoal ) where c.XKodeSoal = '$xkodesoal' 
		and j.XUserJawab = '$user' and j.XTokenUjian = '$xtokenujian' and j.XJenisSoal = '2' order by j.Urut");
	
/*	echo "		SELECT j.Urut as Urut, j.XJawaban as XJawaban, j.XJawabanEsai as XJawabanEsai , c.XNomerSoal as XNomerSoal, j.XRagu as XRagu, c.XJenisSoal as XJenisSoal 
		FROM  `cbt_soal` c LEFT JOIN cbt_jawaban j ON ( j.XNomerSoal = c.XNomerSoal AND j.XKodeSoal = c.XKodeSoal ) where c.XKodeSoal = '$xkodesoal' 
		and j.XUserJawab = '$user' and j.XTokenUjian = '$xtokenujian' order by j.Urut";
	*/
		while($s = mysql_fetch_array($sql)){
		
		
		
			$jensoal = $s['XJenisSoal'];
			$jwbsoal = $s['XJawabanEsai'];

		 
		
		$urutansoal = $s['Urut'];
		if($urutansoal==""){$urutansoal=1;}else{$urutansoal=$urutansoal;}
		
		if($s['XRagu']=='1'){$cssb = "#eaca08";$csst = "#000";$noti = "noti-ragu";$border = "#eaca08";
		$iki = 'R';
		} 
		elseif(
		//$s['XNomerSoal']==$_REQUEST['pic']
		$s['Urut']==$_REQUEST['pic']
		){
				$cssb = "#336898";
				$csst = "#fff";
				$noti = "noti-ragu";
				$border = "#336898";
				$iki = 'S';
		}
		elseif(!$jwbsoal==''){
				$cssb = "#313132";
				$csst = "#fff";
				$noti = "noti-ragu";
				$border = "#313132";
				$iki = 'S';
		}
		else {
				if(!$s['XJawaban']==''){$cssb = "#313132";$csst = "#fff";$noti = "noti-count";$border = "#313132";} 
				else {$cssb = "#fff";$csst = "#313132";$noti = "noti-count";$border = "#313132";}
				$iki = 'N';
		}

?>        
           
            <?php // echo '<a href="#" data-id="'.$s['XNomerSoal'].'" class="get_pic">'; ?>
            <?php echo '<a href="#" data-id="'.$s['Urut'].'" class="get_pic" id="tombil">'; ?>
           <div class="item" id="kotakz<?php echo $s['Urut']; ?>" style="background-color:<?php echo $cssb; ?>; color:<?php echo $csst; ?>;border-color:<?php echo $border; ?>">
           <p style="margin-top:-9px; margin-left:-9px; font-family:Arial, Helvetica, sans-serif; font-size:24px">
		   <?php // echo "$iki|$_REQUEST[pic]|$s[XNomerSoal]|"; ?>
		   <?php // echo $s['Urut']; 
		   echo "$urutansoal";
		   ?></p>
           <div  id='noti-count' style="border-color:<?php echo $border; ?>"><div>
		   
		   <?php 
		   if($jensoal==2){
			   if(!$jwbsoal==''){echo "<img src=images/ijo.png style='margin-left:-5px;margin-top:-3px'>";} else 
			   {echo "";}
		   } else {
		   
		   echo $s['XJawaban']; } ?>
           
           </div></div></div></a>
           
           <?php  } ?> 
           <br><br><br><br><br>
    
        </div>


        
    </body>
    <style>
        #container
        {
			height:300px;
        }
        
        .item
        {
            width: 50px;
            height: 50px;
/*            background-color: green; */
			border:#313132;
			color:#fff;
			border-style:solid;
            margin-bottom: 17px;
			font-size:18px;
			line-height:normal;
        }

    </style>
    <script src="js/masonry.pkgd.min.js"></script>
    <script>
        var container = document.querySelector('#container');
        var msnry = new Masonry( container, {
          //here we define grid system column width to be 320px. This remains constant throughout all viewport sizes. Columns are dropped when they have no space which makes them a responsive grid system similarly columns are added when viewport size increases.
          columnWidth: 55,
          //select all grid boxes
          itemSelector: '.item',
          //gutter property here
          gutter: 17
        });
        
        //script to add elements using javascript
       /* var elem = document.createElement('div');
        elem.className = "item";
        elem.innerHTML = "Inserted using javascript";
        container.appendChild(elem);
        var elements = [elem];
        //appended method does the re-layout after new element is inserted into the container.
        msnry.appended(elements);
        
        //script to remove elements using javascript
        function remove_item()
        {
            msnry.remove(elements);
        }
        
        //event trigger when item is removed usin js
        msnry.on('removeComplete', function(msnryInstance, removedItems) {
          alert('Removed ' + removedItems.length + ' items');
        });
		*/
    </script>

    <script>
        var container = document.querySelector('#container2');
        var msnry = new Masonry( container, {
          //here we define grid system column width to be 320px. This remains constant throughout all viewport sizes. Columns are dropped when they have no space which makes them a responsive grid system similarly columns are added when viewport size increases.
          columnWidth: 55,
          //select all grid boxes
          itemSelector: '.item',
          //gutter property here
          gutter: 17
        });
        
        //script to add elements using javascript
       /* var elem = document.createElement('div');
        elem.className = "item";
        elem.innerHTML = "Inserted using javascript";
        container.appendChild(elem);
        var elements = [elem];
        //appended method does the re-layout after new element is inserted into the container.
        msnry.appended(elements);
        
        //script to remove elements using javascript
        function remove_item()
        {
            msnry.remove(elements);
        }
        
        //event trigger when item is removed usin js
        msnry.on('removeComplete', function(msnryInstance, removedItems) {
          alert('Removed ' + removedItems.length + ' items');
        });
		*/
    </script>
    
	</div>
	<a style="top:150px; right: -42px;" href="javascript:AlertIt();" class="toggleBtn" id="toggleLink">
    <div id="awal" align="center" style="display:none"><font size="+3"> > </font></div>
    <div id="ahir" style="display:block"> <table border="0"><tr><td valign="middle" width="50px" align="center"><font size="+3" color="#FFFFFF">< </font></td><td> 	
    <font size="-1" color="#FFFFFF">DAFTAR</font> <br><font size="-1" color="#FFFFFF"> SOAL</font></td></tr></table>
    </div></a>
</div>
<script type="text/javascript">
function AlertIt() {
$("#awal").css("display", "block");
$("#ahir").css("display", "none");	
if($("#slideMenu").hasClass('closed')){
				$("#slideMenu").animate({right:0}, 200, function(){
					$(this).removeClass('closed').addClass('opened');
					document.getElementById("kakisoal").style.width = '74%';					
					$("a#toggleLink").removeClass('toggleBtn').addClass('toggleBtnHighlight');
				});
$("#awal").css("display", "block");
$("#ahir").css("display", "none");					
//e.preventDefault();
		//return false;
			}//if close
			if($("#slideMenu").hasClass('opened')){
			
			if ( $(window).width() > 739) {      
				$("#slideMenu").animate({right:-400}, 200, function(){// jika screen kecil gunakan right:-240, untuk lebar right:-400
					$(this).removeClass('opened').addClass('closed');
					document.getElementById("kakisoal").style.width = '97.7%';
					$("a#toggleLink").removeClass('toggleBtnHighlight').addClass('toggleBtn');
				});
			} else if ( $(window).width() > 409) {      
				$("#slideMenu").animate({right:-200}, 200, function(){// jika screen kecil gunakan right:-240, untuk lebar right:-400
					$(this).removeClass('opened').addClass('closed');
					document.getElementById("kakisoal").style.width = '97.7%';
					$("a#toggleLink").removeClass('toggleBtnHighlight').addClass('toggleBtn');
				});
			
			} else {
				$("#slideMenu").animate({right:-240}, 200, function(){// jika screen kecil gunakan right:-240, untuk lebar right:-400
					$(this).removeClass('opened').addClass('closed');
					document.getElementById("kakisoal").style.width = '97.7%';
					$("a#toggleLink").removeClass('toggleBtnHighlight').addClass('toggleBtn');
				});
}

				

$("#awal").css("display", "none");
$("#ahir").css("display", "block");					
//e.preventDefault();
			}//if close
}
</script>
<script type="text/javascript" src="js/jquery.js"></script>



<script>
$(document).keydown(function(e) { 
		var soale = $('#soale').val();  
	  	var urlString = 'url(images/pilih.png)';
	  
//      e.preventDefault();  
      if (e.which == 65) {
		var tekan = 'A';
		document.getElementById("A").checked = true;	
	  } 
	  else if (e.which == 66) {
		var tekan = 'B';		
		document.getElementById("B").checked = true;
	  }
	  else if (e.which == 67) {
		var tekan = 'C';		  
		document.getElementById("C").checked = true;		
	  }
	  else if (e.which == 68) {
		var tekan = 'D';		  
		document.getElementById("D").checked = true;		
	  }
	  <?php if($sopil>4){ ?>
	  else if (e.which == 69) {
		var tekan = 'E';		  
		document.getElementById("E").checked = true;		
	  }
	  <?php } ?>
	  
				<?php if($sopil>4){ ?>
				if(e.which==65||e.which==66||e.which==67||e.which==68||e.which==69) {
				<?php }else{ ?>
				if(e.which==65||e.which==66||e.which==67||e.which==68) {
				<?php } ?>
				
				  $("#tkn").html(tekan+' '+soale);
				  	var putar = $('#anu').val();  
                    var data = 'nama=' + tekan + '& soale=' + soale;
                    $.ajax({
                        type: 'POST',
                        url: "simpan.php?kode=<?php echo $xkodesoal; ?> &putar=" + putar,
                        data: data,
                        success: function() {
                            //$('#tampil').load("lihat.php");
                        }
                    });				  
					
				}
//		  alert(tekan);
          // Whatever...
});
	
$(document).ready(function(){
$("#awal").css("display", "none");
$("#ahir").css("display", "block");				


});//ready close
</script>
 <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-8">
 <script type="text/javascript" src="js/jquery.jplayer.min.js"></script>

  
  <script type="text/javascript"
  src="MathJax/MathJax.js?config=AM_HTMLorMML-full"></script>

<!-- script untuk refresh/reload mathjax setiap content baru !-->
   <script>
  MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
</script>
<!-- script untuk refresh/reload mathjax setiap content baru !-->
  
  <?php
  
//include "cbt_con.php";
//get pic id from ajax request
if(isset($_POST["pic"]) && is_numeric($_POST["pic"]))
{
	$current_picture = filter_var($_POST["pic"], FILTER_SANITIZE_NUMBER_INT);
}else{
	$current_picture=1;
}

//Connect to Database
//$sqlj = mysql_query("SELECT * from cbt_jawaban where Urut = '$_POST[pic]' and XKodeSoal = '$xkodesoal' and XUserJawab = '$user'");
$sqlj = mysql_query("
SELECT * 
FROM cbt_soal s
LEFT JOIN cbt_jawaban j ON (j.XNomerSoal = s.XNomerSoal and j.XKodeSoal = s.XKodeSoal)
WHERE j.Urut =  '$_POST[pic]'
AND s.XKodeSoal =   '$xkodesoal'
AND XUserJawab =  '$user' and j.XTokenUjian = '$xtokenujian'
");



$sj = mysql_fetch_array($sqlj);

$jensoal = $sj['XJenisSoal'];
$opsijwb = $sj['XAcakOpsi'];

//echo "Acak Opsi : $sj[XAcakOpsi]";

if($jensoal==1){
	$sj1 = $sj['XJawaban'];
	 
	 if($opsijwb == 'Y'){
		 $ambiljwbA = "XJawab".$sj['XA'];
		 $ambiljwbB = "XJawab".$sj['XB'];
		 $ambiljwbC = "XJawab".$sj['XC'];
		 $ambiljwbD = "XJawab".$sj['XD'];	
		 if($sopil>4){  
		 $ambiljwbE = "XJawab".$sj['XE'];
		 }
	 } else {
		 $ambiljwbA = "XJawab1";
		 $ambiljwbB = "XJawab2";
		 $ambiljwbC = "XJawab3";
		 $ambiljwbD = "XJawab4";	
		 if($sopil>4){  
		 $ambiljwbE = "XJawab5";
		 }
	 }
		  
	$jwbA = "$sj[$ambiljwbA]";
	$jwbB = "$sj[$ambiljwbB]";
	$jwbC = "$sj[$ambiljwbC]";
	$jwbD = "$sj[$ambiljwbD]";
	if($sopil>4){ 
	$jwbE = "$sj[$ambiljwbE]";
	$jwbE = str_replace("`","'",$jwbE);
	$jwbE = str_replace(">'",">`",$jwbE);
	$jwbE = str_replace("'<","`<",$jwbE);

	}
$jwbA = str_replace("`","'",$jwbA);
$jwbA = str_replace(">'",">`",$jwbA);
$jwbA = str_replace("'<","`<",$jwbA);
$jwbB = str_replace("`","'",$jwbB);
$jwbB = str_replace(">'",">`",$jwbB);
$jwbB = str_replace("'<","`<",$jwbB);
$jwbC = str_replace("`","'",$jwbC);
$jwbC = str_replace(">'",">`",$jwbC);
$jwbC = str_replace("'<","`<",$jwbC);
$jwbD = str_replace("`","'",$jwbD);
$jwbD = str_replace(">'",">`",$jwbD);
$jwbD = str_replace("'<","`<",$jwbD);

	
	if($sj1=='A'){$nilaiA="checked";} else {$nilaiA="";}
	if($sj1=='B'){$nilaiB="checked";} else {$nilaiB="";}
	if($sj1=='C'){$nilaiC="checked";} else {$nilaiC="";}
	if($sj1=='D'){$nilaiD="checked";} else {$nilaiD="";}
	if($sopil>4){
	if($sj1=='E'){$nilaiE="checked";} else {$nilaiE="";}
	}
	//get next picture id
	//$sql = mysql_query("SELECT id FROM pictures WHERE id > '$current_picture' ORDER BY id ASC LIMIT 1");
	//$sql = mysql_query("SELECT XNomerSoal FROM cbt_soal WHERE XNomerSoal > '$current_picture' and XKodeSoal = '$xkodesoal' ORDER BY XNomerSoal ASC LIMIT 1");

}

$sql = mysql_query("SELECT Urut FROM cbt_jawaban WHERE Urut > '$current_picture' and XKodeSoal = '$xkodesoal'
and XUserJawab = '$user' and XTokenUjian = '$xtokenujian' ORDER BY Urut ASC LIMIT 1");
$result = mysql_fetch_array($sql);
if($result){
	//$next_id = $result['XNomerSoal'];
	$next_id = $result['Urut'];
}



//get previous picture id
//$sql = mysql_query("SELECT XNomerSoal FROM cbt_soal WHERE XNomerSoal < $current_picture and XKodeSoal = '$xkodesoal' ORDER BY XNomerSoal DESC LIMIT 1");

$sql = mysql_query("SELECT Urut FROM cbt_jawaban WHERE Urut < '$current_picture' and XKodeSoal = '$xkodesoal'
and XUserJawab = '$user' and XTokenUjian = '$xtokenujian' ORDER BY Urut DESC LIMIT 1");
$result = mysql_fetch_array($sql);
if($result){
	//$prev_id = $result['XNomerSoal'];
	$prev_id = $result['Urut'];
}

if(isset($prev_id)){
$prev_id = $prev_id;} else {$prev_id = "0"; }

//echo $prev_id ;
$jmlsoal = 4;
$stu = $prev_id+1;

//echo "SELECT * FROM cbt_soal WHERE XNomerSoal = $current_picture and XKodeSoal = '$xkodesoal' LIMIT 1";
//get details of current from database
//$sql = mysql_query("SELECT * FROM cbt_soal WHERE XNomerSoal = $current_picture and XKodeSoal = '$xkodesoal' LIMIT 1");
$sql = mysql_query("SELECT * 
FROM cbt_soal s
LEFT JOIN cbt_jawaban j ON (j.XNomerSoal = s.XNomerSoal and j.XKodeSoal = s.XKodeSoal)
WHERE j.Urut =  '$_POST[pic]'
AND s.XKodeSoal =   '$xkodesoal'
AND XUserJawab =  '$user'  and j.XTokenUjian = '$xtokenujian'
LIMIT 1");


$result = mysql_fetch_array($sql);

if($result){
	//construct next/previous button
	$prev_button = (isset($prev_id) && $prev_id>0)?'<a href="#" data-id="'.$prev_id.'" class="get_pic" id="tombil1"><img src="prev.png" border="0" /></a>':'';
	$next_button = (isset($next_id) && $next_id>0)?'<a href="#" data-id="'.$next_id.'" class="get_pic"  id="tombil2"><img src="next.png" border="0" /></a>':'';

?>
<div id="lembaran">
<div id="lembaransoal">
<div class="cc-selector">

<link type="text/css" rel="stylesheet" href="css/jfontsize.css" />
<link type="text/css" rel="stylesheet" href="css/shCoreDefault.css" />

<script type="text/javascript" language="javascript" src="js/jquery.jfontsize-1.0.js"></script>
<script type="text/javascript" language="javascript">
                        $('.some-class-name2').jfontsize({
                            btnMinusClasseId: '#jfontsize-m2',
                            btnDefaultClasseId: '#jfontsize-d2',
                            btnPlusClasseId: '#jfontsize-p2',
                            btnMinusMaxHits: 1,
                            btnPlusMaxHits: 1,
                            sizeChange: 5
                        });
						 $('.pilihanjawaban').jfontsize({
                            btnMinusClasseId: '#jfontsize-m2',
                            btnDefaultClasseId: '#jfontsize-d2',
                            btnPlusClasseId: '#jfontsize-p2',
                            btnMinusMaxHits: 1,
                            btnPlusMaxHits: 1,
                            sizeChange: 5
                        });
						 $('.jawab').jfontsize({
                            btnMinusClasseId: '#jfontsize-m2',
                            btnDefaultClasseId: '#jfontsize-d2',
                            btnPlusClasseId: '#jfontsize-p2',
                            btnMinusMaxHits: 1,
                            btnPlusMaxHits: 1,
                            sizeChange: 5
                        });
</script> 
<?php 
if(str_replace(" ","",$result['XAudioTanya'])!==''){
		echo "
		<div style='padding-top:10px'><font color=#fe4d4d>Listening Section : Selama audio berjalan tidak bisa pindah ke Soal lainnya</font></p>"; 
} ?>

<?php
$audfile = str_replace(" ","",$result['XAudioTanya']); 
$audfile = "audio/$audfile";
$vidfile = str_replace(" ","",$result['XVideoTanya']); 
$vidfile = "video/$vidfile";

/*
$sqlsoal = mysql_query("SELECT * 
FROM cbt_soal s
LEFT JOIN cbt_jawaban j ON (j.XNomerSoal = s.XNomerSoal and j.XKodeSoal = s.XKodeSoal)
WHERE j.Urut =  '$_POST[pic]'
AND s.XKodeSoal =   '$xkodesoal'
AND XUserJawab =  '$user'  and j.XTokenUjian = '$xtokenujian'
and XNomerSoal");
$result = mysql_fetch_array($sql);
*/

$sqlaud = mysql_query("select * from cbt_jawaban where XKodeSoal = '$xkodesoal' and XTokenUjian = '$xtokenujian' and Urut = '$current_picture'
 and XUserJawab = '$user'");
$ml = mysql_fetch_array($sqlaud);

$waktu = $ml['XMulai'];
$putar = $ml['XPutar'];

$waktu2 = $ml['XMulaiV'];
$putar2 = $ml['XPutarV'];

/*
echo "select * from cbt_jawaban where XKodeSoal = '$xkodesoal' and XTokenUjian = '$xtokenujian' and XNomerSoal = '$current_picture'
 and XUserJawab = '$user'";

echo "select * from cbt_jawaban where XKodeSoal = '$xkodesoal' and XTokenUjian = '$xtokenujian' and Urut = '$current_picture'
 and XUserJawab = '$user'<br>";
echo "$current_picture atau $_POST[pic] || $waktu-$putar || $waktu2 - $putar2 | vid = $vidfile | aud = $audfile";
*/

?>
<link href="dist/skin/blue.monday/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="lib/jquery.min.js"></script>
<script type="text/javascript" src="dist/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){

	
	$("#jquery_jplayer_1").jPlayer({
		
		ready: function (event) {
			$(this).jPlayer("setMedia", {
				title: "CBT BEESMART",
				m4a: "<?php echo "$audfile"; ?>",
				oga: "<?php echo "$audfile"; ?>"
			});
		
		//$(this).jPlayer("playHead", <?php echo $waktu; ?>); // stop all players except this one.
		//$(this).jPlayer("play", <?php echo $waktu; ?>); // stop all players except this one.
		$(this).jPlayer("pause", <?php echo $waktu; ?>); // stop all players except this one.

		
		},
		swfPath: "dist/jplayer",
		supplied: "m4a, oga",

		wmode: "window",
		useStateClassSkin: true,
		autoBlur: false,
		smoothPlayBar: true,
		keyEnabled: true,
		remainingDuration: true,
		toggleDuration: false,
		play : function(){
		
		//$('a.get_pic').remove();
		//$('a.get_pic').removeAttr('href'); // hilangkan href pada class get_pic
		$("a.get_pic").removeClass("get_pic").addClass("get1_pic");
		//alert("S");

				//document.getElementById("btnNextSoal").disabled = true;
				//document.getElementById("btnPrevSoal").disabled = true;
				document.getElementById("tomb").disabled = true;
				document.getElementById("tombol").disabled = true;
				
							
				//alert(s);									
			
		},
		pause : function(){
		//alert("S2");
		var henti = $(this).data("jPlayer").status.currentTime;
		//alert(henti);
		var anu = document.getElementById("berhenti").innerHTML = myFunction(henti); 
		
		 	 
		$("a.get1_pic").removeClass("get1_pic").addClass("get_pic");	
//		$('a.get_pic').Attr('href'); // hilangkan href pada class get_pic	


				
				//localStorage.setItem('Text',90);
				document.getElementById("berhenti").value = henti;
				//alert(henti);
				document.getElementById("tomb").disabled = false;	
				document.getElementById("tombol").disabled = false;							
				//alert(s);		
				//$("#jquery_jplayer_1").load('simpan_mp3.php?img='+henti);							
			
		},
		ended : function(){
		var anu = document.getElementById("berhenti").innerHTML = FileHabis(); 
		$(".jp-controls").css({"display":"none"});
			$(".jp-progress").css({"display":"none"});
			$(".jp-volume-controls").css({"display":"none"});
			$(".jp-time-holder").css({"display":"none"});
		//alert();
		$("a.get1_pic").removeClass("get1_pic").addClass("get_pic");	
		//$('a.get_pic').Attr('href'); // hilangkan href pada class get_pic			
				//document.getElementById("btnNextSoal").disabled = false;
				//document.getElementById("btnPrevSoal").disabled = false;
				document.getElementById("tomb").disabled = false;
				document.getElementById("tombol").disabled = false;	
           // confirm('The sound ended?');
		   
		   	
			
		   var tampilNama = localStorage.getItem('Text');
		   var x = Number(tampilNama)
		   //alert(tampilNama);
		   $(this).jPlayer("stop");
		   //$(this).jPlayer("play", x); 
		   
		   var s = $(this).data("jPlayer").status.currentTime;
		   document.getElementById("anu").value = s;
		   //$(this).Player( "stop", 100); 
			
		   

        }
		
		
				
	});
	
	
	
	$("#jquery_jplayer_3").jPlayer({
		ready: function () {
			$(this).jPlayer("setMedia", {
				title: "CBT BEESMART ",
				m4v: "<?php echo "$vidfile"; ?>",
				ogv: "<?php echo "$vidfile"; ?>",
				webmv: "<?php echo "$vidfile"; ?>",
				poster: "images/beesmart.png"
			});
			$(this).jPlayer("pause", <?php echo $waktu2; ?>); // stop all players except this one.
		},
		/*play: function() { // To avoid multiple jPlayers playing together.
			$(this).jPlayer("pauseOthers");
		},
		*/
		
		swfPath: "dist/jplayer",
		supplied: "webmv, ogv, m4v",
		cssSelectorAncestor: "#jp_container_3",
		globalVolume: true,
		useStateClassSkin: true,
		autoBlur: false,
		smoothPlayBar: true,
		keyEnabled: true,		
		wmode: "window",
		useStateClassSkin: true,
		remainingDuration: true,
		toggleDuration: false,
		play : function(){
		
		//$('a.get_pic').remove();
		//$('a.get_pic').removeAttr('href'); // hilangkan href pada class get_pic
		$("a.get_pic").removeClass("get_pic").addClass("get1_pic");
		//alert("S");

				//document.getElementById("btnNextSoal").disabled = true;
				//document.getElementById("btnPrevSoal").disabled = true;
				document.getElementById("tomb").disabled = true;
				document.getElementById("tombol").disabled = true;
				
							
				//alert(s);									
			
		},
		pause : function(){
		//alert("S2");
		var henti2 = $(this).data("jPlayer").status.currentTime;
		//alert(henti2);
		var anu2 = document.getElementById("berhenti2").innerHTML = myFunction2(henti2); 
		
		 	 
		$("a.get1_pic").removeClass("get1_pic").addClass("get_pic");	
//		$('a.get_pic').Attr('href'); // hilangkan href pada class get_pic	


				
				//localStorage.setItem('Text',90);
				document.getElementById("berhenti2").value = henti2;
				//alert(henti);
				document.getElementById("tomb").disabled = false;	
				document.getElementById("tombol").disabled = false;							
				//alert(s);		
				//$("#jquery_jplayer_1").load('simpan_mp3.php?img='+henti);							
			
		},
		ended : function(){
		var anu = document.getElementById("berhenti2").innerHTML = FileHabis2(); 
		$(".jp-controls").css({"display":"none"});
			$(".jp-progress").css({"display":"none"});
			$(".jp-volume-controls").css({"display":"none"});
			$(".jp-time-holder").css({"display":"none"});
		//alert();
		$("a.get1_pic").removeClass("get1_pic").addClass("get_pic");	
		//$('a.get_pic').Attr('href'); // hilangkan href pada class get_pic			
				//document.getElementById("btnNextSoal").disabled = false;
				//document.getElementById("btnPrevSoal").disabled = false;
				document.getElementById("tomb").disabled = false;
				document.getElementById("tombol").disabled = false;	
           // confirm('The sound ended?');
		   
		   	
			
		   var tampilNama = localStorage.getItem('Text');
		   var x = Number(tampilNama)
		   //alert(tampilNama);
		   $(this).jPlayer("stop");
		   //$(this).jPlayer("play", x); 
		   
		   var s = $(this).data("jPlayer").status.currentTime;
		   document.getElementById("anu").value = s;
		   //$(this).Player( "stop", 100); 
			
		   

        }
		
		
		
	});
	
	
	
});
//]]>
</script>
<script>
function myFunction(waktu) {
//alert("Paused");
     document.getElementById("filephp").innerHTML='<object type="text/html" data="simpan_mp3.php?aksi=pause&soal=<?php echo $xkodesoal; ?>&token=<?php echo $xtokenujian; ?>&nomer=<?php echo $current_picture; ?>&waktu='+waktu+'" ></object>';

}
function FileHabis(waktu,nomer) {
//alert("Ended");
     document.getElementById("filephp").innerHTML='<object type="text/html" data="simpan_mp3.php?aksi=habis&soal=<?php echo $xkodesoal; ?>&token=<?php echo $xtokenujian; ?>&nomer=<?php echo $current_picture; ?>&waktu='+waktu+'" ></object>';

}
</script>

<script>
function myFunction2(waktu2) {
//alert("Paused");
     document.getElementById("filephp").innerHTML='<object type="text/html" data="simpan_mp4.php?aksi=pause&soal=<?php echo $xkodesoal; ?>&token=<?php echo $xtokenujian; ?>&nomer=<?php echo $current_picture; ?>&waktu='+waktu2+'" ></object>';

}
function FileHabis2(waktu2,nomer) {
//alert("Ended");
     document.getElementById("filephp").innerHTML='<object type="text/html" data="simpan_mp4.php?aksi=habis&soal=<?php echo $xkodesoal; ?>&token=<?php echo $xtokenujian; ?>&nomer=<?php echo $current_picture; ?>&waktu='+waktu2+'" ></object>';

}
</script>

<?php
 if(str_replace(" ","",$result['XAudioTanya'])!==''){
$audfile = str_replace(" ","",$result['XAudioTanya']); 
$audfile = "audio/$audfile";
?>
<style>
   .jp-volume-controls { display:block}
/*   .jp-progress{ display:block}
   .jp-duration{ display:block}  */ 
   .jp-progress{ display:none}
   .jp-duration{ display:none}      
  
   .jp-time-holder{ display:block}  
   .jp-volume-bar{ max-width:50px   }
@media screen and (max-width: 500px) {

    /* jplayer */
    .jp-video video, .jp-audio, .jp-controls-holder {
        width: 100% !important;
    }

   .jp-video, .jp-video > div, .jp-video img {
       height: auto !important;
       width: 100% !important;
   }

   .jp-video-360p {
       max-width: 370px !important;
	   	   height:100px;
   }

   .jp-video-270p {
       max-width: 180px !important;
	   height:100px;
   }

   .jp-audio-360p {
       max-width: 570px !important;
   }

   .jp-audio-270p {
       max-width: 480px !important;
   }

   .jp-progress{ display:none}
   .jp-volume-bar{ max-width:50px   }
    #jquery_jplayer_1{max-width:168px;height;100px}
  
}

@media screen and (max-width: 360px) {

    /* jplayer */
    .jp-video video, .jp-audio, .jp-controls-holder {
        width: 100% !important;
    }

   .jp-video, .jp-video > div, .jp-video img {
       height: auto !important;
       width: 100% !important;
   }

   .jp-video-360p {
       max-width: 370px !important;
	   	   height:100px;
   }

   .jp-video-270p {
       max-width: 180px !important;
	   height:100px;
   }

   .jp-audio-360p {
       max-width: 570px !important;
   }

   .jp-audio-270p {
       max-width: 480px !important;
   }

   .jp-volume-controls { display:none}
   .jp-progress{ display:none}
   .jp-volume-bar{ max-width:50px   }
    #jquery_jplayer_1{max-width:168px;height;100px}
  
}

</style>
<script>

</script>
<input type="hidden" name="berhenti" id="berhenti">
<?php if($putar==0){ ?>
<div id="jquery_jplayer_1" class="jp-jplayer"></div>
<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
	<div class="jp-type-single">
		<div class="jp-gui jp-interface">
			<div class="jp-controls">
				<button class="jp-play" role="button" tabindex="0">play</button>
				
			</div>
			<div class="jp-progress">
				<div class="jp-seek-bar">
					<div class="jp-play-bar"></div>
				</div>
			</div>
			<div class="jp-volume-controls">
				<button class="jp-mute" role="button" tabindex="0">mute</button>
				<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
				<div class="jp-volume-bar">
					<div class="jp-volume-bar-value"></div>
				</div>
			</div>
			<div class="jp-time-holder">
				<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
				<!-- <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
				<div class="jp-toggles">
					<button class="jp-repeat" role="button" tabindex="0">repeat</button>
				</div> !-->
			</div>
		</div>
		<div class="jp-details">
			<div class="jp-title" aria-label="title">&nbsp;</div>
		</div>
		<div class="jp-no-solution">
			&nbsp;
		</div>
	</div>
</div><br>
<?php }  //end of if $putar ==0

}?>

<?php 

if(str_replace(" ","",$result['XVideoTanya'])!==''){
	$vidfile = str_replace(" ","",$result['XVideoTanya']); 
	$vidfile = "video/$vidfile";
?>	
<style>
   .jp-volume-controls { display:block}
/*   .jp-progress{ display:block}
   .jp-duration{ display:block}  */ 
   .jp-progress{ display:none}
   .jp-duration{ display:none}      
  
   .jp-time-holder{ display:block}  
   .jp-volume-bar{ max-width:50px   }
@media screen and (max-width: 500px) {

    /* jplayer */
    .jp-video video, .jp-audio, .jp-controls-holder {
        width: 100% !important;
    }

   .jp-video, .jp-video > div, .jp-video img {
       height: auto !important;
       width: 100% !important;
   }

   .jp-video-360p {
       max-width: 370px !important;
	   	   height:100px;
   }

   .jp-video-270p {
       max-width: 180px !important;
	   height:100px;
   }

   .jp-audio-360p {
       max-width: 570px !important;
   }

   .jp-audio-270p {
       max-width: 180px !important;
   }

   .jp-volume-controls { display:none}

   .jp-progress{ display:none}
   .jp-volume-bar{ max-width:50px   }
   #jquery_jplayer_3{max-width:160px;height;100px}
    #jquery_jplayer_1{max-width:160px;height;100px}
  
}

</style>

<input type="hidden" name="berhenti2" id="berhenti2">
<?php if($putar2==0){ ?>
<div id="jp_container_3" class="jp-video jp-video-270p" role="application" aria-label="media player">
	<div class="jp-type-single">
		<div id="jquery_jplayer_3" class="jp-jplayer"></div>
		<div class="jp-gui">
			<div class="jp-video-play">
				<button class="jp-video-play-icon" role="button" tabindex="0">play</button>
			</div>
			<div class="jp-interface">
				<div class="jp-progress">
					<div class="jp-seek-bar">
						<div class="jp-play-bar"></div>
					</div>
				</div>
				<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
				<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
				<div class="jp-controls-holder">
					<div class="jp-controls">
						<button class="jp-play" role="button" tabindex="0">play</button>
						<button class="jp-stop" role="button" tabindex="0">stop</button>
					</div>
					<div class="jp-volume-controls">
						<button class="jp-mute" role="button" tabindex="0">mute</button>
						<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
						<div class="jp-volume-bar">
							<div class="jp-volume-bar-value"></div>
						</div>
					</div>
					<div class="jp-toggles">
						<button class="jp-repeat" role="button" tabindex="0">repeat</button>
						<button class="jp-full-screen" role="button" tabindex="0">full screen</button>
					</div>
				</div>
				<div class="jp-details">
					<div class="jp-title" aria-label="title">&nbsp;</div>
				</div>
			</div>
		</div>
		<div class="jp-no-solution">
			<span>Update Required</span>
			To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
		</div>
	</div>
</div>
<?php }  //end of if $putar2 ==0

}?>
<!-- identifikasi penekanan tombol 
<div id="tkn"></div>
!-->

<?php 
if($jensoal==2){ echo "<span style='color:red; font-size:12px;'>Pertanyaan Essai : Jawablah Pertanyaan Berikut ini<br></span>"; } ?>


<?php //output html

$str = $result['XTanya'];
$str = str_replace("../../pictures/","pictures/",$str);
$str = str_replace("`","'",$str);
$str = str_replace(">'",">`",$str);
$str = str_replace("'<","`<",$str);

	echo "
	
	<p class=jawab>$str<br />";
	if($result['XGambarTanya']==''){} else {
	echo "<a href='#'  data-toggle='modal' data-target='#myModalP'>";
	echo "<img src='pictures/$result[XGambarTanya]' width='150px'></a><br /><br />";}
	echo "</p>";

?>

<div class="modal fade" id="myModalP" role="dialog">
    <div class="modal-dialog" style="width:95%">
<div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title page-label">Perbesar Gambar</h1>
                </div>
                <div class="panel-body">
                    <div class="inner-content">
                        <div class="row" style="background-color:#fff">
                           <?php echo "<img src='pictures/$result[XGambarTanya]' height='100%'></a><br />"; ?>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row" style="background-color:#fff">
                        
                        <div class="col-xs-6 col-center" style="margin-left:25%">
                            <button data-bind="click: handleNotConfirm" type="submit" class="btn btn-danger btn-block"  data-dismiss="modal" id="lanjut">Tutup</button></a>
                        </div>
                    </div>
                </div>
                
            </div>
</div></div>

<!-- konflik dengan audio       
<script type="text/javascript" src="js/jquery.js"></script>

!-->
<style>
textarea
{
  width:100%;
}
.textwrapper
{
  margin:5px 0;
  padding:0px;
}
</style>
<input id="soale" type="hidden" name="soale" value="<?php echo $current_picture; ?>"/><?php // echo $xkodesoal; ?>

<?php 
if($jensoal==2){ 
?>
<script src="js/jquery.min.js"></script>
<script>
var $jnoc = jQuery.noConflict();   
$jnoc(document).ready(function(){
$jnoc("#info").hide();
    $jnoc(".masuk").mouseleave(function(){
              //alert("keluar" + <?php echo $current_picture; ?>);	
			  	  	var putar = $('#anu').val();  
			   		var A = $('#rules').val();
                    var soale = $jnoc('#soale').val();		
			   		var data = 'nama=' + A + '& soale=' + soale;
                    $jnoc.ajax({
                        type: 'POST',
                        url: "simpan.php?kode=<?php echo $xkodesoal; ?> &putar=" + putar,
                        data: data,
                        success: function() {
						//alert("sudah tersimpan");
								$jnoc("#info").fadeIn(2000);
								$jnoc("#info").html("Jawaban sudah diSimpan");
								$jnoc("#info").fadeOut(2000);
						
                            //$('#tampil').load("lihat.php");
                        }
                    });
			   				
			  
    });
    
});
</script>
<?php
//echo "select * from cbt_jawaban where Urut='$current_picture' and XKodeSoal ='$xkodesoal' and XTokenUjian = '$xtokenujian' and XUserJawab = '$user'<br>";
 $cekesai = mysql_query("select * from cbt_jawaban where Urut='$current_picture' and XKodeSoal ='$xkodesoal' and XTokenUjian = '$xtokenujian' and XUserJawab = '$user' "); 
 $ce = mysql_fetch_array($cekesai);
 $jwbesai = $ce['XJawabanEsai'];
?>
<br>Jawaban :<br> <span style="color:#0066CC;font-size:12px">Ketik Jawaban didalam kotak dibawah ini, Jawaban akan otomatis tersimpan Bila Cursor keluar dari Kotak</span><br>

<textarea id="rules" name="rules" class="masuk"><?php echo "$jwbesai"; ?></textarea>
 							<div class="alert alert-success " id="info">
                            </div>
<?php } ?>


<?php 
if($jensoal==1){
?>
    
<script type="text/javascript">
            $('document').ready(function() {
                $('#A').click(function() {
				//alert();
				//$("#tombil").removeClass("get_pic");
				//document.getElementById("kotakz<?php echo $current_picture; ?>").style.backgroundColor = "lightblue";				
			  	  	var putar = $('#anu').val();  				
                    var A = $('#A').val();
                    var soale = $('#soale').val();					
                    var data = 'nama=' + A + '& soale=' + soale;
                    $.ajax({
                        type: 'POST',
                        url: "simpan.php?kode=<?php echo $xkodesoal; ?> &putar=" + putar,
                        data: data,
                        success: function() {
                            //$('#tampil').load("lihat.php");
                        }
                    });
                });
                $('#B').click(function() {
			  	  	var putar = $('#anu').val();  				
                    var B = $('#B').val();
                    var soale = $('#soale').val();					
                    var data = 'nama=' + B + '& soale=' + soale;
                    $.ajax({
                        type: 'POST',
                        url: "simpan.php?kode=<?php echo $xkodesoal; ?> &putar=" + putar,
                        data: data,
                        success: function() {
                            //$('#tampil').load("lihat.php");
                        }
                    });
                });
                $('#C').click(function() {
			  	  	var putar = $('#anu').val();  				
                    var C = $('#C').val();
                    var soale = $('#soale').val();					
                    var data = 'nama=' + C + '& soale=' + soale;
                    $.ajax({
                        type: 'POST',
                        url: "simpan.php?kode=<?php echo $xkodesoal; ?> &putar=" + putar,
                        data: data,
                        success: function() {
                            //$('#tampil').load("lihat.php");
                        }
                    });
                });
                $('#D').click(function() {
			  	  	var putar = $('#anu').val();  				
                    var D = $('#D').val();
                    var soale = $('#soale').val();					
                    var data = 'nama=' + D + '& soale=' + soale;
                    $.ajax({
                        type: 'POST',
                        url: "simpan.php?kode=<?php echo $xkodesoal; ?> &putar=" + putar,
                        data: data,
                        success: function() {
                            //$('#tampil').load("lihat.php");
                        }
                    });
                });
                $('#E').click(function() {
			  	  	var putar = $('#anu').val();  					
                    var E = $('#E').val();
                    var soale = $('#soale').val();					
                    var data = 'nama=' + E + '& soale=' + soale;
                    $.ajax({
                        type: 'POST',
                        url: "simpan.php?kode=<?php echo $xkodesoal; ?> &putar=" + putar,
                        data: data,
                        success: function() {
                            //$('#tampil').load("lihat.php");
                        }
                    });
                });
            });
        </script>
  
		<table border="0" cellpadding="0px" cellspacing="0px">
		<tr>
        <td valign="top"><input id="A" type="radio" name="credit-card" value="A" <?php echo $nilaiA; ?>>
        <label class="drinkcard-cc A" for="A">&nbsp;</label></td>
        <?php if(str_replace("  ","",$result['XGambarJawab1'])==''){} else {
		$gambarA = "XGambarJawab".$result['XA'];
		$pilgbrA = "$result[$gambarA]";
	//echo "<td valign='top'><a href='#'  data-toggle='modal' data-target='#myModalZ1'><img src='pictures/$result[XGambarJawab1]' style='max-height:190px'></a></td>";} 
     echo "<td valign='top'><a href='#'  data-toggle='modal' data-target='#myModalA'><img src='pictures/$pilgbrA' style='max-height:190px'></a></td>";} ?>
  <div class="modal fade" id="myModalA" role="dialog">
            <div class="modal-dialog" style="width:95%">
        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title page-label">Perbesar Gambar</h1>
                        </div>
                        <div class="panel-body">
                            <div class="inner-content">
                                <div class="row" style="background-color:#fff">
                                   <?php 
                                    if(str_replace("  ","",$pilgbrA)==''){}else{
                                   echo "<img src='pictures/$pilgbrA' width='100%'></a><br />"; 
                                   }
                                   ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row" style="background-color:#fff">
                                
                                <div class="col-xs-6 col-center" style="margin-left:25%">
                                    <button data-bind="click: handleNotConfirm" type="submit" class="btn btn-danger btn-block"  data-dismiss="modal" id="lanjut">Tutup</button></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
        </div></div>
     
        <td class="pilihanjawaban" valign="top"><?php echo "$jwbA"; ?></td></tr>
       	<tr><td valign="top"><input id="B" type="radio" name="credit-card" value="B" <?php echo $nilaiB; ?>>
        <label class="drinkcard-cc B" for="B">&nbsp;</label></td>
        <?php if(str_replace("  ","",$result['XGambarJawab2'])==''){} else {
		$gambarB = "XGambarJawab".$result['XB'];
		$pilgbrB = "$result[$gambarB]";		
	//	echo "<td valign='top'><a href='#'  data-toggle='modal' data-target='#myModalZ2'><img src='pictures/$result[XGambarJawab2]' style='max-height:190px'></a></td>";}
	      echo "<td valign='top'><a href='#'  data-toggle='modal' data-target='#myModalB'><img src='pictures/$pilgbrB' style='max-height:190px'></a></td>";} ?>
        
        <div class="modal fade" id="myModalB" role="dialog">
            <div class="modal-dialog" style="width:95%">
        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title page-label">Perbesar Gambar B</h1>
                        </div>
                        <div class="panel-body">
                            <div class="inner-content">
                                <div class="row" style="background-color:#fff">
                                   <?php 
                                    if(str_replace("  ","",$pilgbrB)==''){}else{
                                   echo "<img src='pictures/$pilgbrB' width='100%'></a><br />"; 
                                   }
                                   ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row" style="background-color:#fff">
                                
                                <div class="col-xs-6 col-center" style="margin-left:25%">
                                    <button data-bind="click: handleNotConfirm" type="submit" class="btn btn-danger btn-block"  data-dismiss="modal" id="lanjut">Tutup</button></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
        </div></div>
        
        <td class="pilihanjawaban" valign="top"><?php echo "$jwbB"; ?></td></tr>
  		<tr><td valign="top"><input id="C" type="radio" name="credit-card" value="C" <?php echo $nilaiC; ?>>
        <label class="drinkcard-cc C" for="C">&nbsp;</label></td>
        <?php if(str_replace("  ","",$result['XGambarJawab3'])==''){} else {
		$gambarC = "XGambarJawab".$result['XC'];
		$pilgbrC = "$result[$gambarC]";
	//echo "<td valign='top'><a href='#'  data-toggle='modal' data-target='#myModalZ3'><img src='pictures/$result[XGambarJawab3]' style='max-height:190px'></td>";}
         echo "<td valign='top'><a href='#'  data-toggle='modal' data-target='#myModalC'><img src='pictures/$pilgbrC' style='max-height:190px'></a></td>";} ?>

        <div class="modal fade" id="myModalC" role="dialog">
            <div class="modal-dialog" style="width:95%">
        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title page-label">Perbesar Gambar C</h1>
                        </div>
                        <div class="panel-body">
                            <div class="inner-content">
                                <div class="row" style="background-color:#fff">
                                   <?php 
                                    if(str_replace("  ","",$pilgbrC)==''){}else{
                                   echo "<img src='pictures/$pilgbrC' width='100%'></a><br />"; 
                                   }
                                   ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row" style="background-color:#fff">
                                
                                <div class="col-xs-6 col-center" style="margin-left:25%">
                                    <button data-bind="click: handleNotConfirm" type="submit" class="btn btn-danger btn-block"  data-dismiss="modal" id="lanjut">Tutup</button></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
        </div></div>


        <td class="pilihanjawaban" valign="top"><?php echo "$jwbC"; ?></td></tr>
        <tr><td valign="top"><input id="D" type="radio" name="credit-card" value="D" <?php echo $nilaiD; ?>>
        <label class="drinkcard-cc D" for="D">&nbsp;</label></td>
        <?php if(str_replace("  ","",$result['XGambarJawab4'])==''){} else {
		$gambarD = "XGambarJawab".$result['XD'];
		$pilgbrD = "$result[$gambarD]";
		//echo "<td valign='top'><a href='#'  data-toggle='modal' data-target='#myModalZ4'><img src='pictures/$result[XGambarJawab4]' style='max-height:190px'></td>";} 
		 echo "<td valign='top'><a href='#'  data-toggle='modal' data-target='#myModalD'><img src='pictures/$pilgbrD' style='max-height:190px'></a></td>";} ?>

          <div class="modal fade" id="myModalD" role="dialog">
                    <div class="modal-dialog" style="width:95%">
                <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h1 class="panel-title page-label">Perbesar Gambar C</h1>
                                </div>
                                <div class="panel-body">
                                    <div class="inner-content">
                                        <div class="row" style="background-color:#fff">
                                           <?php 
                                            if(str_replace("  ","",$pilgbrD)==''){}else{
                                           echo "<img src='pictures/$pilgbrD' width='100%'></a><br />"; 
                                           }
                                           ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="row" style="background-color:#fff">
                                        
                                        <div class="col-xs-6 col-center" style="margin-left:25%">
                                            <button data-bind="click: handleNotConfirm" type="submit" class="btn btn-danger btn-block"  data-dismiss="modal" id="lanjut">Tutup</button></a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                </div></div>


        <td class="pilihanjawaban" valign="top"><?php echo "$jwbD"; ?></td></tr>
        <?php if($sopil>4){?>
  		<tr><td valign="top"><input id="E" type="radio" name="credit-card" value="E" <?php echo $nilaiE; ?> >
        <label class="drinkcard-cc E" for="E">&nbsp;</label></td>
        <?php if(str_replace("  ","",$result['XGambarJawab5'])==''){} else {
		$gambarE = "XGambarJawab".$result['XE'];
		$pilgbrE = "$result[$gambarE]";
		//echo "<td valign='top'><a href='#'  data-toggle='modal' data-target='#myModalZ5'><img src='pictures/$result[XGambarJawab5]' style='max-height:190px'></td>";} 
		     echo "<td valign='top'><a href='#'  data-toggle='modal' data-target='#myModalE'><img src='pictures/$pilgbrE' style='max-height:190px'></a></td>";} 
		?>
        
          <div class="modal fade" id="myModalE" role="dialog">
            <div class="modal-dialog" style="width:95%">
        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title page-label">Perbesar Gambar C</h1>
                        </div>
                        <div class="panel-body">
                            <div class="inner-content">
                                <div class="row" style="background-color:#fff">
                                   <?php 
                                    if(str_replace("  ","",$pilgbrE)==''){}else{
                                   echo "<img src='pictures/$pilgbrE' width='100%'></a><br />"; 
                                   }
                                   ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row" style="background-color:#fff">
                                
                                <div class="col-xs-6 col-center" style="margin-left:25%">
                                    <button data-bind="click: handleNotConfirm" type="submit" class="btn btn-danger btn-block"  data-dismiss="modal" id="lanjut">Tutup</button></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
        </div></div>

        <td class="pilihanjawaban" valign="top"><?php echo "$jwbE"; ?></td></tr>
        <?php } ?>
        
        </table>

<div id="filephp"></div>

<div class="modal fade" id="myModalZ1" role="dialog">
    <div class="modal-dialog" style="width:95%">
<div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title page-label">Perbesar Gambar</h1>
                </div>
                <div class="panel-body">
                    <div class="inner-content">
                        <div class="row" style="background-color:#fff">
                           <?php 
						    if(str_replace("  ","",$result['XGambarTanya'])==''){}else{
						   //echo "<img src='pictures/$result[XGambarTanya]' height='100%'></a><br />"; 
						   }
						   ?>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row" style="background-color:#fff">
                        
                        <div class="col-xs-6 col-center" style="margin-left:25%">
                            <button data-bind="click: handleNotConfirm" type="submit" class="btn btn-danger btn-block"  data-dismiss="modal" id="lanjut">Tutup</button></a>
                        </div>
                    </div>
                </div>
                
            </div>
</div></div>



<?php } ?> 
</div></div></div>
	<?php } ?>  

 


<style>
.container1 {
    font-size: 0; /*fix white space*/
	
}
.container1 > div {
    font-size: 16px; /*reset font size*/
    display: inline-block;
    vertical-align: top;
    width: 30.33%;
	border:thin; border-color:#0000FF;
    box-sizing: border-box;
	text-align:left;
	margin-left:20px;

}
@media (max-width: 480px) { /*breakpoint*/
    .container1 > div {
        display: block;
        width: 100%;
		margin-left:20px;
		padding-bottom:15px;
    }
}

</style>

   

<div class="kakisoal" id="kakisoal">
 <section class="page-section soal-navigation">
<div class="container1" style="margin-left:-30px;">
     <div >
     <?php 
	 if($prev_id>0){
	 echo "<a href='#' data-id='".$prev_id."' class='get_pic' id='tombol'>"; 
	 }
	 ?>
                    <button id="btnPrevSoal" class="btn btn-default btn-prev" data-bind="click: gotoBack">SOAL SEBELUMNYA</button>
      </a>
     </div>
     <?php
// $cek = mysql_query("select * from cbt_jawaban where XNomerSoal='$stu' and XKodeSoal ='$xkodesoal'"); 

if(isset($stu)){ 
 $cek = mysql_query("select * from cbt_jawaban where Urut='$stu' and XKodeSoal ='$xkodesoal' and XTokenUjian = '$xtokenujian'  and XUserJawab = '$user'"); 

 $var_ragu = mysql_fetch_array($cek);
 $r = $var_ragu['XRagu'];
 if($r == '1'){$ragu = 'checked';} else {$ragu = '';}
 if(isset($XA)){ $nilaiA = $var_ragu['$XA']; }
 if(isset($XB)){ $nilaiB = $var_ragu['$XB']; }
 if(isset($XC)){ $nilaiC = $var_ragu['$XC']; }
 if(isset($XD)){ $nilaiD = $var_ragu['$XD']; }
 
 if($sopil>4){ 
 if(isset($XE)){ $nilaiE = $var_ragu['$XE']; }
 }
}
   ?>

    <div><label  class="labele" style="padding-bottom:10px; padding-top:10px; width:225px">
    <input type="checkbox" id="<?php echo $stu; ?>" onClick="toggle_select(<?php echo $stu; ?>)"<?php if(isset($ragu)){echo $ragu;} ?> />&nbsp;RAGU-RAGU</label>
	</div>

    <div >
                    <?php 
				   //echo "$next_id";
				   if(isset($next_id)){
					 if($next_id==''){echo '<a href="#" >'; 
				
					   ?>
                   
                   <?php 
				   $cekragu = mysql_num_rows(mysql_query("select * from cbt_jawaban where XRagu ='1' and XKodeSoal ='$xkodesoal' and XTokenUjian = '$xtokenujian'
				   and XUserJawab = '$user'")); 
 					  	if($cekragu>0){ ?>
						<button id="btnSelesai" class="btn btn-primary btn-end activebutton" data-toggle="modal" data-target="#myModalR">TES SELESAI</button>
                      	<?php } else { ?>  
						<button id="btnSelesai" class="btn btn-primary btn-end activebutton" data-toggle="modal" data-target="#myModal2">TES SELESAI</button>
                    	<?php } //echo "|$next_id|";
					echo "</a>";
					} else { 
				    
				   echo '<a href="#" data-id="'.$next_id.'" class="get_pic" id="tomb">'; ?>  
<button id="btnNextSoal" class="btn btn-primary btn-next activebutton" 
data-bind="css: { &#39;activebutton&#39;:(currentNo() &lt; totalQuestions - 1)}, visible: (currentNo() &lt; totalQuestions - 1),click: gotoNext" style="margin-top:-13px; width:225px">SOAL BERIKUTNYA</button><?php // echo "|$next_id|"; 
					
					 } ?>
                     
             <?php } else { ?>
			 		<?php 
				   $cekragu = mysql_num_rows(mysql_query("select * from cbt_jawaban where XRagu ='1' and XKodeSoal ='$xkodesoal' and XTokenUjian = '$xtokenujian'
				   and XUserJawab = '$user'")); 
 					  	if($cekragu>0){ ?>
						<button id="btnSelesai" class="btn btn-primary btn-end activebutton" data-toggle="modal" data-target="#myModalR">TES SELESAI</button>
                      	<?php } else { ?>  
						<button id="btnSelesai" class="btn btn-primary btn-end activebutton" data-toggle="modal" data-target="#myModal2">TES SELESAI</button>
                    	<?php } //echo "|$next_id|";
					echo "</a>";
			  }?>
    </div>


</div>
 </section>	
</div>
<style>

.labele {
  display: block;
  padding-top:6px;
  padding-bottom:6px;
  font-size: 16px;
  background-color: #eaca08;
  margin-top:-10px;
  padding-left:50px;
  border-radius: 2px;
  cursor:pointer;
  width:210px;
  color:#FFF;  
  &:hover {
    cursor: pointer;
  }
input[type="checkbox"] {
  position: relative;
  top: 3px;
  font-size:18px;
    border: 2px solid black;
    width: 20px;
    height: 20px;
    margin: 0;
    padding: 0;
}

</style>

<!-- Creates the bootstrap modal where the image will appear -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Image preview</h4>
      </div>
      <div class="modal-body">
        <img src="" id="imagepreview" style="width: 400px; height: 264px;" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
<div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title page-label">Konfirmasi Tes</h1>
                </div>
                <div class="panel-body">
                    <div class="inner-content">
                        <div class="row" style="background-color:#fff">
                            <div class="col-xs-3">
                                <span><img src="images/alert.png" width="150px"></span>
                            </div>
                            <div class="col-xs-9">
                                <div class="wysiwyg-content">
                                    <p>
                                        Apakah anda yakin ingin mengakhiri tes?<br>
                                        Anda tidak akan bisa kembali ke soal jika sudah menekan tombol selesai.
                                    </p>
                                </div>
                                <div class="assent-checkbox">
                                    <input type="checkbox" data-target="#btnLanjut" id="0-ascb" onClick="document.getElementById('btnLanjut').disabled=false">
                                    <label class="assentcb-label" for="0-ascb">
                                        Centang, kemudian tekan tombol selesai. <br>Jika anda Yakin untuk Mengakhiri Tes<br>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row" style="background-color:#fff">
                        <div class="col-xs-6"> 
                            <button id="btnLanjut" type="submit" class="btn btn-success btn-block" disabled onClick="location.href='akhir.php';">SELESAI</button>
                        </div>
                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-danger btn-block " data-dismiss="modal">TIDAK</button>
                        </div>
                    </div>
                </div>
                
            </div>
</div></div>

<div class="modal fade" id="myModalR" role="dialog">
    <div class="modal-dialog">
<div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title page-label">Konfirmasi Tes</h1>
                </div>
                <div class="panel-body">
                    <div class="inner-content">
                        <div class="row" style="background-color:#fff">
                            <div class="col-xs-3 glyphicon-left-panel">
                                <span><img src="images/alert.png" width="150px"></span>
                            </div>
                            <div class="col-xs-9">
                                <div class="wysiwyg-content">
                                    <p>
                                        Terdapat soal yang bertanda RAGU-RAGU <br>
                                        Selesaikan lebih dulu Soal RAGU-RAGU.<br>
                                        Klik Tombol LANJUT
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row" style="background-color:#fff">
                        
                        <div class="col-xs-6 col-center" style="margin-left:25%">
                            <button data-bind="click: handleNotConfirm" type="submit" class="btn btn-danger btn-block"  data-dismiss="modal" id="lanjut">LANJUT</button></a>
                        </div>
                    </div>
                </div>
                
            </div>
</div></div>





<script>
$('table input[type="radio"]').click(function() {
    $('input[type="button"]').removeAttr('disabled');
});
$("#pop").on("click", function() {
   $('#imagepreview').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});

</script>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title page-label">Konfirmasi Tes</h1>
                </div>
                <div class="panel-body">
                    <div class="inner-content">
                        <div class="wysiwyg-content">
                            <p>
                                Terimakasih telah berpartisipasi dalam tes ini.<br>
                                Silahkan klik tombol LOGOUT untuk mengakhiri test.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row"  style="background-color:#fff">
                        <div class="col-xs-offset-3 col-xs-6">
                            <button id="btnLanjut" data-bind="click: redirectToDone" type="submit" class="btn btn-success btn-block" disabled="">SELESAI</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


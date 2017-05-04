<!DOCTYPE html>
<html class="no-js" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

 <script src="js/jquery-scrolltofixed.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        // Dock the header to the top of the window when scrolled past the banner.
        // This is the default behavior.

        $('.header').scrollToFixed();


        // Dock the footer to the bottom of the page, but scroll up to reveal more
        // content if the page is scrolled far enough.

        $('.footer').scrollToFixed( {
            bottom: 0,
            limit: $('.footer').offset().top
        });


        // Dock each summary as it arrives just below the docked header, pushing the
        // previous summary up the page.

        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.header').outerHeight(true) + 10,
                limit: function() {
                    var limit = 0;
                    if (next) {
                        limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                    } else {
                        limit = $('.footer').offset().top - $(this).outerHeight(true) - 10;
                    }
                    return limit;
                },
                zIndex: 999
            });
        });
    });
</script>   
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>CBT BeeSMART | UJIAN ONLINE</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


<script>$("input").on("click", function(){
  if ( $(this).attr("type") === "radio" ) {
    $(this).parent().siblings().removeClass("isSelected");
  }
  $(this).parent().toggleClass("isSelected");
});</script>
    
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/sidein_menu.js"></script>
<style>
.labele {
  display: block;
  padding: 5px 10px;
      font-size: 18px;
  margin: 5px 0;  background-color: #eaca08;
  border-radius: 2px;
  cursor:pointer;
  width:250px;
  color:#FFF;  
  &:hover {
    cursor: pointer;
  }
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

#kaki{
	margin-top:-8px;
	margin-left:15px;
	margin-bottom:10px;
	margin-right:15px;
	background-color:#000;
	color:#fff;
	height:400px;	
	}			

#koplembarsoal{
	margin-top:15px;
	margin-left:15px;
	margin-bottom:15px;
	margin-right:15px;
	background-color:#fff;
	height:90px;
	font-size:24px;
	font-weight:bold;
}	
.title {
    font-size: 13pt;
    font-weight: bold;
	margin-left:20px;
	margin-top:-33px;
	top:-33px;	
}
.header {
    background-color: #fff;
    padding-top: 7px;
	padding-bottom:11px;
	margin-left:15px;
	margin-right:15px;
	margin-top:10px;
	margin-bottom:2px;
}
.header.scroll-to-fixed-fixed {
    color: red;
	margin-top:0px;
	border-bottom-style:solid;
	border-color:#ccc;
-webkit-box-shadow: 0 8px 6px -6px #ccc;
	   -moz-box-shadow: 0 8px 6px -6px #ccc;
	        box-shadow: 0 8px 6px -6px #ccc;

	margin-left:0px;
}
.lanjut {
    background-color: #fff;
	width:100%;
}

#primary {
    float: left;
    width: 480px;
	
}

#content {
    float: left;
    width: 480px;
}

#secondary {
    float: left;
    width: 480px;
}

.kotaksoal{
	width:97%;
	padding:20px;
	border:solid;
	top:30px;
	border-color:#CCC;
	height:100%;
}
.flex-next {
    background-color: #336898;
    width: 20px;
    height: 20px;
    margin: 10px;
    line-height: 20px;
    color: white;
    font-size: 18px;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:10px;
	padding-bottom:10px;

}
.flex-ragu {
    background-color:#FC0;
    width: 20px;
    height: 20px;
    margin: 10px;
    line-height: 20px;
    color: white;
    font-size: 18px;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:10px;
	padding-bottom:10px;
	text-decoration:none;
}
.flex-prev {
    background-color: #999;
    width: 25px;
    height: 25px;
    margin: 10px;
    line-height: 20px;
    color: white;
    font-size: 18px;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:10px;
	padding-bottom:10px;
}
.flex-container {
    height: 100%;
    padding: 0;
    margin: 0;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
}
.row {
    width: auto;
    /*border: 1px solid blue;*/
	 background-color: #336898;
}
.flex-item {
    background-color: #336898;
	 width: 120px;
    height: 40px;
    margin-right: 0px;
	margin-top:-10px;
    line-height: 20px;
    color: white;
    font-size: 15px;
	font-weight:bold;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:7px;
	padding-bottom:6px;
}	
.flex-abu {
    background-color: #999;
    width: 120px;
    height: 40px;
    margin-right: 0px;
	margin-top:-10px;
    line-height: 20px;
    color: white;
    font-size: 15px;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:10px;
	padding-bottom:10px;
	float:right;
}	
.flex-biru {
    background-color: #000;
    width: 120px;
    height: 40px;
    margin-right: 0px;
	margin-top:-10px;
    line-height: 20px;
    color: white;
    font-size: 15px;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:10px;
	padding-bottom:10px;
	float:right;
}	
.flex-putih {
    background-color: #fff;
    width: 120px;
    height: 40px;
    margin-right: 0px;
	margin-top:-10px;
    line-height: 20px;
    color: black;
    font-size: 15px;
	font-weight:bold;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:10px;
	padding-bottom:10px;
	float:left;
}	


</style>
  
       
<style>
#ck-button {
    margin:4px;
    background-color:#EFEFEF;
    border-radius:4px;
    border:1px solid #D0D0D0;
    overflow:auto;
    float:left;
}
</style>  
    <script>
        function disableBackButton() {
            window.history.forward();
        }
        setTimeout("disableBackButton()", 0);
		
		
		var box = document.querySelector('#no_email');
console.log(box);

box.addEventListener('change', function no_email_confirm() { 
  if (this.checked == false) {
    return true;
  } else {
   var confirmation= confirm("This means that the VENDOR will NOT RECEIVE ANY communication!!!!");
    if (confirmation)
        return true;
    else
       box.checked = false;
  }
});
    </script>
    
<style>
    .no-close .ui-dialog-titlebar-close {
        display: none;
    }
#tampilkan {
    background-color: #336898;
    width: 150px;
    height: 50px;
    margin-right: 20px;
	margin-top:-10px;
    line-height: 20px;
    color: white;
    font-size: 22px;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:14px;
	padding-bottom:14px;
	float:right;
	
}	

</style>

    <link href="css/fonts.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">

    <script src="js/inline.js"></script>

<body class="font-medium">
   

    <main>
 		
        <li class="header">
            <div class="main"><span class="flex-putih">SOAL NO.</span>
            <span class="flex-item" style="background-color:<? echo $cssb; ?>">
            <? echo "2 $nosoal"; ?></span>
            <span class="flex-biru"> <div id="h_timer"></div>
            </span>
            <span class="flex-abu">
            Sisa Waktu</span>
            </div>
        </li>
        
 <div id="fontlembarsoal">

       <span id="hurufsoal"> Ukuran font soal : <a id="jfontsize-m2" href="#" style="font-size:14px; text-decoration:none">&nbsp; A &nbsp;</a> <a id="jfontsize-d2" href="#" style="font-size:16px; text-decoration:none">&nbsp; A &nbsp;</a> <a id="jfontsize-p2" href="#" style="font-size:18px; text-decoration:none">&nbsp; A &nbsp;</a></span>
</div>   

                    <script type="text/javascript" src="js/jquery-2.0.3.js"></script>
                    <script type="text/javascript" src="js/jquery.countdownTimer.js"></script>                   
                    <script>
                                $(function(){
                                    $('#h_timer').countdowntimer({
                                        hours :0,
                                        minutes :0,
										seconds:15,														
                                        size : "lg",
						                timeUp : timeisUp																														
                                    });
                                });
					function timeisUp() {
					alert("Waktu pengerjaan sudah habis");
						setTimeout(function() { 
						window.location.href = $("a")[0].href; 
						}, 2000);
						//Code to be executed when timer expires.
						$('#modal-form').modal(options);
						window.location="puspendik.php";
					}

                            </script>

<!-- load jquery -->
<script type="text/javascript">
$(document).ready(function() {

	$.post( "getsoal.php", { pic: "1"}, function( data ) {
	  $("#picture").html( data );
	});
	
	$("#picture").on("click",".get_pic", function(e){
		var picture_id = $(this).attr('data-id');
		$("#picture").html("<div style=\"margin:50px auto;width:50px;\"><img src=\"loader.gif\" /></div>");
		$.post( "getsoal.php", { pic: picture_id}, function( data ) {
			$("#picture").html( data );
		});
		return false;
	});
	
});
</script>

<script src="js/jquery-scrolltofixed.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        // Dock the header to the top of the window when scrolled past the banner.
        // This is the default behavior.

        $('.header').scrollToFixed();


        // Dock the footer to the bottom of the page, but scroll up to reveal more
        // content if the page is scrolled far enough.

        $('.footer').scrollToFixed( {
            bottom: 0,
            limit: $('.footer').offset().top
        });


        // Dock each summary as it arrives just below the docked header, pushing the
        // previous summary up the page.

        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.header').outerHeight(true) + 10,
                limit: function() {
                    var limit = 0;
                    if (next) {
                        limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                    } else {
                        limit = $('.footer').offset().top - $(this).outerHeight(true) - 10;
                    }
                    return limit;
                },
                zIndex: 999
            });
        });
    });
</script>
<div id="picture"> 
<!-- pictures will appear here --> 
</div>


    </main>

  
</body>

<script src="js/jquery.cookie.js"></script>
<script src="js/common.js"></script>
<script src="js/main.js"></script>
<script src="js/cookieList.js"></script>
<script src="js/backend.js"></script>

<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none; max-width: none;"></div></div></body></html>
<script>
$(document).ready(function(){
				$("#awal").hide(); }
</script>				
                   <!-- Modal -->
<div class="modal fade" id="modal-form" role="dialog">
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
                    <div class="row" style="background-color:#fff">
                        <div class="col-xs-offset-3 col-xs-6">
                            <button type="submit" class="btn btn-success" data-dismiss="modal">SELESAI</button>
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">TIDAK</button>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function alertt(m){
  alert(m);
}
</script>


</head>
<style>
#fontlembarsoal{
	margin-top:3px;
	margin-left:15px;
	margin-bottom:0px;
	margin-right:15px;
	background-color:#f0efef;
	font-size:12px;
	font-weight:bold;
	height:45px;
	left:40px;
	padding-top:10px;	
	padding-bottom:3px;	
	}

#tulisansoal{	
	background-color:#fff;
	height:90px;
	font-size:18px;
	font-weight:bold;
	vertical-align:middle;
	top:495px;
}
.tulisansoal{	
	background-color:#fff;
	height:90px;
	font-size:18px;
	font-weight:bold;
	vertical-align:middle;
	top:495px;
}
.nomersoal{	
	top:25px; width:100px;
	background-color:#336898;
	color:#fff;
	height:90px;
	font-size:18px;
	font-weight:bold;
	vertical-align:middle;	
	}	

#lembarsoal{
	margin-top:-8px;
	margin-left:15px;
	margin-bottom:2px;
	margin-right:15px;
	background-color:#fff;
	height:150%;
	    border-radius: 30px;
	border-style:solid;
	border-color:#999;
	}	
	
#hurufsoal{
    padding-left: 30px;
	padding-top:2px;
	padding-bottom:2px;
}

#tampilkan {
    background-color: #336898;
    width: 150px;
    height: 50px;
    margin-right: 20px;
	margin-top:-10px;
    line-height: 20px;
    color: white;
    font-size: 22px;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:14px;
	padding-bottom:14px;
	float:right;
}	
#kotaksoal{
	width:97%;
	margin:0px auto;
	padding:20px;
	border:solid;
	top:30px;
	border-color:#CCC;
	
}
p{
	padding:20px;
	font-size: 16px;
	}
li{
	list-style:none;
	font-size:18px;
	}

	#lembaran{
	padding:20px;
	margin-left:12px;
	margin-right:12px;
	top:-30px;
	font-size: 12pt;
	background-color:#fff;
	border:solid;
	border-color:#ccc;
	}	
	#lembaransoal{
	padding:20px;
	font-size: 12pt;
	border:solid;
	border-color:#ccc;
	}	
.jawab	{
	font-size: 10pt;
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
    width:30px;
    height:30px;
    text-align:center;
}

	
    </style>
    
    <style>
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
.main {
	margin-right:15px;
	margin-top:10px;
}

.content {
    padding: 20px;
    overflow: hidden;
}
.left {
    float: left;
    width: 680px;
}
.right {
    float: left;
    margin-left: 40px;
}
.summary {
    border: 1px solid #dddddd;
    overflow: hidden;
    margin-top: 20px;
    background-color: white;
}
.summary .caption {
    border-bottom: 1px solid #dddddd;
    background-color: #dddddd;
    font-size: 12pt;
    font-weight: bold;
    padding: 5px;
}
.summary.scroll-to-fixed-fixed {
    margin-top: 0px;
}
.summary.scroll-to-fixed-fixed .caption {
    color: red;
}
.contents {
    width: 150px;
    margin: 10px;
    font-size: 80%;
}
.kakisoal{
	margin-left:15px;
	margin-bottom:10px;
	margin-right:15px;
	background-color:#fff;
	font-size:12px;
	font-weight:bold;
	height:70px;
	left:40px;

	}
.labele {
  display: block;
  padding: 8px 8px;
  font-size: 16px;
  background-color: #eaca08;
  margin-left:150px;
  margin-top:5px; 
  border-radius: 2px;
  cursor:pointer;
  width:200px;
  color:#FFF;  
  &:hover {
    cursor: pointer;
  }
}
.labelprev {
  display: block;
  padding: 10px 10px;
  font-size: 16px;
  margin: 5px auto;  
  background-color: #999;
  border-radius: 2px;
  cursor:pointer;
  width:200px;
  color:#FFF;  
  &:hover {
    cursor: pointer;
  }
}
.labelnext {
  display: block;
  padding: 10px 10px;
  font-size: 16px;
  float:right; 
  margin: 5px auto;   
  background-color: #336898;
  border-radius: 2px;
  cursor:pointer;
  width:200px;
  color:#FFF;  
  &:hover {
    cursor: pointer;
  }
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

</style>


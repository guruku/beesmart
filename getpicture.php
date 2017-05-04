<link type="text/css" rel="stylesheet" href="css/jfontsize.css" />
<link type="text/css" rel="stylesheet" href="css/shCoreDefault.css" />
<script type="text/javascript" language="javascript" src="js/jquery.jfontsize-1.0.js"></script>
<script>
function alertt(m){
  alert(m);

}
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
</head>
<style>
#fontlembarsoal{
	margin-top:3px;
	margin-left:15px;
	margin-bottom:10px;
	margin-right:15px;
	background-color:#f0efef;
	font-size:12px;
	font-weight:bold;
	height:60px;
	left:40px;
	padding-top:20px;	
	}

#tulisansoal{	
	background-color:#fff;
	height:90px;
	font-size:24px;
	font-weight:bold;
	vertical-align:middle;
	top:495px;
}
.tulisansoal{	
	background-color:#fff;
	height:90px;
	font-size:24px;
	font-weight:bold;
	vertical-align:middle;
	top:495px;
}
.nomersoal{	
	top:25px; width:100px;
	background-color:#336898;
	color:#fff;
	height:90px;
	font-size:24px;
	font-weight:bold;
	vertical-align:middle;	
	}	

#lembarsoal{
	margin-top:-8px;
	margin-left:15px;
	margin-bottom:2px;
	margin-right:15px;
	background-color:#fff;
	}	
	
#hurufsoal{
    padding-left: 30px;
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
    width: 20px;
    height: 20px;
    margin: 10px;
    line-height: 20px;
    color: white;
    font-size: 22px;
    text-align: center;
	padding-left:12px;
	padding-right:12px;	
	padding-top:5px;
	padding-bottom:5px;
}	
.flex-abu {
    background-color: #999;
    width: 150px;
    height: 50px;
    margin-right: 0px;
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
.jawab	{
	padding-bottom:10px;
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
    margin-top:0px;
	margin-left:15px;
	padding:0;
    -webkit-appearance:none;
       -moz-appearance:none;
            appearance:none;
}
.A{background-image:url(images/A.png);}
.B{background-image:url(images/B.png);}
.C{background-image:url(images/C.png);}
.D{background-image:url(images/D.png);}
.E{background-image:url(images/E.png);}


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
.jawab{ 
margin-top:-53px;
margin-left:40px;
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
	height:90px;
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
<div id="fontlembarsoal">
    <div class="flex-container">
       <span id="hurufsoal"> Ukuran font soal : <a id="jfontsize-m2" href="#" style="font-size:14px; text-decoration:none">&nbsp; A &nbsp;</a> <a id="jfontsize-d2" href="#" style="font-size:16px; text-decoration:none">&nbsp; A &nbsp;</a> <a id="jfontsize-p2" href="#" style="font-size:18px; text-decoration:none">&nbsp; A &nbsp;</a></span>
    </div>
</div>

<?php
include "cbt_con.php";

//get pic id from ajax request
if(isset($_POST["pic"]) && is_numeric($_POST["pic"]))
{
	$current_picture = filter_var($_POST["pic"], FILTER_SANITIZE_NUMBER_INT);
}else{
	$current_picture=1;
}

//Connect to Database

//get next picture id
$sql = mysql_query("SELECT id FROM pictures WHERE id > '$current_picture' ORDER BY id ASC LIMIT 1");
$result = mysql_fetch_array($sql);
if($result){
	$next_id = $result['id'];
}

//get previous picture id
$sql = mysql_query("SELECT id FROM pictures WHERE id < $current_picture ORDER BY id DESC LIMIT 1");
$result = mysql_fetch_array($sql);
if($result){
	$prev_id = $result['id'];
}

//get details of current from database
$sql = mysql_query("SELECT PictureTitle, PictureName FROM pictures WHERE id = $current_picture LIMIT 1");
$result = mysql_fetch_array($sql);
if($result){
	//construct next/previous button
	$prev_button = (isset($prev_id) && $prev_id>0)?'<a href="#" data-id="'.$prev_id.'" class="get_pic"><img src="prev.png" border="0" /></a>':'';
	$next_button = (isset($next_id) && $next_id>0)?'<a href="#" data-id="'.$next_id.'" class="get_pic"><img src="next.png" border="0" /></a>':'';
?>

<div id="lembarsoal"><br /><br />
<div class="cc-selector">
	<div id="kotaksoal">
  
<?	//output html
	echo "<span class='jawab'>aaa $result[PictureName]</span><img src='pictures/$result[PictureName]'>";
?>
    </div>
</div>
</div>

 <div class="kakisoal">
 
 <section class="page-section soal-navigation">
        <div class="action-wrapper">
            <div class="row1">
                <div class="col-xs-4">
                <? echo '<a href="#" data-id="'.$prev_id.'" class="get_pic">'; ?>
                    <button id="btnPrevSoal" class="btn btn-default btn-prev" data-bind="click: gotoBack">SOAL SEBELUMNYA</button>
                 <? echo '</a>'; ?>
                </div>
                <div class="col-xs-4 text-center">
                    <div class="unsure-checkbox" data-bind="with: testDetails()[currentNo()]">
                        <input type="checkbox" id="unsureCheckbox" data-bind="checked: isUnsure" aria-checked="false">
                        <label class="labelUnsureCheckbox" for="unsureCheckbox">
                            RAGU - RAGU
                        </label>
                    </div>
                </div>
                <div class="col-xs-4 text-right">
                   <? echo '<a href="#" data-id="'.$next_id.'" class="get_pic">'; ?>  
                   <button id="btnNextSoal" class="btn btn-primary btn-next activebutton" data-bind="css: { &#39;activebutton&#39;:(currentNo() &lt; totalQuestions - 1)}, visible: (currentNo() &lt; totalQuestions - 1),click: gotoNext">SOAL BERIKUTNYA</button><? echo '</a>'; ?>
                    <button id="btnSelesai" class="btn btn-primary btn-next" data-bind="css: { &#39;activebutton&#39;:(currentNo() &gt;= totalQuestions - 1)}, visible: (currentNo() &gt;= totalQuestions - 1),click: gotoFinish" style="display: none;">SELESAI</button>
                </div>
            </div>
        </div>
    </section>   </div> 	
	
<? } ?>  

<script type="text/javascript" language="javascript">
                        $('.jawab').jfontsize({
                            btnMinusClasseId: '#jfontsize-m2',
                            btnDefaultClasseId: '#jfontsize-d2',
                            btnPlusClasseId: '#jfontsize-p2',
                            btnMinusMaxHits: 1,
                            btnPlusMaxHits: 1,
                            sizeChange: 2
                        });						
                    </script> 
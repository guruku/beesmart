<html>
<head>
	<meta charset="utf-8">
	<title>Multiple Intellegence</title>
 <style type="text/css" media="print">
body {
	margin-left: -10px;
	margin-top: 0px;
	padding:0px
}
-->
.noprint{
        display:none;
}

@media print {
    #canvas-holder{
         position:absolute;
         width:200px;
         height:300px;
         z-index:15;
         left:16%;
		 top:55px;
         margin:-150px 0 0 -150px;
    }
	
}
@page {
  size: A4 potrait;
 /* margin: 70pt 60pt 70pt; */
  margin: 0pt 0pt 0pt;
}

.t12d{
	FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif;
	FONT-SIZE: 12px;
	font-style: normal;
	font-weight: normal;
}
                </style> 
	

	<link rel='stylesheet' href='Nwagon2.css' type='text/css'>
	<script src='Nwagon2.js'></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">

</style></head>
<body>
<table border="0px" cellpadding="0px" cellspacing="0px">
<tr><td>
<input type="button" class="noprint" onClick="window.print()" value="Print" />
</td></tr>	
</table>

	<div id="Nwagon"></div>
    <br>
    <? 

function fungsi_keter($nomer){
	if($nomer==1){
	$acak0 = "INTRAPERSONAL (MySelf Smart)";}
	elseif($nomer==2){
	$acak0 = "VISUAL (Picture Smart)";}
	elseif($nomer==3){
	$acak0 = "MUSICAL (Music Smart)";}
	elseif($nomer==4){
	$acak0 = "INTERPERSONAL (People Smart)";}
	elseif($nomer==5){
	$acak0 = "KINAESTHETIC (Body Smart)";}
	elseif($nomer==6){
	$acak0 = "LINGUISTIC (Word Smart)";}
	elseif($nomer==7){
	$acak0 = "LOGICAL (Number Smart)";}
	elseif($nomer==8){
	$acak0 = "NATURALIST (Nature Smart)";}
return $acak0;
}

$sa = $R;
$du = $V;
$ti = $M;
$em = $I;
$li = $K;
$en = $L;
$tu = $O;
$de = $N;

$faktorial = 70;

$satu  = $sa * $faktorial;
$dua   = $du * $faktorial;
$tiga  = $ti * $faktorial;
$empat = $em * $faktorial;
$lima  = $li * $faktorial;
$enam  = $en * $faktorial;
$tujuh = $tu * $faktorial;
$delapan = $de * $faktorial;


$varr = "[$satu], [$dua], [$tiga], [$empat], [$lima], [$enam], [$tujuh], [$delapan]";

  $multiArray = Array( 
        Array("id" => "$satu", "name" => "$sa", 'desk'=>'1', 'ket'=>'1'), 
        Array("id" => "$dua", "name" => "$du", 'desk'=>'2', 'ket'=>'1'),  
        Array("id" => "$tiga", "name" => "$ti", 'desk'=>'3', 'ket'=>'1'), 
        Array("id" => "$empat", "name" => "$em", 'desk'=>'4', 'ket'=>'1'), 
        Array("id" => "$lima", "name" => "$li", 'desk'=>'5', 'ket'=>'1'),  
        Array("id" => "$enam", "name" => "$en", 'desk'=>'6', 'ket'=>'1'), 
        Array("id" => "$tujuh", "name" => "$tu", 'desk'=>'7', 'ket'=>'1'), 
        Array("id" => "$delapan", "name" => "$de", 'desk'=>'8', 'ket'=>'1')); 


    $tmp = Array(); 
$al = 1;	
?>
	<script>
	    var options = {
	        'legend':{
	            names: [['INTRAPERSONAL (MySelf Smart)'], ['VISUAL (Picture Smart)'], ['MUSICAL (Music Smart)'], ['INTERPERSONAL (People Smart)'], ['KINAESTHETIC (Body Smart)'],  ['LINGUISTIC (Word Smart)'], ['LOGICAL (Maths Smart)'], ['NATURALIST (Nature Smart)']]
	        },
	        'dataset': {
	            title: 'Web accessibility status',
	            values: [<? echo "$varr"; ?>],
	            colorset: ['#2EB400', '#FF00CC', "#666666",'#FF0000', '#9900CC', "#FFCC00",'#2BC8C9', '#993300'],
	            fields: ['INTRAPERSONAL', 'VISUAL', 'MUSICAL','INTERPERSONAL', 'KINAESTHETIC', 'LINGUISTIC','LOGICAL', 'NATURALIST'],
	            opacity:[0.75, 0.75, 0.75, 0.75,0.75, 0.75, 0.75, 0.75]
	        },
//	        'core_circle_value' : ['100%'],
	        'core_circle_value' : ['SNA'],
	        'core_circle_radius':0,
	        'maxValue' : 210,
	        'increment' : 70,//25*5 = 125
	        'chartDiv': 'Nwagon',
	        'chartType': 'polar',
	        'chartSize': {width:600, height:550}
	    };
	    Nwagon.chart(options);
	</script>
<br>

</body>
</html>

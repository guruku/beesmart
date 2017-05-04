<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
			 <script type="text/javascript">
				var auto_refresh = setInterval(
				function ()
				{

				$('#load_comment').load('daftarpeserta.php').fadeIn();
				}, 1000); // refresh every 10000 milliseconds
				
				
				</script>
                
                <div  class="load_comment" id="load_comment">  
                </div>
</body>
</html>

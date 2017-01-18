<?php
$home= $_SERVER['SERVER_NAME'];
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />




</head>

	<body>
	
	<div class='main'>
	

	<br>
	<b><font class='font1'>Очистить список от повторений</font></b>
	<hr>
	<div style='margin-left:250px;'>
	
	<br>
		<font>Введите свой список:</font>
		<form action="rez.php" method="post">
		

		
		<p><textarea name='text' cols='15' rows='20'></textarea> 
		</P>
		



	
			
		<p><input type="submit" value="Отправить" class="button" ></p>
			
		</form>
	
	
	</div>






</div>

</body>

</html>

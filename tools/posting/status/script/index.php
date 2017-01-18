<?php $home= $_SERVER['SERVER_NAME'];
$uid=$_COOKIE["uid"];
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

	<body>
	
	<div class='main'>
	
	<br>
	<b><font class='font1'>Сменить статус</font></b>
<hr>




<br>
	
	<div style='margin-left:235px;'>

		
		<form action="rez.php" method="post">
		
		


		<font>Текст вашего статуса:</font>
		<p><textarea name='messages_text' cols='20' rows='10'></textarea></P>

		

		
		<p><input type="submit" value="Отправить" class="button"></p>
		</form>

		</div>





</div>

</body>

</html>

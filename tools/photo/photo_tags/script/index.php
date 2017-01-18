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
	<b><font class='font1'>Отметить на фото</font></b>
	<hr>
	<div style='margin-left:250px;'>
	
	<br>
		
		<form action="temp.php" method="post">
		
		<font>Адрес фотографии<br>(в формате <b>photo5345345_5435353</b>):</font>
		
		
		<p><input type='text' size='20' name='id'></p>
		
		<font>Введите список id пользователей(не более 50), которых вы хотите добавить в друзья:</font>
	
		
			

		<p><textarea name='text' cols='15' rows='12'></textarea> 
		</P>
		
		<p><font>Интервал:<br><br><input type="input" value="1" size="1" name="time1"> - 
		<input type="input" value="15" name="time2" size="1" > сек.</font></p>
			
		<p><input type="submit" value="Отправить" class="button" ></p>
			
		</form>
	</div>





</div>

</body>

</html>

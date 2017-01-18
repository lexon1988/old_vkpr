<html>

<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

	<body>
	
	<div class='main'>
	
	<br>
	<b><font>Рассылка сообщений</font></b>
<hr>




<br>
	
	<div style='margin-left:235px;'>

		
		<form action="temp.php" method="post">
		
		



		<font>Текст вашего сообщения:</font>
		<p><textarea name='messages_text' cols='20' rows='2'></textarea></P>
		
		<font>Медиавложения (photo, video, audio, doc, wall, в формате photo42342344_361798636):</font>
		<p><input type='text' name='attachment_text'></P>
		
		<font>Введите список id пользователей, которым вы хотие отправить сообщение:</font>
		<p><textarea name='text' cols='15' rows='10'></textarea></P>
		
		<p><font>Интервал:<br><br><input type="input" value="1" size="1" name="time1"> - 
		<input type="input" value="15" name="time2" size="1" > сек.</font></p>
		
		<p><input type="submit" value="Отправить" class="button"></p>
		</form>

		</div>





</div>

</body>

</html>

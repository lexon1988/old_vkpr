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
	<b><font class='font1'>Постинг на стену</font></b>
<hr>




<br>
	
	<div style='margin-left:235px;'>

		
		<form action="rez.php" method="post">
		
		

		<font>Введите свой или чужой id:</font>
		<p><input name='user_id' value='<?php echo $uid; ?>' size="10"></p>

		<font>Текст вашего сообщения:</font>
		<p><textarea name='messages_text' cols='20' rows='10'></textarea></P>
		
		<font>Медиавложения (photo, video, audio, doc, в формате <b>photo42342344_361798636</b>):</font>
		<p><input type='text' name='attachment_text'></P>
		
	
		

		
		<p><input type="submit" value="Отправить" class="button"></p>
		</form>

		</div>





</div>

</body>

</html>

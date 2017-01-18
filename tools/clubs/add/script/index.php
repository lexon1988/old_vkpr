<?php  
$home= $_SERVER['SERVER_NAME'];
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

	<body>
	
	<div class='main' >
	

<br>
<b><font class='font1'>Пригласить в группу из списка</font></b>
<hr>


	<div style='margin-left:235px;'>
		<form action="temp.php" method="post">
		
		<p><font>id вашей группы: </font></p>
		<p><input name='gid' type="text" size='15' value=""></p>
		<font>Введите список id пользователей(не более 40), которых вы хотите пригласить в группу:</font>
		<p><textarea name='text' cols='15' rows='12'></textarea> 
		</p>
		
		<p><font>Интервал:<br><br><input type="input" value="1" size="1" name="time1"> - 
		<input type="input" value="15" name="time2" size="1" > сек.</font></p>
		
		<p><input type="submit" value="Отправить" class="button" ></p>
		</form>
	</div>





</div>

</body>

</html>

<html>

<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

	<body>
	
	<div class='main' >
	

<br>
<b><font>Список приглашённых в сообщество пользователей</font></b>
<hr>

<br>
	<div style='margin-left:235px;'>
		<form action="rez.php" method="get">
		
		<p><font>id вашей группы: </font></p>
		<p><input name='gid' type="text" value=""></p>
		
		
		
		<p><font>Смещение для выборки подмножества пользователей: </font></p>
		


		<p><input name='offset' type="text" size=2  value="0"></p>
		
		<p><input type="submit" value="Отправить" class="button" ></p>
		</form>
	</div>




</body>

</html>

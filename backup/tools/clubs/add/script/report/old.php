<?php
$uid=$_COOKIE["uid"];
$gid=$_COOKIE["gid"];
?>
<?php
$uid=$_COOKIE["uid"];
$gid=$_COOKIE["gid"];
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
</head>
	<body>
	
<div class='main'>
	<a href="../index.php"><<<</a>
	<br><br>	
	

	
	
<b><font>Предидущий список</font></b>
		<hr>	
	<div style='margin-left:250px;'>
	
	<br>
	
		<form action="bad_del.php" method="post">
				
		<p><textarea name='text' cols='15' rows='20'><?php echo file_get_contents('../files/'.$uid.'_gl.txt') ?></textarea> 
		</P>
		<p><input type="submit" value="Очистить" class="button"></p>
		
		
		</form>
</div>


<font>	
	
	Отчёт:
<br>	<br>

	<a href="old.php">Предыдущий список</a>	
	<br>Список который вы уже проверяли<hr>
	<a href="good.php">Белый список</a>	
	<br>Успешно приглашённые пользователи<hr>
	<a href="bad.php">Черный список</a>
	<br>Пользователи которых вы уже приглашали, или те которых по какой либо причине нельзя пригласить в сообщество

	<br><br>

</font>



</div>

</body>

</html>

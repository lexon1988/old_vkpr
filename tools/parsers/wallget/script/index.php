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
	<b><font class='font1'>Парсер записей на стене</font></b>
<hr>




<br>
	
	<div style='margin-left:235px;'>

		
		<form action="rez.php" method="post">
		
		

		<font>Введите id сообщества, или персональной страницы:</font>
		<p><input name='owner_id' value='<?php //echo $uid; ?>' size="10"></p>
		<p><font class='font2'>( если это сообщество, перед id поставиь символ "-" )</font></p>
		
		<p><font>Кол-во записей которыве нужно вывести(макс.=100):<br><br><input type="input" value="20" size="1" name="count"></p>
		
		<p><font>Смещение, для выборки определенного подмножества записей:<br><br><input type="input" value="0" size="1" name="offset"></p>
		
		<p><input type="submit" value="Отправить" class="button"></p>
		</form>

		</div>





</div>

</body>

</html>

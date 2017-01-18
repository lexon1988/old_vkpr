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
<b><font class='font1'>Парсер друзей персональной страницы</font></b><hr>
<br>
	
		<div style='margin-left:250px;'>
	
	<form method="get" action="rez.php">

	<font>Введите id страницы:</font>
	<input type='text' name='uid' value=''>
	<br>	<br>

	<table>
	<tr>
		<td><font>Пол</font></td>
		<td><font>Страна(id)</font></td>
		<td><font>Город(id)</font></td>
		<td><font>Годы рождения от/до</font></td>
	</tr>
	<tr>
		<td>
		
	<select name="sex" size="1">
	<option selected="selected" value="000">-</option>
	<option value="1">Женский</option>
	<option value="2">Мужской</option>
	</select>




		
		</td>
		
		<td><input type='text' name='country' size='5'></td>
		<td><input type='text' name='city' size='5'></td>
		<td><input type='text' name='age1' size='2'> - <input type='text' name='age2' size='2'></td>
	</tr>
	</table>
<br>

		<font>Смещение для выборки подмножества пользователей: </font><br><br>
		<input name='offset' type="text" size=2  value="0"><br>

<br>
<img src='http://<?php echo $home;?>/img/icon-warning-sign.png' width= 13px; height= 13px;>  
<font size='2' color='red'> Узнать id страны или города вы можете по <a href='help.html'>этой</a> ссылке!
<br><br><img src='http://<?php echo $home;?>/img/icon-warning-sign.png' width= 13px; height= 13px;>  
Более 40% пользователей скрывают дату рождения, поэтому фильтр по возрасту иногда даёт довольно мало результатов.
 <br><br><img src='http://<?php echo $home;?>/img/icon-warning-sign.png' width= 13px; height= 13px;>  
Если нужно получить возраст, 2 поля "Годы рождения от/до" должны быть заполнены, или если возраст вам не нужен, оставьте данные поля пустыми. 
</font>



<br><br>

<input type="submit" value="Отправить" class='button'>

</form>


		</div>

	</div>


</body>

</html>


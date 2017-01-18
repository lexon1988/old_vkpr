<html>

<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

	<body>
	
	<div class='main' >
	<br>
<b><font>Парсер сообществ</font></b><hr>
<br>
	
		<div style='margin-left:250px;'>
	
	<form method="get" action="rez.php">

	<font>Текст поискового запроса:</font>
	<input type='text' name='text' value=''>
	<br>	<br>

	
	<table>
	<tr>
		<td>	<font>Cтрана(id):</font>
	<input type='text' name='country_id' value='' size=1></td>
		
		
		<td>	<font>Город(id):</font>
	<input type='text' name='city_id' value='' size=1></td>

	</tr>
	</table>
	
	<br>
	<img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-warning-sign.png' width= 13px; height= 13px;>  
	<font size='2' color='red'> Узнать id страны или города вы можете по <a href='help.html'>этой</a> ссылке!





	
	<br>	<br>
	
	<font>SORT:</font>
	<input type='text' name='sort' value='0' size=1>
	<br>	<br>
	
	<font>
    0 — сортировать по количеству пользователей (по умолчанию);<br>
    1 — сортировать по скорости роста;<br>
    2 — сортировать по отношению дневной посещаемости к количеству пользователей;<br>
    3 — сортировать по отношению количества лайков к количеству пользователей;<br>
    4 — сортировать по отношению количества комментариев к количеству пользователей;<br>
    5 — сортировать по отношению количества записей в обсуждениях к количеству пользователей.<br>
	</font>

<br>

		<font>Максимальное кол-во резултатов: </font><br><br>
		<input name='count' type="text" size=1  value="100"><br>

		<br>
	<img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-warning-sign.png' width= 13px; height= 13px;>  
	<font size='2' color='red'> Максимальное значение 1000!</font>



<br><br>

<input type="submit" value="Отправить" class='button'>

</form>


		</div>

	</div>


</body>

</html>


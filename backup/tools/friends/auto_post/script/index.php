<html>

<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
</head>

	<body>
	
	<div class='main'>

<br>
	<b><font>Автопостинг в группы "Добавь| Лайк"</b><hr>
	<div style='margin-left:250px;'>
	
	<br>
	
	

<br>
<form method="post" action="index2.php">



В базе <?php echo $max=sizeof(file ('../../../../list.txt')); ?> групп, начать постинг с  
<input type="text" name="min" value="10" size="2">- <input type="text" name="max" value="<?php echo $max; ?>" size="3"><br><br>
Постить с интервалом: <input type="text" name="time" value="15" size="2"> - <input type="text" name="time1" value="60" size="3"> сек.<br><br>

Автоматически одобрять друзей: Да <label><input type="radio" name="radio"" value="true" > </label> || Нет <label><input type="radio" name="radio" value="false" checked> </label><br>

<br>
<font size=2 color='red'><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-warning-sign.png' width= 13px; height= 13px;>  Первые 5-15 группы, могут потребовать капчу, всё зависит от активности и времени суток, лучше начинать постинг с 10-15 группы.</font>
<br><br>

<input type="submit" name="go" value="Отправить" class="button">

</form>


	</div>
</div>

</body>

</html>

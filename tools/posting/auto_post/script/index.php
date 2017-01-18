<?php
$home= $_SERVER['SERVER_NAME'];
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
</head>

	<body>
	
	<div class='main'>

<br>
	<b><font class='font1'>Автопостинг в группы "Добавь| Лайк"</font></b><hr>
	<div style='margin-left:250px;'>
	
	<br>
	
	

<br>
<form method="post" action="index2.php">

<font>

В базе <?php echo $max=sizeof(file ('../../../../list.txt')); ?> групп, начать постинг с  
<input type="text" name="min" value="10" size="2">- <input type="text" name="max" value="<?php echo $max; ?>" size="3"><br><br>
Постить с интервалом: <input type="text" name="time" value="15" size="2"> - <input type="text" name="time1" value="60" size="3"> сек.<br><br>

Автоматически одобрять друзей: Да <label><input type="radio" name="radio"" value="true" > </label> || Нет <label><input type="radio" name="radio" value="false" checked> </label><br>

<br>
<font size=2 color='red'><img src='http://<?php echo $home;?>/img/icon-warning-sign.png' width= 13px; height= 13px;>  Первые 15-30 группы, могут потребовать капчу, всё зависит от активности и времени суток, лучше начинать постинг с 20-25 группы.</font>
<br><br>

<input type="submit" name="go" value="Отправить" class="button">

</font>
</form>


	</div>
</div>

</body>

</html>

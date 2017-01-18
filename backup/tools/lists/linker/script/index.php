<html>

<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />




</head>

	<body>
	
	<div class='main'>
	

	<br>
	<b><font>Линкер</font></b>
	<hr>
	<div style='margin-left:250px;'>
	
	<br>
		<font>Введите свой список:</font>
		<form action="rez.php" method="post">
		

		
		<p><textarea name='text' cols='15' rows='15'></textarea> 
		</P>
		
	   <p><font>Какие ссылки сделать?</p>


    <p><input name="dzen" type="radio" value="1" checked> vk.com/id</p>
	 <p><input name="dzen" type="radio" value="2"> vk.com/club</p>
	 </font>
	
	<img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-warning-sign.png' width= 13px; height= 13px;>  
<font size='2' color='red'>Данный интсрумент делает из текстового списка - список ссылок, очень полезная функция если нужно что- то проверить в ручную.</font>
	
			
		<p><input type="submit" value="Отправить" class="button" ></p>
			
		</form>
	
	
	</div>






</div>

</body>

</html>

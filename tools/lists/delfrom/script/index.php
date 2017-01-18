<?php
$home= $_SERVER['SERVER_NAME'];
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />




</head>

	<body>
	
	<div class='main'>
	

	<br>
	<b><font class='font1'>Удалить из одного списка другой</font></b>
	<hr>
	<div style='margin-left:250px;'>
	
	<br>

		<form action="rez.php" method="post">
		

		
<table>
<tr>
	<td>
	
	<font><p>Откуда удалить:</p></font>
	<p><textarea name='text' cols='15' rows='20'></textarea></p>

	
	</td>
	
	
	<td>
	
	<font><p>Что удалить:</p></font>
	<p><textarea name='text2' cols='15' rows='20'></textarea></p>

	
	</td>
</tr>
</table>


	
			
		<p><input type="submit" value="Отправить" class="button" ></p>
			
		</form>
	
	
	</div>






</div>

</body>

</html>

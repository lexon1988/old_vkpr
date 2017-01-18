<?php $home= $_SERVER['SERVER_NAME'];
$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

	<body>
	
	<div class='main'>
	
	<br>
	<b><font class='font1'>Создать альбом</font></b>
<hr>




<br>
	
	<div style='margin-left:235px;'>

		
		<form action="rez.php" method="post">
		
		

		<font>Введите название нового альбома:</font>
		<p><input name='name' value='' size="25"></p>


		<p><input type="submit" value="Отправить" class="button"></p>
		</form>

	
		
		<?php
		
		$api=file_get_contents('https://api.vk.com/method/photos.getAlbums?owner_id='.$uid);
		
		$json_data=$api;
		$json= json_decode($json_data,true);
		$max=$substr_count= substr_count($json_data, 'aid');
		
		

		
		?>
		<br>
		<font class='font1'>Ваши альбомы: </font>
		<br>
		<hr>
		<table width='300px'>
		<tr>
			<td><font><b>Название альбома:</b></font></td>
			<td><font><b>id- альбома:</b></font></td>
		</tr>
		<tr>
			<td>
			<?php
			for($i=0;$i<$max;$i++)
			{
			echo $json['response'][$i]['title']."<br>";
			}
			?>
			</td>
			
			<td>
			<?php
			for($i=0;$i<$max;$i++)
			{
			echo "<a href='get.php?album=".$json['response'][$i]['aid']."'>".$json['response'][$i]['aid']."</a><br>";
			}
			?>
			</td>
		</tr>
		</table>
		<br>
		<img src='http://<?php echo $home;?>/img/icon-warning-sign.png' width= 13px; height= 13px;><font>  Чтобы получить список id фотографий, кликните по ссылке id альбома.</font> 
		
		
		
		</div>




</div>

</body>

</html>

<?php $home= $_SERVER['SERVER_NAME'];
$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];
$album=$_GET['album'];
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

	<body>
	
	<div class='main'>
	
	<br>
	<b><font class='font1'>Ваши фотографии</font></b>
<hr>




<br>
	
	<div style='margin-left:0px;'>

		

		
		

		
		<?php
		
		$api=file_get_contents('https://api.vk.com/method/photos.get?owner_id='.$uid.'&album_id='.$album);
		
		$json_data=$api;
		$json= json_decode($json_data,true);
		$max=$substr_count= substr_count($json_data, 'src_small');
		
		

		
		?>

		
		
		<table>
			<tr>
				<td>
					
		
		
		
		<table width='300px'>
		<tr>
			<td><font><b>Превью:</b></font></td>
			<td><font><b>id- фотографии:</b></font></td>
			
		</tr>
		
			
			<?php
			for($i=0;$i<$max;$i++)
			{
			echo "<tr><td><img src='".$json['response'][$i]['src_small']."'></td>";
			echo "<td><a href='".$json['response'][$i]['src_big']."' >".$json['response'][$i]['pid']."</a></td></tr>";
			}
			?>

		</table>
		
			</td>
				<td valign=top>
		
			
				<font><b>Правильный формат: </b></font>
				<br><br>
				<textarea rows='20' cols='30'><?php for($i=0;$i<$max;$i++) {echo "photo".$uid."_".$json['response'][$i]['pid']."
";}?></textarea>
			
			
				</td>
			</tr>
			</table>
		
		
		</div>




</div>

</body>

</html>

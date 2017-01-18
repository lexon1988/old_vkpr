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
	<?php
	$uid=$_COOKIE["uid"];
	$access_token=$_COOKIE["access_token"];

	
	
	$text= $_POST['text'];
	$lines = preg_split('/\r?\n/', $text);
	$max=count($lines);
	
	$text2= $_POST['text2'];
	$lines2 = preg_split('/\r?\n/', $text2);
	$max2=count($lines2);
	
		//очищаем файлы
		$fp = fopen("files/".$uid."_list.txt", "w"); // Открываем файл в режиме записи 
		$mytext = ""; // Исходная строка
		$test = fwrite($fp, $mytext); // Запись в файл
		if ($test) echo '';
		else echo '';
		fclose($fp); //Закрытие файла

		$fp = fopen("files/".$uid."_rez.txt", "w"); // Открываем файл в режиме записи 
		$mytext = ""; // Исходная строка
		$test = fwrite($fp, $mytext); // Запись в файл
		if ($test) echo '';
		else echo '';
		fclose($fp); //Закрытие файла
	
		//------------------------------------------------------------
		//unset($file[$i])
		
		
		

		
			for($i=0;$i<$max2;$i++)
				{
				
					for($j=0;$j<$max;$j++)
					{
						
						if($lines[$j]==$lines2[$i])
						unset($lines[$j]);
						
						//if($lines[$j]<>"") echo $lines[$j].'<br>';
						
						
						
					}
				
				}
			
		
								
						
						
						
						
	$count=-1;					
						
	
		?>
<p><font>Результат:</font></p>
<textarea cols='15' rows='25'><?php for($i=0;$i<=$max;$i++){ if($lines[$i]<>"") echo $lines[$i]."
";if($lines[$i]=="") $count=$count+1;} ?></textarea>

<br><br>
<font>
<?php echo 'Удалено- '.$count.' строк(и)!'; ?>
</font>
<br><br>
			</div>

	</div>

</body>
</html>

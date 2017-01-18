<html>

<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />




</head>

	<body>
	
	<div class='main'>
	

	<br>
	<b><font>Очистить список от повторений</font></b>
	<hr>
	<div style='margin-left:250px;'>
	<?php
	$uid=$_COOKIE["uid"];
	$access_token=$_COOKIE["access_token"];

	
	
	$text= $_POST['text'];

	$lines = preg_split('/\r?\n/', $text);
	$max=count($lines);

		$fp = fopen("files/".$uid."_list.txt", "w"); // Открываем файл в режиме записи 
		$mytext = ""; // Исходная строка
		$test = fwrite($fp, $mytext); // Запись в файл
		if ($test) echo '';
		else echo '';
		fclose($fp); //Закрытие файла

	

			for($i=0;$i<$max;$i++)
				{
				
				$fp = fopen("files/".$uid."_list.txt", "a"); // Открываем файл в режиме записи
				$mytext = $lines[$i]."\r\n"; // Исходная строка
				$test = fwrite($fp, $mytext); // Запись в файл
				if ($test) echo '';
				else echo '';
				fclose($fp); //Закрытие файла
				}

		
						$id_base = file("files/".$uid."_list.txt"); //база мыл
						$all = count($id_base); //Подсчитали сколько всего мыл, включая дубли
						//echo "All:".$all."<br>"; //Вывели общее количество мыл
						$uniqie = array_unique($id_base); // Создали массив с уникальными мылами
						//echo "Unical:".count($uniqie); //Уникальные мыла
						$fp = fopen("files/".$uid."_rez.txt", "w") or die ("No open file:id_base_unique.txt");
						foreach($uniqie as $key => $stroka)
						{$un = $stroka;fwrite($fp,$un);}
						fclose($fp);
	
		?>
								<p><font>Результат:</font></p>
								<textarea cols='15' rows='20'><?php echo file_get_contents("files/".$uid."_rez.txt"); ?></textarea>
		
			</div>

</div>

</body>

</html>

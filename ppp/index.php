<?php
set_time_limit(0);


for($i=1; $i<10000;$i++) {

$count_file=file('count.txt');
$count=(int)($count_file[0]);

$api='https://api.vk.com/method/friends.get?user_id='.(int)($count);
$fget=file_get_contents($api);



		$fcount=substr_count($fget,','); // 2
		$count_plus=$count+1;

		$fp = fopen("count.txt", "w"); // Открываем файл в режиме записи
		$mytext = $count_plus; // Исходная строка
		$test = fwrite($fp, $mytext); // Запись в файл
		if ($test) echo '';
		else echo '';
		fclose($fp); //Закрытие файла

						if($fcount>1000) 
								{
									$fp = fopen("rez.txt", "a"); // Открываем файл в режиме записи
									$mytext = $count."\r\n"; // Исходная строка
									$test = fwrite($fp, $mytext); // Запись в файл
									if ($test) echo '';
									else echo '';
									fclose($fp); //Закрытие файла
								}

						}


?>
<?php

$num=file('num.txt'); 
$club_file=file("../list.txt");



echo $uid=(int)($club_file[(int)($num[0])]);
 


$club=file_get_contents("https://api.vk.com/method/wall.get.xml?owner_id=-".$uid."&offset=0&count=1");


//искомый текст
$my_str='is_pinned';
 
 //преверяем запись на то чтобы не была прилепленной к верху
$pos = strpos($club, $my_str);
if ($pos === false) {
	$api=$club;
}else{
	$api=file_get_contents("https://api.vk.com/method/wall.get.xml?owner_id=-".$uid."&offset=1&count=1");
}



// \<id\>(.*)\<\/id\>
// \<from\_id\>(.*)\<\/from\_id\>
// \<to\_id\>(.*)\<\/to\_id\>
// \<comments\>(.*)\<\/comments\>


 preg_match("/\<id\>(.*)\<\/id\>/U", $api, $id);
 preg_match("/\<from\_id\>(.*)\<\/from\_id\>/U", $api, $from_id);
 preg_match("/\<to\_id\>(.*)\<\/to\_id\>/U", $api, $to_id);
 preg_match("/\<comments\>(.*)\<\/comments\>/Uis", $api, $comments);
 preg_match("/\<count\>(.*)\<\/count\>/Uis", $comments[1], $comments2);
 

	$id_clean = str_replace("-", "", $id[1]);
	$from_id_clean = str_replace("-", "", $from_id[1]);
	$to_id_clean = str_replace("-", "", $to_id[1]);




		if((int)($comments2[1])>20)

		{

				$fp = fopen("temp.txt", "w"); // Открываем файл в режиме записи
				$mytext = $id_clean."\n".$from_id_clean."\n".$to_id_clean; // Исходная строка
				$test = fwrite($fp, $mytext); // Запись в файл
				if ($test) echo '';
				else echo '';
				fclose($fp); //Закрытие файла
					}

							else

							{

							$fp = fopen("temp.txt", "w"); // Открываем файл в режиме записи
							$mytext = "Стена открыта"; // Исходная строка
							$test = fwrite($fp, $mytext); // Запись в файл
							fclose($fp); //Закрытие файла
								}



//header("Location: index.php"); 
//exit;


?>

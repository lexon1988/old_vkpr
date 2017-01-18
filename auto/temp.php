<?php

$num=file('num.txt'); 
$club_file=file("../list.txt");
$uid=(int)($club_file[$num[0]]);
  



$club=file_get_contents("https://api.vk.com/method/wall.get?owner_id=-".$uid."&offset=0&count=1");

//искомый текст
$my_str='is_pinned';
 
$pos = strpos($club, $my_str);
if ($pos === false) {
	$api=$club;
}else{
	$api=file_get_contents("https://api.vk.com/method/wall.get?owner_id=-".$uid."&offset=1&count=1");
}


preg_match("/\"comments\"\:\{\"count\"\:(.*)\}/U", $api, $comments);
preg_match("/\{\"id\"\:(.*)\,/U", $api, $id);
preg_match("/\"from\_id\"\:\-(.*)\,/U", $api, $from_id);
preg_match("/\"to\_id\"\:\-(.*)\,/U", $api, $to_id);

if($id[1]=="") 
{ $api=file_get_contents("https://api.vk.com/method/wall.get?owner_id=-".$uid."&offset=1&count=1");

preg_match("/\"comments\"\:\{\"count\"\:(.*)\}/U", $api, $comments);
preg_match("/\{\"id\"\:(.*)\,/U", $api, $id);
preg_match("/\"from\_id\"\:\-(.*)\,/U", $api, $from_id);
preg_match("/\"to\_id\"\:\-(.*)\,/U", $api, $to_id);

}



/*
echo "<br><br>";
$comments[1];
echo "<br><br>";
echo $id[1];
echo "<br><br>";
echo $from_id[1];
echo "<br><br>";
echo $to_id[1];
*/

if($comments[1]>20)

{



$fp = fopen("temp.txt", "w"); // Открываем файл в режиме записи
$mytext = $id[1]."\n".$from_id[1]."\n".$to_id[1]; // Исходная строка
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
if ($test) echo '';
else echo '';
fclose($fp); //Закрытие файла
	}



//header("Location: index.php"); 
//exit;
?>

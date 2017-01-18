<?php
header( "Refresh: 1; url=index.php" );
$num=file_get_contents("num.txt");
$num= $num+1;

$min= file_get_contents('min.txt');
$max=file_get_contents('max.txt');

$access_token=file_get_contents('access/access_token.txt');

$friendautoadd=file_get_contents('access/autoadd.txt');


if($num>$max) $num=$min;

$fp = fopen("num.txt", "w"); // Открываем файл в режиме записи 
$mytext = $num; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo 'Wait...';
else echo 'error';
fclose($fp); //Закрытие файла




if($friendautoadd=="true") {
echo $getRequests=file_get_contents("https://api.vk.com/method/friends.getRequests.xml?extended=1&count=1&access_token=".$access_token);
preg_match('/\<uid\>(.*)\<\/uid\>/',$getRequests,$rez);


if($rez[1]<>"") {
$friendsadd=file_get_contents("https://api.vk.com/method/friends.add?user_id=".$rez[1]."&access_token=".$access_token);
			}

}




include('temp.php');




?>


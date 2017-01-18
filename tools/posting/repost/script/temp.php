<?php
$home= $_SERVER['SERVER_NAME'];
if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://".$home."/tools/lock/auth/script" );
}

$uid=$_COOKIE["uid"];
$time1=$_POST['time1'];
$time2=$_POST['time2'];
setcookie("repost_rand1", $time1, time()+ 8600);
setcookie("repost_rand2", $time2, time()+ 8600);

$text= $_POST['text'];
$lines = preg_split('/\r?\n/', $text);



$max=count($lines);

if($max<49) $max=$max;
else
$max=49;

$true_max= $max-1;
setcookie("repost_counter", $true_max, time()+ 260000);


// очищаем фал если есть
$fp = fopen("files/".$uid."_fl.txt", "w"); // Открываем файл в режиме записи 
$mytext = ""; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo '';
else echo '';
fclose($fp); //Закрытие файла



for($i=0;$i<$max;$i++)



{

if($lines[$i]<>"")

{
// записываем в файл
$fp = fopen("files/".$uid."_fl.txt", "a"); // Открываем файл в режиме записи 
$mytext = $lines[$i]."\r\n"; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo '';
else echo '';
fclose($fp); //Закрытие файла
}




}

header( "Refresh: 1; url=rez.php" );
include('../../../../header/loading.php');
?>



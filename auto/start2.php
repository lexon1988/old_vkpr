<?php
header( "Refresh: 0; url=index.php" );
$min=$_POST['min'];
$max=$_POST['max'];
$time=$_POST['time'];
$access_token=file_get_contents('access/access_token.txt');

if($_POST['radio']) $autoadd='true';

else

$autoadd='false';

$fp = fopen("num.txt", "w"); // Открываем файл в режиме записи 
$mytext = $min; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo 'Wait....';
else echo 'error';
fclose($fp); //Закрытие файла



$fp = fopen("min.txt", "w"); // Открываем файл в режиме записи 
$mytext = $min; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo 'Wait....';
else echo 'error';
fclose($fp); //Закрытие файла

$fp = fopen("max.txt", "w"); // Открываем файл в режиме записи 
$mytext = $max; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo 'Wait....';
else echo 'error';
fclose($fp); //Закрытие файла

$fp = fopen("time.txt", "w"); // Открываем файл в режиме записи 
$mytext = $time; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo 'Wait....';
else echo 'error';
fclose($fp); //Закрытие файла




$fp = fopen("access/autoadd.txt", "w"); // Открываем файл в режиме записи 
$mytext = $autoadd; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo 'Wait...';
else echo 'error';
fclose($fp); //Закрытие файла



?>


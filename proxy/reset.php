<?php


$hidemyass= file_get_contents('http://proxylist.hidemyass.com/search-1311077#listable');

$fp = fopen("hidemyass.txt", "w"); // Открываем файл в режиме записи
$mytext = $hidemyass; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo 'OK';
else echo 'NO(((';
fclose($fp); //Закрытие файла



?>






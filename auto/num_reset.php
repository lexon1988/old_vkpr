<?php
header( "Refresh: 3; url=num_plus.php" );

$num= file_get_contents('min.txt');

$fp = fopen("num.txt", "w"); // Открываем файл в режиме записи 
$mytext = $num; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo 'Сбросили до начальной точки';
else echo 'Ошибка...';
fclose($fp); //Закрытие файла

?>


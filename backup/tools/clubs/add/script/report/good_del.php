<?php
$uid=$_COOKIE["uid"];
$gid=$_COOKIE["gid"];


// очищаем фал если есть
$fp = fopen("../files/".$uid."_good.txt", "w"); // Открываем файл в режиме записи 
$mytext = ""; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo 'Ошибка! Попробуйте ещё раз!';
else echo 'Список очищен!!';
fclose($fp); //Закрытие файла


?>



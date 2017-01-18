<?php
$date = date("d.m.y");
//echo "Сегодня: ".$date."<br>";

$yesterday = date("d.m.y",mktime(0, 0, 0, date("m")  , date("d")-1, date("y")));
//echo "Вчера: ".$yesterday."<br>";

$yesterday2 = date("d.m.y",mktime(0, 0, 0, date("m")  , date("d")-2, date("y")));
//echo "Позовчера: ".$yesterday2;
include("config.php");



mysql_select_db('vk');
mysql_query("

DELETE FROM tabla
        WHERE data <> '$date' AND data <> '$yesterday' AND data <> '$yesterday2'
        
");


?>




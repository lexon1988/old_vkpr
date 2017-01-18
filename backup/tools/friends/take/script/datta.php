<?php

$date = date("d-m-Y");
echo "Сегодня: ".$date."<br>";

$yesterday = date("d-m-Y",mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
echo "Вчера: ".$yesterday."<br>";

$yesterday2 = date("d-m-Y",mktime(0, 0, 0, date("m")  , date("d")-2, date("Y")));
echo "Позовчера: ".$yesterday2;


?>

<?php
$hidemyass= file_get_contents('http://proxylist.hidemyass.com/search-1311077#listable');

$fp = fopen("hidemyass.txt", "w"); // Открываем файл в режиме записи
$mytext = $hidemyass; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo '';
else echo 'NO(((';
fclose($fp); //Закрытие файла




$hidemyass2= file_get_contents('hidemyass.txt');
preg_match_all('/\<section class=\"proxy-results section-component\"\>(.*)\<\/section\>/s',$hidemyass2,$rez);

?>

<style>

td
{
border: 1px solid #F1F2F6;
font-family:'Verdana', Geneva, serif;
color: #3E6990;
font-size:12px;


}





</style>

<?
$pattern=array("/\<img src\=\"(.*)\/\>/","/HTTPS/","/High/","/Speed/","/Connection/","/Time/"
,"/Type/","/\<td nowrap\>(.*)\<\/td\>/","/Anon/"
,"/<img src=\"\/images\/hide\-my\-ass\-logo\-europa\-footer\.png\">/","/Privacy Terms & Conditions/"
,"/\<p\>(.*)\<\/p\>/","/\<p class\=\"copyright\"\>(.*)\<\/p\>/","/\<th\>\<\/th\>/","/\<th\> \<\/th\>/","/\<td\>\<\/td\>/"
,"/ \<div (.*)\>\<\/div\>/","/\<td\> \<div class\=\"progress-indicator\"(.*)\>/","/\<td\> /","/         \<\/td\>/",'/		\<\/div\>/'
,"/                 \<div class\=\"(.*)\>/","/\<section class=\"hma\-pagination\"\>(.*)\<div class\=\"gob-stopper-text small\-12 columns\"\>/s");





$zamena=array("","","","","","","","","","","","","","","","","");

$str = $rez[0][0];
$arr_str = preg_replace($pattern, $zamena,$str);
echo trim($arr_str)."<br>";




?>


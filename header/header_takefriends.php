<?


function yandex_link_bar($page, $count, $pages_count, $show_link)

{

//не удалять повторения

$sex= $_GET['sex'];
$country= $_GET['country'];
$city= $_GET['city'];

$country_id= $_GET['country_id'];
$city_id= $_GET['city_id'];


$friends1= $_GET['friends1'];
$friends2= $_GET['friends2'];
$followers1= $_GET['followers1'];
$followers2= $_GET['followers2'];

$check= $_GET['check'];

// $show_link - это количество отображаемых ссылок;

// нагляднее будет, когда это число будет парное

// Если страница всего одна, то вообще ничего не выводим

if ($pages_count == 1) return false;

$sperator = '|'; // Разделитель ссылок; например, вставить "|" между ссылками

// Для придания ссылкам стиля

$style = 'style="color: #3E6990; text-decoration: none;"';

$begin = $page - intval($show_link / 2);

unset($show_dots); // На всякий случай :)

// Сам постраничный вывод

// Если количество отображ. ссылок больше кол. страниц

if ($pages_count <= $show_link + 1) $show_dots = 'no';

// Вывод ссылки на первую страницу

if (($begin > 2) && ($pages_count - $show_link > 2)) {

echo '<a '.$style.' href='.$_SERVER['php_self'].'?page=1> |< </a> ';

}

for ($j = 0; $j <= $show_link; $j++) // Основный цикл вывода ссылок

{

$i = $begin + $j; // Номер ссылки

// Если страница рядом с началом, то увеличить цикл для того,

// чтобы количество ссылок было постоянным

if ($i < 1) continue;

// Подобное находится в верхнем цикле

if (!isset($show_dots) && $begin > 1) {

echo ' <a '.$style.' href='.$_SERVER['php_self'].'?page='.($i-1).'&sex='.$sex.'&country='.$country.'&city='.$city.'&country_id='.$country_id.'&city_id='.$city_id.'&friends1='.$friends1.'&friends2='.$friends2.'&followers1='.$followers1.'&followers2='.$followers2.'&check='.$check.'><b>...</b></a> ';

$show_dots = "no";

}

// Номер ссылки перевалил за возможное количество страниц

if ($i > $pages_count) break;

if ($i == $page) {

echo ' <a '.$style.' ><b>'.$i.'</b></a> ';

} else {

echo ' <a '.$style.' href='.$_SERVER['php_self'].'?page='.$i.'&sex='.$sex.'&country='.$country.'&city='.$city.'&country_id='.$country_id.'&city_id='.$city_id.'&friends1='.$friends1.'&friends2='.$friends2.'&followers1='.$followers1.'&followers2='.$followers2.'&check='.$check.'>'.$i.'</a> ';

}

// Если номер ссылки не равен кол. страниц и это не последняя ссылка

if (($i != $pages_count) && ($j != $show_link)) echo $sperator;

// Вывод "..." в конце

if (($j == $show_link) && ($i < $pages_count)) {

echo ' <a '.$style.' href='.$_SERVER['php_self'].'?page='.($i+1).'><b>...</b></a> ';

}

}

// Вывод ссылки на последнюю страницу

if ($begin + $show_link + 1 < $pages_count) {

echo ' <a '.$style.' href='.$_SERVER['php_self'].'?page='.$pages_count.'> >| </a>';

}

return true;

} // Конец функции

include("config.php");




// Подготовка к постраничному выводу

$perpage = 25; // Количество отображаемых данных из БД

if (empty($_GET['page']) || ($_GET['page'] <= 0)) {

$page = 1;

} else {

$page = (int) $_GET['page']; // Считывание текущей страницы

}

// Общее количество информации




$sex= $_GET['sex'];
$country= $_GET['country'];
$city= $_GET['city'];

$country_id= $_GET['country_id'];
$city_id= $_GET['city_id'];

$friends1= $_GET['friends1'];
$friends2= $_GET['friends2'];
$followers1= $_GET['followers1'];
$followers2= $_GET['followers2'];

$check= $_GET['check'];



if (!empty($sex)) $sql_sex = " AND `sex` = '$sex' ";
if (!empty($country)) $sql_country = "AND  `country` = '$country' ";
if (!empty($city)) $sql_city = "AND `city`= '$city' ";

if (!empty($country_id)) $sql_country_id = "AND  `country_id` = '$country_id' ";
if (!empty($city_id)) $sql_city_id = "AND `city_id`= '$city_id' ";


if (!empty($friends1)) $sql_friends1 = "AND `friends`> $friends1 ";
if (!empty($friends2)) $sql_friends2 = "AND `friends`< $friends2 ";

if (!empty($followers1)) $sql_followers1 = "AND `followers`> $followers1 ";
if (!empty($followers2)) $sql_followers2 = "AND `followers`< $followers2 ";

if (!empty($check)) $sql_check = "AND `followers` < `friends` ";



$date = date("d.m.y");
//echo "Сегодня: ".$date."<br>";

$yesterday = date("d.m.y",mktime(0, 0, 0, date("m")  , date("d")-1, date("y")));
//echo "Вчера: ".$yesterday."<br>";

$yesterday2 = date("d.m.y",mktime(0, 0, 0, date("m")  , date("d")-2, date("y")));
//echo "Позовчера: ".$yesterday2;




$count = mysql_numrows(mysql_query("select * from tabla WHERE uid>0  $sql_check  $sql_sex $sql_country $sql_city $sql_country_id $sql_city_id $sql_friends1 $sql_friends2 $sql_followers1 $sql_followers2 AND (data='$date' OR data='$yesterday' OR data='$yesterday2')")) or die('error! None!');

$pages_count = ceil($count / $perpage); // Количество страниц

// Если номер страницы оказался больше количества страниц

if ($page > $pages_count) $page = $pages_count;

$start_pos = ($page - 1) * $perpage; // Начальная позиция, для запроса к БД



?>
<html>

<head>

<?php include('title.php'); ?>



<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style3.css"> 

</head>

<body>




<div class="main1">
<br>






<table width='100%'>
<tr>
	<td ><form name="add" method="post" action="reg.php" >
<input class='button' valign='center' name='go' type='submit' value='Добавиться'> 
</form>
</td>
	<td><form name="del" method="post" action="del.php" >
<input class='button2' valign='center' name='go' type='submit' value='Удалиться'>
</form></td>
</tr>
</table>

<div id="h0"  onClick="document.getElementById('h0').style.display='none';document.getElementById('h1').style.display='';return false;" >	
<input class='button4' valign='center' name='go' type='submit' value='Поиск'>
</div> 



<div id="h1" style="display:none" bgcolor='white' > 

<a  href="" onClick="document.getElementById('h1').style.display='none';document.getElementById('h0').style.display='';return false;"><input class='button4' valign='center' name='go' type='submit' value='Поиск'></a>




<form name="poisk" method="get" action="poisk.php" >

<div class='white'>
<div class='white2'>

<br>

<table width='100%'>
<tr>
	<td><table color='white' >
<tr>
	<td  colspan='2' ></td>
	<td></td>
</tr>
<tr>
	<td><font color="white">Пол:</font></td>
	<td>
	
	<select name="sex" >
<option ></option>
<option >Мужской</option>
<option>Женский</option>
</select>
	
	</td>
</tr>

<tr>
	<td><font color="white">Страна:   </font></td>
	<td><input type="text" size="7" name="country"></td>
</tr>
<tr>
	<td><font color="white">Город:     </font></td>
	<td><input type="text" size="7" name="city"></td>
</tr>
<tr>

</table></td>
	
	
	
<td>
<table>
<tr>
	<td><br></td>
</tr>
<tr>
	<td><font color="white">Страна(id):</font><input type="text" size="1" value="" name="country_id"></td>
</tr>
<tr>
	<td><font color="white">Город (id):  </font><input type="text" size="1" value="" name="city_id"></td>
</tr>
</table>
</td>
	
	
	
	
	
	
	
	<td><table>

<tr>
	<td></td>
	<td><font color="white">От:</font></td>
	<td><font color="white">До:</font></td>
</tr>


<tr>
	<td><font color="white">Друзья:</font></td>
	<td><input type="text" size="1" value="0" name="friends1"></td>
	<td><input type="text" size="1" value="9999" name="friends2"></td>
</tr>
<tr>
	<td><font color="white">Подписчики:</font></td>
	<td><input type="text" size="1" value="0" name="followers1"></td>
	<td><input type="text" size="1" value="9999" name="followers2"></td>
</tr>
</table></td>
</tr>
</table>


<font>Не показывать пользователей у которых подписчиков больще чем друзей <input name="check" type="checkbox" checked></font>



<br><br><br>



</div>
</div>

<input class='button3' valign='center' type='submit' value='Найти'>



</form>


</div>
<br>

<div style='margin-left:10px;'>

<?php
$page= $_GET['page'];

$sex= $_GET['sex'];
$country= $_GET['country'];
$city= $_GET['city'];

$country_id= $_GET['country_id'];
$city_id= $_GET['city_id'];


$friends1= $_GET['friends1'];
$friends2= $_GET['friends2'];
$followers1= $_GET['followers1'];
$followers2= $_GET['followers2'];

$check= $_GET['check'];

?>



<a href='index.php'><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-visitor.png' width= 20px; height= 20px; >  Обычный список</a> | <a href='uid_list.php<?php echo '?page='.$page.'&sex='.$sex.'&country='.$country.'&city='.$city.'&country_id='.$country_id.'&city_id='.$city_id.'&friends1='.$friends1.'&friends2='.$friends2.'&followers1='.$followers1.'&followers2='.$followers2.'&check='.$check; ?>'> <img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-rawaccesslogs.png' width= 14px; height= 14px;'> Список id пользователей</a>

</div>

</div>



<br>


<div class="main" >

<br>

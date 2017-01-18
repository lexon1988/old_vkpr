<?php
include('../../../../header/header_takefriends_poisk.php');
?>






<?php
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



echo "<div style='margin-left:20px;'>";
echo "<font>Полученный список можно автоматически добавить в друзья используя инструмент: \"<a href='http://vkpost/tools/friends/add/script/'>Добавить друзей из списка</a>\",
 или постваить \"<a href='http://vkpost/tools/likers/avatar/script/'>Лайк на аватар</a>\", или \"<a href='http://vkpost/tools/likers/post/'>Лайк на первую запись</a>\".";
echo "<br></div></font><br>";


echo "<div style='margin-left:220px;'>";

	
echo "<textarea rows='25'>";

 $result = mysql_query("select * from tabla WHERE uid>0 $sql_check $sql_sex $sql_country $sql_city $sql_friends1 $sql_friends2 $sql_followers1 $sql_followers2 AND (data='$date' OR data='$yesterday' OR data='$yesterday2') ORDER BY id DESC limit $start_pos, $perpage");

 
 if (!mysql_num_rows($result)) {
   print "<div class='poisk_error'><font color='red' size='4' ><hr>Страницы с такими параметрами в базе нет!</font>


<hr>


<font class='font3'>Таких пользователей в базе нет!</font>
 
</div>";
}
 
 

 
 
while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {

echo $row["uid"];
echo "
"; 
//echo $row["uid"].'<br>';
	}

    mysql_free_result($result);

	?>
</textarea>
	
	
	 </div> </p>

	
	</div>
<br>
<?php



// Вызов функции, для вывода ссылок на экран



echo "<div class='linker'><font size=2>";

yandex_link_bar($page, $count, $pages_count, 20)




?>

	<a href="#" class="scrollup"></a>

</font>
<br>

</div>
<br>	


	



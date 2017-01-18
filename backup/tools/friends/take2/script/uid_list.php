<?php
include('../../../../header/header_takefriends2.php');


$date = date("d.m.y");
//echo "Сегодня: ".$date."<br>";

$yesterday = date("d.m.y",mktime(0, 0, 0, date("m")  , date("d")-1, date("y")));
//echo "Вчера: ".$yesterday."<br>";

$yesterday2 = date("d.m.y",mktime(0, 0, 0, date("m")  , date("d")-2, date("y")));
//echo "Позовчера: ".$yesterday2;

echo "<div style='margin-left:20px;'>";
echo "<font>Полученный список можно автоматически добавить в друзья используя инструмент: \"<a href='http://".$_SERVER['SERVER_NAME']."/tools/friends/add/script/'>Добавить друзей из списка</a>\",
 или постваить \"<a href='http://".$_SERVER['SERVER_NAME']."/tools/likers/avatar/script/'>Лайк на аватар</a>\", или \"<a href='http://".$_SERVER['SERVER_NAME']."/tools/likers/post/'>Лайк на первую запись</a>\".";
echo "<br></div></font><br>";


echo "<div style='margin-left:220px;'>";

	
echo "<textarea rows='25'>";

$result = mysql_query("select * from tabla2 WHERE `uid`>0 AND `followers` < `friends` AND (data='$date' OR data='$yesterday' OR data='$yesterday2') ORDER BY id DESC limit $start_pos, $perpage ");

while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {


echo $row["uid"];
echo "
";


//echo $row["uid"].'<br>';
	}

    mysql_free_result($result);

	?>

</textarea>
	<br><br>
</div>
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










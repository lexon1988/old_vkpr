<?php

//----------------------------------------------------


$date = date("d.m.y");
//echo "�������: ".$date."<br>";
$yesterday = date("d.m.y",mktime(0, 0, 0, date("m")  , date("d")-1, date("y")));
//echo "�����: ".$yesterday."<br>";
$yesterday2 = date("d.m.y",mktime(0, 0, 0, date("m")  , date("d")-2, date("y")));
//echo "���������: ".$yesterday2;


$db = mysql_connect ("<?php echo $_SERVER['SERVER_NAME'];?>","bd","777smu15");
mysql_select_db("vkpr",$db);
$result = mysql_query("select * from tabla WHERE `uid`>0 AND (data='$date' OR data='$yesterday' OR data='$yesterday2') ORDER BY id DESC limit 100");



while($row=mysql_fetch_array($result))
{ // ������� ������

echo $row['uid'];


}// /while
//---------------------------------------------------------------------
?>















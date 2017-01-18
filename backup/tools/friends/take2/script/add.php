<?php
include("config.php");
$data= date("d.m.y");
$time= date("H:i");
$uid=$_POST['uid'];
$first_name=$_POST['first_name'];
$second_name=$_POST['second_name'];
$sex=$_POST['sex'];
$country=$_POST['country'];
$city=$_POST['city'];
$friends=$_POST['friends'];
$followers=$_POST['followers'];
$avatar= $_POST['avatar'];


mysql_select_db('vkpr');
mysql_query("INSERT INTO tabla2 (uid, data, time, first_name, second_name, sex, country, city, friends, followers, avatar  ) 
values ('$uid','$data', '$time', '$first_name', '$second_name', '$sex', '$country' , '$city', '$friends', '$followers', '$avatar')" );

header("location: index.php"); 


//printf("Идентификатор последней вставленной записи %d\n", mysql_insert_id());
?>

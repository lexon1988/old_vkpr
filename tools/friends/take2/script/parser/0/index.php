<?php
$num=file('num.txt'); 
$club_file=file("../../list.txt");
$gid=(int)($club_file[(int)($num[0])]);
echo $gid;


//здесь uid - это ID группы





$club=file_get_contents("https://api.vk.com/method/wall.get?owner_id=-".$gid."&offset=0&count=1");


$my_str='is_pinned';
 $pos = strpos($club, $my_str);
if ($pos === false) {
$api=$club;

}else{

$api=file_get_contents("https://api.vk.com/method/wall.get?owner_id=-".$gid."&offset=1&count=2");
}
preg_match("/\"comments\"\:\{\"count\"\:(.*)\}/U", $api, $comments);
preg_match("/\{\"id\"\:(.*)\,/U", $api, $id);
//preg_match("/\"from\_id\"\:\-(.*)\,/U", $api, $from_id);
//preg_match("/\"to\_id\"\:\-(.*)\,/U", $api, $to_id);



if($comments[1]>20) {
$api_id=file_get_contents("https://api.vk.com/method/wall.getComments.xml?owner_id=-".$gid."&post_id=".$id[1]."&sort=desc&count=1");
preg_match(" /\<uid\>(.*)\<\/uid\>/U", $api_id, $user_id);
$user = $user_id[1]; 

					}
				   else
					{

$api_id2=file_get_contents('https://api.vk.com/method/wall.get.xml?owner_id=-'.$gid.'&offset=1&count=1');
preg_match("/\<from\_id\>(.*)\<\/from\_id>/U",$api_id2,$user_id);

$user = $user_id[1];
					}
	

	
	
	

	

//Апи пользлвателя
$api= file_get_contents("http://api.vk.com/method/getProfiles?uids=".$user."&fields=city,sex,country,photo_medium");
preg_match("/\"sex\"\:(.*)\,\"city\"/", $api, $sex);

//-------------------ID-----------------
preg_match("/\"uid\"\:(.*)\,\"first_name/", $api, $uid);

//---------------------------------------


//Апи фоловеров и друзей
$api2= file_get_contents("http://api.vk.com/method/users.getFollowers?user_id=".$uid[1]."");
$api3= file_get_contents("http://api.vk.com/method/friends.get?user_id=".$uid[1]."");


//-------------------first_name----------
preg_match("/\"first_name\"\:\"(.*)\",\"last_name/", $api, $first_name);
//echo "<b><font size='2'>Имя:</b></font> ".$first_name[1];
//echo "<br>";
//---------------------------------------


//-------------------last_name----------
preg_match("/\"last_name\"\:\"(.*)\"\,\"sex\"/", $api, $last_name);
//echo "<b><font size='2'>Фамилия: </b></font>".$last_name[1];
//echo "<br>";
//---------------------------------------



//-------------------sex----------------
//preg_match("/\"sex\"\:(.*)\,\"city\"/", $api, $sex);
//echo "sex=".$sex[1];
if($sex[1]==1) $sex="Женский";
if($sex[1]==2) $sex="Мужской";

//echo "<b><font size='2'>Пол: </b></font>".$sex;
//echo "<br>";
//---------------------------------------


//-------------------country_id----------------
preg_match("/\"country\"\:(.*)\,\"photo_medium/", $api, $country_id);
//---------------------------------------

//-------------------city_id----------------
preg_match("/\"city\"\:(.*)\,\"country\"/", $api, $city_id);
//---------------------------------------

//Апи страна- город
$api4= file_get_contents("http://api.vk.com/method/places.getCountryById?country_ids=".$country_id[1]."");
$api5= file_get_contents("http://api.vk.com/method/places.getCityById?city_ids=".$city_id[1]."");


//-------------------country----------------
preg_match("/\"name\"\:\"(.*)\"\}\]\}/", $api4, $country);
//echo "<b><font size='2'>Страна: </b></font>".$country[1];
//echo "<br>";
//---------------------------------------

//-------------------city----------------
preg_match("/\"name\"\:\"(.*)\"\}\]\}/", $api5, $city);
//echo "<b><font size='2'>Город: </b></font>".$city[1];
//echo "<br>";
//echo "<br>";
//---------------------------------------


//-------------------avatar----------------
preg_match("/\"photo\_medium\"\:\"(.*)\.jpg/", $api, $avatar);

//echo "<br>";
//echo $avatar[1];

if($avatar[1]=="") $avatar[1]="net_avi";

//echo "<img src='";
$ava= $avatar=str_replace( array('\\'), '', $avatar[1].".jpg");
//echo "'>";
//echo "<br>";echo "<br>";
//---------------------------------------

//-------------------friends----------

$friends= substr_count($api3, ','); 
//echo "<br>";
//---------------------------------------

//-------------------followers----------
preg_match("/\"count\"\:(.*)\,\"/", $api2, $followers);
//echo "<b><font size='2'>Подписчики: </b></font>".$followers[1];
//echo "<br>";
//echo "<br>";
//---------------------------------------

$data = date("d.m.y");
$time=date("H:i");
echo $uid=$user;
$first_name=$first_name[1];
$second_name=$last_name[1];
$sex=$sex;
$country=$country[1];
$city=$city[1];
$friends=(int)($friends);
$followers=(int)($followers[1]);
$avatar= $ava;
$club=$club_file[$num[0]];

include("../../config.php");

mysql_query("INSERT INTO tabla2 (uid, data, time, club, first_name, second_name, sex, country, city, country_id, city_id, friends, followers, avatar  ) 
values ('$uid','$data', '$time', '$club', '$first_name',  '$second_name', '$sex', '$country' , '$city', '$country_id[1]' , '$city_id[1]', '$friends', '$followers', '$avatar')" );

					
								?>

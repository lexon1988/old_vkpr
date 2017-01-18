<?php
if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 0; url=http://localhost/tools/lock/auth/script" );
}
include('../../../../header/header2.php');
?>
<br><br>
	<div class='main_tools' >
		<div style='margin-left:15px; margin-top:20px;'>
	
	<b><font>Добавить себя в список</font></b>
	<hr>
	<div style='margin-left:250px;'>
<?php


		


$user=$_COOKIE["uid"];


//Апи пользлвателя
$api= file_get_contents("http://api.vkontakte.ru/method/getProfiles?uids=".$user."&fields=city,sex,country,photo_medium");

preg_match("/\"sex\"\:(.*)\,\"city\"/", $api, $sex);


include("config.php");




//-------------------ID-----------------
preg_match("/\"uid\"\:(.*)\,\"first_name/", $api, $uid);

//---------------------------------------
mysql_select_db('vk');

$result = mysql_query ("DELETE FROM tabla2 WHERE uid='$uid[1]'");
	if ($result == 'true')
	{
	//echo "<font size='2' color='red'>Cтраница vk.com/id".$uid[1]." уже есть в базе, мы удалили её чтобы недопустить повторений. Но вы можете добавить её снова.</font>";
	}
	else
	{
	echo "";
	}


echo "<br><br><b><font size='2'>id:</b></font> ".$uid[1];
echo "<br>";



 //Апи фоловеров и друзей
 $api2= file_get_contents("http://api.vk.com/method/users.getFollowers?user_id=".$uid[1]."");
 $api3= file_get_contents("http://api.vk.com/method/friends.get?user_id=".$uid[1]."");



//-------------------first_name----------
preg_match("/\"first_name\"\:\"(.*)\",\"last_name/", $api, $first_name);
echo "<b><font size='2'>Имя:</b></font> ".$first_name[1];
echo "<br>";
//---------------------------------------


//-------------------last_name----------
preg_match("/\"last_name\"\:\"(.*)\"\,\"sex\"/", $api, $last_name);
echo "<b><font size='2'>Фамилия: </b></font>".$last_name[1];
echo "<br>";
//---------------------------------------



//-------------------sex----------------
//preg_match("/\"sex\"\:(.*)\,\"city\"/", $api, $sex);
//echo "sex=".$sex[1];
if($sex[1]==1) $sex="Женский";
if($sex[1]==2) $sex="Мужской";

echo "<b><font size='2'>Пол: </b></font>".$sex;
echo "<br>";
//---------------------------------------


//-------------------country_id----------------
preg_match("/\"country\"\:(.*)\,\"photo_medium/", $api, $country_id);
//---------------------------------------

//-------------------city_id----------------
preg_match("/\"city\"\:(.*)\,\"country\"/", $api, $city_id);
//---------------------------------------

 //Апи страна- город
 $api4= file_get_contents("http://api.vkontakte.ru/method/places.getCountryById?country_ids=".$country_id[1]."");
 $api5= file_get_contents("http://api.vkontakte.ru/method/places.getCityById?city_ids=".$city_id[1]."");
 
//-------------------country----------------
preg_match("/\"name\"\:\"(.*)\"\}\]\}/", $api4, $country);
echo "<b><font size='2'>Страна: </b></font>".$country[1];
echo "<br>";
//---------------------------------------

//-------------------city----------------
preg_match("/\"name\"\:\"(.*)\"\}\]\}/", $api5, $city);
echo "<b><font size='2'>Город: </b></font>".$city[1];
echo "<br>";
echo "<br>";
//---------------------------------------


?>




<?php





//-------------------avatar----------------
preg_match("/\"photo\_medium\"\:\"(.*)\.jpg/", $api, $avatar);

//echo "<br>";
//echo $avatar[1];

if($avatar[1]=="") $avatar[1]="net_avi";

echo "<img src='";
echo $ava= $avatar=str_replace( array('\\'), '', $avatar[1].".jpg");
echo "'>";
echo "<br>";echo "<br>";
//---------------------------------------


//-------------------friends----------

echo "<b><font size='2'>Друзья: </b></font>".$friends= substr_count($api3, ','); 
echo "<br>";
//---------------------------------------




//-------------------followers----------
preg_match("/\"count\"\:(.*)\,\"/", $api2, $followers);
echo "<b><font size='2'>Подписчики: </b></font>".$followers[1];
echo "<br>";
echo "<br>";
//---------------------------------------

?>












<form name="add" method="post" action="add.php" >

<input name="uid" type="hidden" value="<?php echo $uid[1]; ?>">
<input name="first_name" type="hidden" value="<?php echo $first_name[1]; ?>">
<input name="second_name" type="hidden" value="<?php echo $last_name[1]; ?>">
<input name="sex" type="hidden" value="<?php echo $sex; ?>">
<input name="country" type="hidden" value="<?php echo $country[1]; ?>">
<input name="city" type="hidden" value="<?php echo $city[1]; ?>">
<input name="friends" type="hidden" value="<?php echo $friends= substr_count($api3, ',');  ?>">
<input name="followers" type="hidden" value="<?php echo $followers[1];  ?>">
<input name="avatar" type="hidden" value="<?php echo $ava; ?>">

<input name="status" type="hidden" value="ok">




<input class='button' valign='center' name='go' type='submit' style='width:110px;' value='Отправить'>



</form>



</div>
	
	</div>
		</div>

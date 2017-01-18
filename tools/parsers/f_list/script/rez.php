<?php
$home= $_SERVER['SERVER_NAME'];
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

	<body>
	
	
	<div class='main' >


	
<br>
<b><font class='font1'>Парсер друзей персональной страницы</font></b>
<hr>

<br>

	<div style='margin-left:100px;'>
	<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
<font>


<?php

if($_GET['uid']=="") {echo "<img src='http://".$home."/img/icon-erroralt.png'><font class='font2'> Ошибка: Введите id пользователя!</font>"; }

else

{

//Параментры

$uid=$_GET['uid'];
$sex= $_GET['sex'];
$country= $_GET['country'];
$city=$_GET['city'];

$age1=$_GET['age1'];
$age2=$_GET['age2'];

$offset=$_GET['offset'];
$offset2=(int)($offset) + 5000;


//echo '<br>';

//echo "https://api.vk.com/method/friends.get?user_id=".$uid."&fields=sex,country,city,bdate,online";
//echo '<br>';

$json=file_get_contents("https://api.vk.com/method/friends.get?user_id=".$uid."&fields=sex,country,city,bdate,online&offset=".$offset);

echo 'Общее количество друзей которуе удалось проанализировать= '.$count=substr_count($json,'uid').' из 5000<br><br>';
$true_count=$count + 2;

$pieces = explode("{", $json);




/*
if($age1>$age2) echo "Больше";
else
echo "Меньше";
*/




echo "<table  align='top'><tr><td valign='top'><p><font>Живые:	</font></p><hr>";
echo '<textarea rows=18 cols=12>';

for($i=3; $i<$true_count; $i++)
	{


	$temp= substr("{".$pieces[$i],0,-1);
	$obj=json_decode($temp);

	$sex_obj=$obj->{'sex'};
	$country_obj=$obj->{'country'};
	$city_obj=$obj->{'city'};
	$bdate_obj=$obj->{'bdate'};
	$uid=$obj->{'uid'};
	
	$deactivated=$obj->{'deactivated'};
	$online=$obj->{'online'};
	
	
	
	$age_y=explode('.',$bdate_obj);

if($age_y[2]<>"") $age=$age_y[2];

//===================================



if($sex<>"")$sex_temp=$sex_obj==$sex;
if($sex=="000")$sex_temp=$uid>0;

if($country<>"")$country_temp=$country_obj==$country;
if($country=="")$country_temp=$uid>0;

if($city<>"")$city_temp=$city_obj==$city;
if($city=="")$city_temp=$uid>0;

if($age1<>"")$age1_temp=$age>$age1;
if($age1=="")$age1_temp=$uid>0;

if($age1<>"")$age2_temp=$age<$age2;
if($age1=="")$age2_temp=$uid>0;



$tempo=$sex_temp && $country_temp && $city_temp && $age1_temp && $age2_temp && $deactivated=="";

//$tempo=$uid>0 && $country_obj==$country && $city_obj==$city && $age>$age1 && $age<$age2;

if($tempo) 

echo $uid.'
' ;

	}
echo '</textarea>';
//===========================Онлайн==========

	echo "</td><td valign='top'><p><font>Онлайн:	</font></p><hr>";	
	echo '<textarea rows=18 cols=12>';
	
		for($i=3; $i<$true_count; $i++)
	{


	$temp= substr("{".$pieces[$i],0,-1);
	$obj=json_decode($temp);

	$sex_obj=$obj->{'sex'};
	$country_obj=$obj->{'country'};
	$city_obj=$obj->{'city'};
	$bdate_obj=$obj->{'bdate'};
	$uid=$obj->{'uid'};
	
	$deactivated=$obj->{'deactivated'};
	$online=$obj->{'online'};
	
	
	
	$age_y=explode('.',$bdate_obj);

if($age_y[2]<>"") $age=$age_y[2];

//===================================



if($sex<>"")$sex_temp=$sex_obj==$sex;
if($sex=="000")$sex_temp=$uid>0;

if($country<>"")$country_temp=$country_obj==$country;
if($country=="")$country_temp=$uid>0;

if($city<>"")$city_temp=$city_obj==$city;
if($city=="")$city_temp=$uid>0;

if($age1<>"")$age1_temp=$age>$age1;
if($age1=="")$age1_temp=$uid>0;

if($age1<>"")$age2_temp=$age<$age2;
if($age1=="")$age2_temp=$uid>0;



$tempo=$sex_temp && $country_temp && $city_temp && $age1_temp && $age2_temp && $deactivated=="" && $online=="1";

//$tempo=$uid>0 && $country_obj==$country && $city_obj==$city && $age>$age1 && $age<$age2;

if($tempo) 

echo $uid.'
' ;
	
	}

echo '</textarea>';	
	
	



echo "</td><td valign='top'><p><font>Удалённые:	</font></p><hr>";	
	
	echo '<textarea rows=18 cols=12>';
	for($i=3; $i<$true_count; $i++)
	{


	$temp= substr("{".$pieces[$i],0,-1);
	$obj=json_decode($temp);

	$uid=$obj->{'uid'};
	$deactivated=$obj->{'deactivated'};
	
	if($deactivated=="deleted")
	
echo $uid.'
';
	
	
	}
	echo '</textarea>';




	
	echo "</td><td valign='top'><p><font>Забаненные:	</font></p><hr>";	
	echo '<textarea rows=18 cols=12>';
	
	for($i=3; $i<$true_count; $i++)
	{


	$temp= substr("{".$pieces[$i],0,-1);
	$obj=json_decode($temp);

	$uid=$obj->{'uid'};
	$deactivated=$obj->{'deactivated'};
	
	if($deactivated=="banned")
	
echo $uid.'
';
	
	
	}


echo '</textarea>';	
	
	
	
}

?>



</td>
</tr>
</table>

</font>

<?php
echo "<br><a href='rez.php?offset=".$offset2."&uid=".$_GET['uid']."&sex=".$sex."&country=".$country."&city=".$city."&age1=".$age1."&age2=".$age2."' style='text-decoration: none;'>Следующие 5000 пользователей >>> </a>";
?>

</div>

	</div>

</body>

</html>

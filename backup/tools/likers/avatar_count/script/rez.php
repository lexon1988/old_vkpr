<?php
if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://".$_SERVER['SERVER_NAME']."/tools/lock/auth/script" );
}
$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];
$proxy=$_COOKIE["proxy"];

//интервал
$time1=$_COOKIE["countlikeava_rand1"];
$time2=$_COOKIE["countlikeava_rand2"];
$rand_time=(int)(rand($time1,$time2));

$count=$_COOKIE["countlikeava_count"];
$count2=$_COOKIE["countlikeava_count2"];


$max = (int)($_COOKIE["countlikeava_counter"]);


//тут я запутался((
$true_max= $max-1;
$friend=file('files/'.$uid.'_like.txt');

if($friend[$max]<>'')
{

//(int)($friend[$max]
$api_curl='https://api.vk.com/method/users.get.xml?user_ids='.(int)($friend[$max]).'&fields=photo_id&access_token='.$access_token;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***
preg_match("/\<photo\_id\>(.*)\<\/photo\_id\>/U", $api, $photo_id);



$photo=explode('_',$photo_id[1]);
$photo[1];
 

$api_curl='https://api.vk.com/method/likes.getList.xml?type=photo&owner_id='.(int)($friend[$max]).'&item_id='.$photo[1].'&count=1';
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***
preg_match("/\<count\>(.*)\<\/count\>/U", $api, $count_rez);


if((int)($count)<=$count_rez[1] && $count_rez[1]<=(int)($count2))
{
header( "Refresh: $rand_time; url=counter.php?max=$true_max" );
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>
<body onLoad="tiktak();">
							  <script language="JavaScript" type="text/javascript">
								// значение начальной секунды
								var second=<?php echo $rand_time; ?>;
								function tiktak()
								{
								  if(second<=9){second="0" + second;}
								  if(document.getElementById){timer.innerHTML=second;}
								  if(second==00){return false;}
								  second--;
								  setTimeout("tiktak()", 1000);
								}
						</script>
<div class='main' >
<br>
<b><font>Узнать кол-во лайков на аватаре</font></b>
<hr>
<br>
<div style='margin-left:235px;'>
<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
<?php
echo '<font>'.$count_rez[1].' лайков, пользователь- '.(int)($friend[$max]).', подходит по параметрам!</font>';
echo "<p><font>Вы будете перенаправлены через <font class='font2'><span id='timer'></span></font> секунд.</p></font>";

			// записываем в файл
			$fp = fopen("files/".$uid."_countlikeava_rez.txt", "a"); // Открываем файл в режиме записи 
			$mytext = $friend[$max]; // Исходная строка
			$test = fwrite($fp, $mytext); // Запись в файл
			if ($test) echo '';
			else echo '';
			fclose($fp); //Закрытие файла

}
else
{
header( "Refresh: $rand_time; url=counter.php?max=$true_max" );

			// записываем в файл
			$fp = fopen("files/".$uid."_countlikeava_antirez.txt", "a"); // Открываем файл в режиме записи 
			$mytext = $friend[$max]; // Исходная строка
			$test = fwrite($fp, $mytext); // Запись в файл
			if ($test) echo '';
			else echo '';
			fclose($fp); //Закрытие файла

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>
<body onLoad="tiktak();">
							  <script language="JavaScript" type="text/javascript">
								// значение начальной секунды
								var second=<?php echo $rand_time; ?>;
								function tiktak()
								{
								  if(second<=9){second="0" + second;}
								  if(document.getElementById){timer.innerHTML=second;}
								  if(second==00){return false;}
								  second--;
								  setTimeout("tiktak()", 1000);
								}
						</script>
<div class='main' >
<br>
<b><font>Узнать кол-во лайков на аватаре</font></b>
<hr>
<br>
<div style='margin-left:235px;'>
<a href='index.php' style='text-decoration: none;'><<<</a><br><br>


<?php
echo "<font><font class='font2'>".$count_rez[1]."</font> лайков, пользователь- ".(int)($friend[$max]).", <font class='font2'>НЕ подходит по параметрам!</font></font>";
echo "<p><font>Вы будете перенаправлены через <font class='font2'><span id='timer'></span></font> секунд.</p></font>";
}
}

else
{
?>

<html>

<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

	<body>
	
	<div class='main' >
	
	<br>
	<b><font>Узнать кол-во лайков на аватаре</font></b>
<hr>
<br>

	<div style='margin-left:235px;'>
		<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
		<font>Введите список id пользователей:</font>
		
		<form action="temp.php" method="post">
	
	<br>

		<table>
		<tr>
			<td><font>Нужный список: </font></td>
			<td><font>Ненужный список: </font></td>
		</tr>
		<tr>
			<td><p><textarea name='text' cols='15' rows='20'><?php echo file_get_contents("files/".$uid."_countlikeava_rez.txt"); ?></textarea></p></td>
			<td><p><textarea name='text' cols='15' rows='20'><?php echo file_get_contents("files/".$uid."_countlikeava_antirez.txt"); }?></textarea></p></td>
		</tr>
		</table>


</div>
</div>

</body>
<html>

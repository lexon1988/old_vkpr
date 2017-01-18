<?php
$home= $_SERVER['SERVER_NAME'];


if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://".$home."/tools/lock/auth/script" );
}
$access_token=$_COOKIE["access_token"];

$text=urlencode($_GET['text']);

$country_id= $_GET['country_id'];
$city_id= $_GET['city_id'];
$sort= $_GET['sort'];
$count= $_GET['count'];

$api_curl='https://api.vk.com/method/groups.search.xml?q='.$text.'&country_id='.(int)($country_id).'&city_id='.(int)($city_id).'&sort='.(int)($sort).'&count='.(int)($count).'&access_token='.$access_token;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***


preg_match_all('/\<gid\>(.*)\<\/gid\>/',$api,$gid);



?>


<html>

<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

	<body>
	
	<div class='main' >
	
	<br>
	<b><font>Поиск сообществ</font></b>
<hr>

<br>
	<div style='margin-left:235px;'>
		<font>Результат:</font>
		
		<form action="temp.php" method="post">

<p><textarea name='text' cols='15' rows='25'><?php 
$count=$count+1;

for($i=1;$i<$count;$i++)
{
echo $gid[1][$i];
echo "
";

}

?></textarea></p> 
		

		</form>

		</div>




</div>

</body>

</html>

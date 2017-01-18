<?php
$home= $_SERVER['SERVER_NAME'];

if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://".$home."/tools/lock/auth/script" );
}
$gid=$_GET['gid'];

$offset=$_GET['offset'];
$access_token=$_COOKIE["access_token"];
$proxy=$_COOKIE["proxy"];



$api_curl='https://api.vk.com/method/groups.getInvitedUsers.xml?group_id='.$gid.'&offset='.$offset.'&access_token='.$access_token;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***


preg_match_all("/\<uid\>(.*)\<\/uid\>/U", $api, $uid);

$offset=$_GET['offset'];
$offset2=(int)($offset) + 20;

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

	<body>
	
	<div class='main' >
	<br>

<br>
<b><font class='font1'>Список приглашённых в сообщество пользователей</font></b>
<hr>

<br>
	<div style='margin-left:235px;'>
		<a href='index.php' style='text-decoration: none;'><<<</a><br>

		<form action="temp.php" method="post">
<?php
echo "<p><textarea name='text' cols='15' rows='23'>";
for($i=0;$i<20;$i++)
{	
echo $uid[1][$i];
echo "
"; 
}?>
</textarea> 
		</p>
		
		

		</form>
<?php
echo "<br><a href='rez.php?offset=".$offset2."&gid=".$gid."' style='text-decoration: none;'>Следующие 20 пользователей >>> </a>";


?>
	
	
	</div>




</body>

</html>

<?php
$home= $_SERVER['SERVER_NAME'];

$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];
$proxy=$_COOKIE["proxy"];
?>

<html>

<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

	<body>
	
	<div class='main'>
	
	<br>
	<b><font>Отправить сообщение (ЛС)</font></b>
<hr>
<?php
$friend_uid=$_GET['uid'];

$api_curl="https://api.vk.com/method/messages.getHistory?user_id=".$friend_uid."&access_token=".$_COOKIE["access_token"];
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***


$json_data=$api;

$json= json_decode($json_data,true);

$substr_count= substr_count($json_data, 'uid'); // 2

echo "<form method='post' action='add_post.php'><textarea name='massege' cols='40' rows='3'></textarea><INPUT type='hidden' name='uid' value='".$friend_uid."'> <br><br><input type='submit' class='button' value='Отправить'></form>";



echo "<BR><BR>";
echo "<FONT>ПОСЛЕДНИЕ СООБЩЕНИЯ: </FONT><HR>";


for($i=1;$i<$substr_count;$i++){
	
	$uid2=$json['response'][$i]['uid'];
	
	if($uid2==$uid)
	$uid2="Вы";

	echo "<a href='http://vk.com/id".$json['response'][$i]['uid']."' target='_blank'>".$uid2."</a>: ";
	echo "<font>";
	echo $json['response'][$i]['body'];
	echo "</font>";
	echo "<hr>";

	
}


?>





</div>

</body>

</html>

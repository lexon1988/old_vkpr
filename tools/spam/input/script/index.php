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
	<b><font class='font1'>Входящие сообщения (ЛС)</font></b>
<hr>
<?php
//КЛЮЧ и СИД КАПЧИ
$captcha_sid=$_POST['captcha_sid'];
$captcha_key=$_POST['captcha_key'];


$api_curl="https://api.vk.com/method/messages.getDialogs?count=50&access_token=".$access_token.'&captcha_sid='.$captcha_sid.'&captcha_key='.$captcha_key;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***





$json_data=$api;

$json= json_decode($json_data,true);


//ЕСЛИ КАПЧА
$error=(int)($json['error']['error_code']); 


if($error=="14")
{
$captcha_sid=$json['error']['captcha_sid'];
$captcha_img=$json['error']['captcha_img'];
echo "<font>Введите капчу: </font><br><img src='".$captcha_img."'><br>";
?>
<form method="post" action="index.php">
<input type="hidden" name="captcha_sid" value="<?php echo $captcha_sid;?>">
<input type="text" name="captcha_key" size="13" value=""><br>
<input type="submit" name="post" class='button' value="Отправить">
</form>
<?php
}


for($i=1;$i<50;$i++){

echo "<table   width=100% >";

if($json['response'][$i]['out']=="")
	{

	echo "<tr><td style='border: 15px solid white; '><font><a href='http://vk.com/id".$json['response'][$i]['uid']."' target='_blank'>".$json['response'][$i]['uid']."</a>:  ".$json['response'][$i]['body']."</font></td></tr><tr> ";

	echo "";
	echo "<br><br>";
	echo "<td  align='right' style='border: 7px solid #E6E6E6;   background: #E6E6E6;'>
	<b>
	
	<a href='del.php?uid=".$json['response'][$i]['uid']."'>УДАЛИТЬ</a> | 
	<a href='add.php?uid=".$json['response'][$i]['uid']."'>ОТВЕТИТЬ</a>
	
	</b>
	</td></tr>";


	}

	

	else
	{
	echo "";
	}
	
}


echo "</table>";
echo "<br>";
echo "<br>";
?>


	










</div>

</body>

</html>

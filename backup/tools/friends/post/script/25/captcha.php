<?php
header( "Refresh: 60; url=start.php" );
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	</head>

<body onLoad="tiktak();">

	<script language="JavaScript" type="text/javascript">
			// значение начальной секунды
			var second=60;
			function tiktak()
			{
			  if(second<=9){second="0" + second;}
			  if(document.getElementById){timer.innerHTML=second;}
			  if(second==00){return false;}
			  second--;
			  setTimeout("tiktak()", 1000);
			}
	</script>

<div style="margin-left:10px;margin-top:10px">
<font>

<?php
$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];
$proxy=$_COOKIE["proxy"];

$post_str= $_COOKIE["text"];
$photo=$_COOKIE["photo"];

$text=urlencode($post_str);
$num=file('num.txt'); 
$club_file=file("../list.txt");
$club_id=(int)($club_file[(int)($num[0])]);
  
$captcha_sid=$_POST['captcha_sid'];
$captcha_key=$_POST['captcha_key'];
$wall=$_POST['wall'];

$api_post=$_POST['api'];
$post_comment_id=$_POST['post_comment_id'];

 
 
 

 
//**************************************************************************************************************************
$api_curl=$api_post."&captcha_sid=".$captcha_sid."&captcha_key=".$captcha_key;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../../file_get_contents2.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***
preg_match("/\<post\_id\>(.*)\<\/post\_id\>/U", $api, $post_id);
preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $api, $error_code);
preg_match("/\<cid\>(.*)\<\/cid\>/U", $api, $cid);

if($cid[1]<>"")
{
	echo "Коммент отправлен: <a href='https://vk.com/wall-".$club_id."_".$post_comment_id."?reply=".$cid[1]."' target='_blank'>https://vk.com/wall-".$club_id."_".$post_comment_id."?reply=".$cid[1]."</a><br>";
}

	if($post_id[1]<>"") 
	{
		echo "<font>Запись отправлена: <a href='https://vk.com/wall-".$club_id."_".$post_id[1]."' target='_blank'>vk.com/wall-".$club_id."_".$post_id[1]."</a></font><br>";
	}

	
		if($error_code[1]) 
			{
				echo "<font class='font2'>Ошибка: КОД-".$error_code[1].", расшифровка <a href='https://vk.com/dev/errors' target='_blank'>тут</a></font><br>";
			}

//**************************************************************************************************************************

?>

 
 

 
 
 
 
 
 

<?php echo "<br>Постинг в группу: <a href='https://vk.com/club".$club_id."' target='_blank'>https://vk.com/club".$club_id."</a>"; ?>
<br>
<p>Вы будете перенаправлены через <font class='font2'><span id='timer'></span></font> секунд.</p>
</font>
</div>
	</body>
</html>



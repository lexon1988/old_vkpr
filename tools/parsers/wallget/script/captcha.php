<?php
$home= $_SERVER['SERVER_NAME'];
if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://".$home."/tools/lock/auth/script" );
}
$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];
$proxy=$_COOKIE["proxy"];

$user_id=$_POST['user_id'];
$messages_text=urlencode($_POST['messages_text']);
$attachment_text=$_POST['attachment_text'];
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

<body>
<div class='main' >
<br>
<b><font class='font1'>Постинг на стену</font></b>
<hr>
<br>
<div style='margin-left:235px;'>
<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
<?php
$api_curl='https://api.vk.com/method/wall.post.xml?owner_id='.(int)($user_id).'&message='.$messages_text.'&attachment='.$attachment_text.'&access_token='.$access_token'&captcha_sid='.$captcha_sid.'&captcha_key='.$captcha_key;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***
preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $api, $error_code);
preg_match("/\<post\_id\>(.*)\<\/post\_id\>/U", $api, $post_id);

if($post_id[1]<>0){
echo "<font>Запись отправлена: <a href='https://vk.com/wall".$uid."_".$post_id[1]."'>vk.com/wall".$uid."_".$post_id[1]."</a></font>";
}

if($error_code[1]==14){
preg_match("/\<captcha\_sid\>(.*)\<\/captcha\_sid\>/U", $api, $captcha_sid);
preg_match("/\<captcha\_img\>(.*)\<\/captcha\_img\>/U", $api, $captcha_img);
echo "<font>Введите капчу</font>:<br>";
echo "<img src='".$captcha_img[1]."' width= 200px height= 80px>";
?>
<form method="post" action="captcha.php">
<input type="hidden" name="captcha_sid" value="<?php echo $captcha_sid[1]; ?>">
<input type="hidden" name="$user_id" value="<?php echo (int)($friend[$max]); ?>">
<input type="hidden" name="$messages_text" value="<?php echo $wallpost_text; ?>">
<input type="hidden" name="attachment_text" value="<?php echo $attachment_text; ?>">
<input type="text" name="captcha_key" size="13" value="">
<br>
<input type="submit" name="post" class='button' value="Отправить">
</form>
<?php
}

if($error_code[1]<>14){
echo "<font class='font2'><img src='http://".$home."/img/icon-erroralt.png'>Ошибка: ".$error_code[1].":".$error_msg[1]."</font>"; 
}

?>

<?php header( "Refresh: 60; url=start.php" ); ?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	</head>
<body onLoad="tiktak();">
<font>
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
	
<?php
$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];
$proxy=$_COOKIE["proxy"];

$post_str= $_COOKIE["text"];
$photo=$_COOKIE["photo"];
$text=urlencode($post_str);

$num=file("num.txt"); 
$club_file=file("../list.txt");
$club_id=(int)($club_file[(int)($num[0])]);

$temp=file("temp.txt");
$post_comment_id=(int)($temp[0]);
$from_id=(int)($temp[1]);
$to_id=(int)($temp[2]);










//***СТЕНА ОТКРЫТА***СТЕНА ОТКРЫТА***СТЕНА ОТКРЫТА***СТЕНА ОТКРЫТА***СТЕНА ОТКРЫТА***СТЕНА ОТКРЫТА***СТЕНА ОТКРЫТА***СТЕНА ОТКРЫТА
if($temp[0]=='Стена открыта') 
{
$api_curl="https://api.vk.com/method/wall.post.xml?owner_id=-".$club_id."&message=".$text."&attachments=".$photo."&access_token=".$access_token;

//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../../file_get_contents2.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***
preg_match("/\<post\_id\>(.*)\<\/post\_id\>/U", $api, $post_id);
preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $api, $error_code);

	if($post_id[1]<>"") 
	{
		echo "Запись отправлена: <a href='https://vk.com/wall-".$club_id."_".$post_id[1]."' target='_blank'>vk.com/wall-".$club_id."_".$post_id[1]."</a>";
	}

	
		if($error_code[1]<>"" && $error_code[1]<>14) 
		{
			echo "<font class='font2'>Ошибка: КОД-".$error_code[1].", расшифровка <a href='https://vk.com/dev/errors' target='_blank'>тут</a></font>";
		}

	
			if($error_code[1]==14) {

			preg_match("/\<captcha\_sid\>(.*)\<\/captcha\_sid\>/U",  $api, $captcha_sid);
			preg_match("/\<captcha\_img\>(.*)\<\/captcha\_img\>/U",  $api, $captcha_img);

			echo "<font>Введите капчу:</font><br>";
			echo "<img src='".$captcha_img[1]."' width= 180px height= 72px>";
?>

				<form method="post" action="captcha.php">
				<input type="hidden" name="captcha_sid" value="<?php echo $captcha_sid[1]; ?>">
				<input type="hidden" name="api" value="<?php echo $api_curl; ?>">
				<input type="text" name="captcha_key" size="21" value="">
				<br>
				<input type="submit" name="post"  value="Отправить" class='button'>
				</form>
						
<?php
								  }
}
//***СТЕНА ОТКРЫТА КОНЕЦ***СТЕНА ОТКРЫТА КОНЕЦ***СТЕНА ОТКРЫТА КОНЕЦ***СТЕНА ОТКРЫТА КОНЕЦ***СТЕНА ОТКРЫТА КОНЕЦ***СТЕНА ОТКРЫТА КОНЕЦ
?>
















<?php
//***ПОСТИНГ В КОММЕНТ***ПОСТИНГ В КОММЕНТ***ПОСТИНГ В КОММЕНТ***ПОСТИНГ В КОММЕНТ***ПОСТИНГ В КОММЕНТ***ПОСТИНГ В КОММЕНТ
if($temp[0]<>'Стена открыта') 
{
$api_curl="https://api.vk.com/method/wall.addComment.xml?owner_id=-".$to_id."&post_id=".$post_comment_id."&text=".$text."&attachments=".$photo."&access_token=".$access_token;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../../file_get_contents2.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***
preg_match("/\<cid\>(.*)\<\/cid\>/U", $api, $cid);
preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $api, $error_code);

if($cid[1]<>"")
{
	echo "Коммент отправлен: <a href='https://vk.com/wall-".$club_id."_".$post_comment_id."?reply=".$cid[1]."' target='_blank'>https://vk.com/wall-".$club_id."_".$post_comment_id."?reply=".$cid[1]."</a>";
}

	if($post_id[1]<>"") 
	{
		echo "Запись отправлена: <a href='https://vk.com/wall-".$club_id."_".$post_id[1]."' target='_blank'>vk.com/wall-".$club_id."_".$post_id[1]."</a>";
	}

	
		if($error_code[1]<>"" && $error_code[1]<>14) 		
		{
			echo "<font class='font2'>Ошибка: КОД-".$error_code[1].", расшифровка <a href='https://vk.com/dev/errors' target='_blank'>тут</a></font>";
		}

	
			if($error_code[1]==14) {

			preg_match("/\<captcha\_sid\>(.*)\<\/captcha\_sid\>/U", $api, $captcha_sid);
			preg_match("/\<captcha\_img\>(.*)\<\/captcha\_img\>/U", $api, $captcha_img);

			echo "<font>Введите капчу:</font><br>";
			echo "<img src='".$captcha_img[1]."' width= 180px height= 72px>";
?>

				<form method="post" action="captcha.php">
				<input type="hidden" name="captcha_sid" value="<?php echo $captcha_sid[1]; ?>">
				<input type="hidden" name="api" value="<?php echo $api_curl; ?>">
				<input type="hidden" name="post_comment_id" value="<?php echo $post_comment_id; ?>">
				<input type="text" name="captcha_key" size="21" value="">
				<br>
				<input type="submit" name="post"  value="Отправить" class='button'>
				</form>
						
<?php
								  }

								  
echo "<p>Постинг в коммент к записи: <a href='https://vk.com/wall-".$club_id."_".$post_comment_id."' target='_blank'>https://vk.com/wall-".$club_id."_".$post_comment_id."</a></p>";									  
}
//***ПОСТИНГ В КОММЕНТ КОНЕЦ***ПОСТИНГ В КОММЕНТ КОНЕЦ***ПОСТИНГ В КОММЕНТ КОНЕЦ***ПОСТИНГ В КОММЕНТ КОНЕЦ
?>
















<?php echo "<p>Постинг в группу: <a href='https://vk.com/club".$club_id."' target='_blank'>https://vk.com/club".$club_id."</a></p>"; ?>																	

<p>Вы будете перенаправлены через <font class='font2'><span id='timer'></span></font> секунд.</p>

</font>
</div>
	</body>
<?php?>
</html>



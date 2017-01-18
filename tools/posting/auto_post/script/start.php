<?php
$home= $_SERVER['SERVER_NAME'];

$time=$_COOKIE["time"];
$time1=$_COOKIE["time1"];
$rand_time=rand($time,$time1);
header( "Refresh: $rand_time; url=num_plus.php" );
?>
<html>

<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
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
	
		<div class='main'>
		<br>
		<b><font class='font1'>Автопостинг в группы "Добавь| Лайк"</b></font><hr>
	<div style='margin-left:250px;'>
	<font>
	<br>
<?php
$rand1= rand(0,9);

$post_str= $_COOKIE["text".$rand1];
$photo=$_COOKIE["photo"];


$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];
$friendautoadd=$_COOKIE["friendautoadd"];

$text=urlencode($post_str);

$num=$_COOKIE['num'];
$max=$_COOKIE['max'];

$post_comment_id=(int)($_COOKIE['post_id']);
$from_id=(int)($_COOKIE['from_id']);
$to_id=(int)($_COOKIE['to_id']);

$club_file=file("../../../../list.txt");
$club_id=(int)($club_file[$num]);



echo "<a href='index.php' style='text-decoration: none;'><<<</a><br><br>Автопостинг в группу- ".$num."/".$max.", <a href='http://vk.com/club".$club_id."' target='_blank'>http://vk.com/club".$club_id."</a>, с максимальной задержкой в ".$time." секунд. <br><br>" ;







//***СТЕНА ОТКРЫТА***СТЕНА ОТКРЫТА***СТЕНА ОТКРЫТА***СТЕНА ОТКРЫТА***СТЕНА ОТКРЫТА***СТЕНА ОТКРЫТА***СТЕНА ОТКРЫТА***СТЕНА ОТКРЫТА
 if($_COOKIE['wall']=="Стена открыта")
{
$api_curl="https://api.vk.com/method/wall.post.xml?owner_id=-".$club_id."&message=".$text."&attachments=".$photo."&access_token=".$access_token;

//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
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
 if($_COOKIE['wall']<>"Стена открыта")
{
 $api_curl="https://api.vk.com/method/wall.addComment.xml?owner_id=-".$to_id."&post_id=".$post_comment_id."&text=".$text."&attachments=".$photo."&access_token=".$access_token;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***
preg_match("/\<cid\>(.*)\<\/cid\>/U", $api, $cid);
preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $api, $error_code);

if($cid[1]<>"")
{
	echo "Коммент отправлен: <a href='https://vk.com/wall-".$to_id."_".$post_comment_id."?reply=".$cid[1]."' target='_blank'>https://vk.com/wall-".$club_id."_".$post_comment_id."?reply=".$cid[1]."</a>";
}

	if($post_id[1]<>"") 
	{
		echo "Запись отправлена: <a href='https://vk.com/wall-".$to_id."_".$post_id[1]."' target='_blank'>vk.com/wall-".$to_id."_".$post_id[1]."</a>";
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

								  
echo "<p>Постинг в коммент к записи: <a href='https://vk.com/wall-".$to_id."_".$post_comment_id."' target='_blank'>https://vk.com/wall-".$to_id."_".$post_comment_id."</a></p>";									  
}
//***ПОСТИНГ В КОММЕНТ КОНЕЦ***ПОСТИНГ В КОММЕНТ КОНЕЦ***ПОСТИНГ В КОММЕНТ КОНЕЦ***ПОСТИНГ В КОММЕНТ КОНЕЦ
?>











 
			
																				



<p>Вы будете перенаправлены через <font class='font2'><span id="timer"></span></font> секунд.</p>

</font>

</div>

</div>



	</body>

</html>



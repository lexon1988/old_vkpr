<?php
$time=file_get_contents('time.txt');
header( "Refresh: $time; url=num_plus.php" );
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>VKPoster</title>
</head>
	<body>
	


	
	
<?php






$uid=file_get_contents('access/uid.txt');
$access_token=file_get_contents('access/access_token.txt');
$post_str=file_get_contents('access/text.txt');
$photo=file_get_contents('access/photo.txt');

$text=urlencode($post_str);

$num=file('num.txt'); 
$club_file=file("../list.txt");
$club_id=(int)($club_file[$num[0]]);

$max=file('max.txt');
echo "Автопостинг в группу- ".$num[0]."/".$max[0].", http://vk.com/club".$club_id.", с задержкой в ".$time." секунд. Начать с <a href='num_reset.php'>начала</a>?<br><br>";

$temp=file("temp.txt");
$post_id=(int)($temp[0]);
$from_id=(int)($temp[1]);
$to_id=(int)($temp[2]);

 if($temp[0]<>"Стена открыта") {

$api1= "https://api.vk.com/method/wall.addComment.xml?owner_id=-".$to_id."&post_id=".$post_id."&text=".$text."&attachments=".$photo."&v=5.0&access_token=".$access_token;

  $comment=file_get_contents($api1);

 preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $comment, $error_code);
 preg_match("/\<error\_msg\>(.*)\<\/error\_msg\>/u",$comment,$error_msg);
 echo "<br><font color='red'>".$error_msg[1]."</font><br>";
 
 
 //если капча то
 if($error_code[1]==14) {

preg_match("/\<captcha\_sid\>(.*)\<\/captcha\_sid\>/U", $comment, $captcha_sid);
preg_match("/\<captcha\_img\>(.*)\<\/captcha\_img\>/U", $comment, $captcha_img);

echo "Введите капчу:<br>";
echo "<img src='".$captcha_img[1]."' width= 200px height= 80px>";



?>

<form method="post" action="captcha.php">


<input type="hidden" name="captcha_sid" value="<?php echo $captcha_sid[1]; ?>">
<input type="text" name="captcha_key" size="17" value="">
<br><br>
<input type="submit" name="post"  value="Отправить">
</form>
<?php
		}

		else
		
		if($error_code[1]==9)
		
		{echo "Слишком много запросов к капче, вконтакт временно заблокировал доступ к капче для вашего аккаунта.<br><br>";}
		
		else
		
		{
				preg_match("/\<comment\_id\>(.*)\<\/comment\_id\>/U", $comment, $comment_id);
 
				if($comment_id[1]=="") 
				{
				$error=1;
				echo "Случилась ошибка, <a href='index.php'>исправить</a>!<br><br>";
				include('temp.php');
				}
				else
				{
				
				$comment_id= "https://vk.com/wall-".$to_id."_".$post_id."?reply=".$comment_id[1];
				echo "Ваша запись отправлена:<br>";
				echo "<a href=".$comment_id.">".$comment_id."</a>";					
				}
	
	}
		
		
}

//если стена открыта то

		else
						{
							//echo "https://api.vk.com/method/wall.post.xml?owner_id=-".$club_id."&message=".$text."&attachments=".$photo."&v=5.0&access_token=".$access_token."<br>";
							 $api1= "https://api.vk.com/method/wall.post.xml?owner_id=-".$club_id."&message=".$text."&attachments=".$photo."&v=5.0&access_token=".$access_token;

							$comment=file_get_contents($api1);

							preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $comment, $error_code);
							preg_match("/\<error\_msg\>(.*)\<\/error\_msg\>/u",$comment,$error_msg);
							
							echo "<font color='red'>".$error_msg[1]."</font>";
							
							//<error_msg>Access denied: user should be group editor</error_msg>
 
									//если капча
									if($error_code[1]==14) {

									preg_match("/\<captcha\_sid\>(.*)\<\/captcha\_sid\>/U", $comment, $captcha_sid);
									preg_match("/\<captcha\_img\>(.*)\<\/captcha\_img\>/U", $comment, $captcha_img);

									echo "Введите капчу:<br>";
									echo "<img src='".$captcha_img[1]."' width= 200px height= 80px>";

?>


		<form method="post" action="captcha.php">
		
		<input type="hidden" name="captcha_sid" value="<?php echo $captcha_sid[1]; ?>">
		<input type="text" name="captcha_key" size="13" value="">
		
		
		
		<input type="hidden" name="wall" value="wall">
		<br>
		<input type="submit" name="post"  value="Отправить">
		</form>

<?php

			}

				else
				
				
					{
					
					$comment=file_get_contents($api1);
					preg_match("/\<post\_id\>(.*)\<\/post\_id\>/U", $comment, $comment_id);
					$comment_id= "https://vk.com/wall-".$club_id."_".$comment_id[1];
					
						if($comment_id[1]=="") 
						{
						$error=1;
						echo "Случилась ошибка, <a href='index.php'>исправить</a>!<br><br>";
						include('temp.php');
						}
						else
						{

							echo "Ваша запись отправлена:<br>";
							echo "<a href=".$comment_id.">".$comment_id."</a>";
						}
	
					
				
					}
	

	
		}

																	
									echo "<font size='2'><br>Постинг в группу: <a href='https://vk.com/club".$club_id."'>vk.com/club".$club_id."</a><br>";	

									if($temp[0]<>"Стена открыта") {
 
								
																	echo "<br>Постинг в первю запись на стене - <a href='https://vk.com/club".$to_id."?w=wall-".$from_id."_".$post_id."'>vk.com/club".$to_id."?w=wall-".$from_id."_".$post_id." </a>";
																	
																	}
																				
																				else 

																				echo "Стена открыта";
																				echo "</font>";


					
																				
?>
<br><br>
Обновить <a href='index.php'>страницу</a>?




	</body>

</html>



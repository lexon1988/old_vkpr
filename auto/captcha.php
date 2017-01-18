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
  


 $captcha_sid=$_POST['captcha_sid'];
 $captcha_key=$_POST['captcha_key'];
 $wall=$_POST['wall'];








if($wall=="wall")

{
//стена открыта
	$api1= "https://api.vk.com/method/wall.post.xml?owner_id=-".$club_id."&message=".$text."&attachments=".$photo."&v=5.0&access_token=".$access_token."&captcha_sid=".$captcha_sid."&captcha_key=".$captcha_key;

	$comment=file_get_contents($api1);
	preg_match("/\<post\_id\>(.*)\<\/post\_id\>/U", $comment, $comment_id);
	
	if($comment_id[1]<>""){
	
						$comment_id= "https://vk.com/wall-".$club_id."_".$comment_id[1];
						echo "Ваша запись отправлена:<br>";
						echo "<a href=".$comment_id.">".$comment_id."</a><br>";
						
						}
						
							else
								
								 echo "Запись не была отправлена!<br>";
						
	
	

}


		else

		{
		
		
						$temp=file("temp.txt");
						$post_id=(int)($temp[0]);
						$from_id=(int)($temp[1]);
						$to_id=(int)($temp[2]);
						$api1= "https://api.vk.com/method/wall.addComment.xml?owner_id=-".$to_id."&post_id=".$post_id."&text=".$text."&attachments=".$photo."&v=5.0&access_token=".$access_token."&captcha_sid=".$captcha_sid."&captcha_key=".$captcha_key;
						$comment=file_get_contents($api1);
						preg_match("/\<comment\_id\>(.*)\<\/comment\_id\>/U", $comment, $comment_id);
								
							if($comment_id[1]<>"")
								{
									$comment_id= "https://vk.com/wall-".$to_id."_".$post_id."?reply=".$comment_id[1];
									echo "Ваша запись отправлена:<br>";
									echo "<a href=".$comment_id.">".$comment_id."</a><br>";	
						
									
										}
										else
												echo "<font color='red'>Запись не была отправлена!<br></font>";
												}
 
 
 
/*
<script language="JavaScript">
function dorefresh() 
  { 
    ti=setTimeout("dorefresh();",18000); 
    window.location="index.php"; 
  } 
window.onLoad=dorefresh();
</script>

*/
 

 
?>

<br>

Вернуться <a href='index.php'>назад</a>?

	</body>

</html>



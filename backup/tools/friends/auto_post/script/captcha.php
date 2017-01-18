<?php
$time=$_COOKIE["time"];
header( "Refresh: $time; url=num_plus.php" );
?>
<html>

<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>
	<body onLoad="tiktak();">
	
		<div class='main'>
		<br>
		<b><font>Автопостинг в группы "Добавь| Лайк"</b><hr>
	<div style='margin-left:250px;'>
	
	<br>

	<body>
<?php

$rand= rand(0,9);

$post_str= $_COOKIE["text".$rand];
$photo=$_COOKIE["photo"];




$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];


$text=urlencode($post_str);


$num=$_COOKIE['num'];
$club_file=file("../../../../list.txt");
$club_id=(int)($club_file[$num]);



 $captcha_sid=$_POST['captcha_sid'];
 $captcha_key=$_POST['captcha_key'];
 $wall=$_POST['wall'];






if($wall=="wall")
{
//стена открыта
$api1= "https://api.vk.com/method/wall.post.xml?owner_id=-".$club_id."&message=".$text."&attachments=".$photo."&v=5.0&access_token=".$access_token."&captcha_sid=".$captcha_sid."&captcha_key=".$captcha_key;

	$comment=file_get_contents($api1);
	preg_match("/\<post\_id\>(.*)\<\/post\_id\>/U", $comment, $comment_id);
	preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $comment, $error_code);
	preg_match("/\<error\_msg\>(.*)\<\/error\_msg\>/u",$comment,$error_msg);

	
	if($comment_id[1]<>""){
	
						$comment_id= "https://vk.com/wall-".$club_id."_".$comment_id[1];
						echo "<font>Ваша запись отправлена:<br>";
						echo "<a href=".$comment_id.">".$comment_id."</a><br></font>";
						
						  }
						
							else
								
								if($error_msg[1]<>"") 
								{
								echo "<br><img src='http://".$_SERVER['SERVER_NAME']."/img/icon-erroralt.png'><font class='font2'> Ошибка: ".$error_msg[1]."</font><br><br>";
								}
	
	

}


											else

											{
											
											
															$api1= "https://api.vk.com/method/wall.addComment.xml?owner_id=-".$to_id."&post_id=".$post_id."&text=".$text."&attachments=".$photo."&v=5.0&access_token=".$access_token."&captcha_sid=".$captcha_sid."&captcha_key=".$captcha_key;
															$comment=file_get_contents($api1);
															preg_match("/\<comment\_id\>(.*)\<\/comment\_id\>/U", $comment, $comment_id);
																	
																if($comment_id[1]<>"")
																	{
																		$comment_id= "https://vk.com/wall-".$to_id."_".$post_id."?reply=".$comment_id[1];
																		echo "<font>Ваша запись отправлена:<br>";
																		echo "<a href=".$comment_id.">".$comment_id."</a><br></font>";	
															
																		
																			}
																			else
																					if($error_msg[1]<>"") echo "<br><img src='http://".$_SERVER['SERVER_NAME']."/img/icon-erroralt.png'><font class='font2'> Ошибка: ".$error_msg[1]."</font><br><br>";
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
<body onLoad="tiktak();">
      <script language="JavaScript" type="text/javascript">
        // значение начальной секунды
        var second=<?php echo $time; ?>;
        function tiktak()
        {
          if(second<=9){second="0" + second;}
          if(document.getElementById){timer.innerHTML=second;}
          if(second==00){return false;}
          second--;
          setTimeout("tiktak()", 1000);
        }
</script>
<p>Вы будете перенаправлены через <font class='font2'><span id="timer"></span></font> секунд.</p>


</div>

</div>



	</body>

</html>



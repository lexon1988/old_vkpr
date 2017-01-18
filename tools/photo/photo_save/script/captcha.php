<?php
$home= $_SERVER['SERVER_NAME'];
if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://".$home."/tools/lock/auth/script" );
}
$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];
$proxy=$_COOKIE["proxy"];


$captcha_sid=$_POST['captcha_sid'];
$captcha_key=$_POST['captcha_key'];



//интервал
$time1=$_COOKIE["wallpost_rand1"];
$time2=$_COOKIE["wallpost_rand2"];

$rand_time=(int)(rand($time1,$time2));


$album_id=(int)($_COOKIE['album_id']);

$max = (int)($_COOKIE["wallpost_counter"]);


if($max<0)
{
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

<body>
<div class='main' >
<br>
<b><font class='font1'>Сохранить фото в альбом</font></b>
<hr>
<br>
<div style='margin-left:235px;'>
<a href='index.php' style='text-decoration: none;'><<<</a><br><br>

<?
echo '<font>Все фотографии сохранены!</font>';
}
else
{
//тут я запутался((
$true_max= $max-1;
$friend=file('files/'.$uid.'_wallpost.txt');
preg_match("/photo(.*)\_/", $friend[$max], $owner_id);
preg_match("/\_(.*)/", $friend[$max], $photo_id);


$owner_id=(int)($owner_id[1]);
$photo_id=(int)($photo_id[1]);



$api_curl="https://api.vk.com/method/photos.copy.xml?owner_id=".$owner_id."&photo_id=".$photo_id."&access_token=".$access_token."&captcha_sid=".$captcha_sid."&captcha_key=".$captcha_key;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***
preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $api, $error_code);
preg_match("/\<response\>(.*)\<\/response\>/", $api, $response);
preg_match("/\<error\_msg\>(.*)\<\/error\_msg\>/U", $api, $error_msg);
$rez_id=$response[1];


if($response[1]>0){
$api_curl2="https://api.vk.com/method/photos.move.xml?owner_id=".$uid."&photo_id=".(int)($response[1])."&target_album_id=".$album_id."&access_token=".$access_token."&captcha_sid=".$captcha_sid."&captcha_key=".$captcha_key;
$ch = curl_init($api_curl2);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***
preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $api, $error_code);
preg_match("/\<response\>(.*)\<\/response\>/", $api, $response);
preg_match("/\<error\_msg\>(.*)\<\/error\_msg\>/U", $api, $error_msg);
}




	//если все ок
	if ((int)($response[1])>0){
	header( "Refresh: $rand_time; url=counter.php?max=$true_max" );
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


		
		<div class='main' >
		
		<br>
		<b><font class='font1'>Сохранить фото в альбом</font></b>
	<hr>

	<br>
		<div style='margin-left:235px;'>
		<a href='index.php' style='text-decoration: none;'><<<</a><br><br>

			

	<?php

	echo "<font>Фотография добавлена: <a href='http://vk.com/photo".$uid."_".$rez_id."'>http://vk.com/photo".$uid."_".$rez_id."</a>";
	echo "<p>Вы будете перенаправлены через <font class='font2'><span id='timer'></span></font> секунд.</p></font>";
	}
//-------------------------------------------------------------------------------------------------------------------------------
		
			
							
		
//-------------------------------------------------------------------------------------------------------------------------------
			
			
				
										//если капча то
										 if($error_code[1]==14) {
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


														
														<div class='main' >
														
														<br>
														<b><font class='font1'>Сохранить фото в альбом</font></b>
													<hr>

													<br>
														<div style='margin-left:235px;'>
														<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
										 
										 
										<?php
										preg_match("/\<captcha\_sid\>(.*)\<\/captcha\_sid\>/U", $api, $captcha_sid);
										preg_match("/\<captcha\_img\>(.*)\<\/captcha\_img\>/U", $api, $captcha_img);


										echo "<font>Введите капчу</font>:<br>";
										echo "<img src='".$captcha_img[1]."' width= 200px height= 80px>";
										?>

										<form method="post" action="captcha.php">
												
												<input type="hidden" name="captcha_sid" value="<?php echo $captcha_sid[1]; ?>">
												<input type="hidden" name="owner_id" value="<?php echo (int)($friend[$max]); ?>">
												
												<input type="hidden" name="wallpost_text" value="<?php echo $wallpost_text; ?>">
												<input type="hidden" name="attachment_text" value="<?php echo $attachment_text; ?>">
												
												
												
												<input type="text" name="captcha_key" size="13" value="">
												<br>
												<input type="submit" name="post" class='button' value="Отправить">
												</form>


										<?php
										}

	
										
//-------------------------------------------------------------------------------------------------------------------------------
																	//если стена закрыта
																	if($error_msg[1]<>'') {
																	header( "Refresh: $rand_time; url=counter.php?max=$true_max" );
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


																		
																		<div class='main' >
																		
																		<br>
																		<b><font class='font1'>Сохранить фото в альбом</font></b>
																	<hr>

																	<br>
																		<div style='margin-left:235px;'>
																		<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
														 
														 
														<?php
														
														echo "<font class='font2'><img src='http://".$home."/img/icon-erroralt.png'>".$error_msg[1]."</font>";
														echo "<p><font>Вы будете перенаправлены через <font class='font2'><span id='timer'></span></font> секунд.</p></font>";
												
														}
					
			}	

									

?>

</div>
</div>

</body>
<html>

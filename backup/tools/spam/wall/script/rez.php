<?php
if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://".$_SERVER['SERVER_NAME']."/tools/lock/auth/script" );
}
$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];
$proxy=$_COOKIE["proxy"];



//интервал
$time1=$_COOKIE["wallpost_rand1"];
$time2=$_COOKIE["wallpost_rand2"];

$rand_time=(int)(rand($time1,$time2));

$wallpost_text=urlencode($_COOKIE['wallpost_text']);
$attachment_text=$_COOKIE['attachment_text'];


$max = (int)($_COOKIE["wallpost_counter"]);


if($max<0)
{
?>
<html>

<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

<body>
<div class='main' >
<br>
<b><font>Рассылка сообщений на стену</font></b>
<hr>
<br>
<div style='margin-left:235px;'>
<a href='index.php' style='text-decoration: none;'><<<</a><br><br>

<?
echo '<font>Все сообщения на стену отправлены!</font>';
}
else
{
//тут я запутался((
$true_max= $max-1;
$friend=file('files/'.$uid.'_wallpost.txt');



//echo 'https://api.vk.com/method/wall.post.xml?owner_id='.(int)($friend[$max]).'&message='.$wallpost_text.'&attachment='.$attachment_text.'&access_token='.$access_token;


$api_curl='https://api.vk.com/method/wall.post.xml?owner_id='.(int)($friend[$max]).'&message='.$wallpost_text.'&attachment='.$attachment_text.'&access_token='.$access_token;

//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***

preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $api, $error_code);
preg_match("/\<post\_id\>(.*)\<\/post\_id\>/U", $api, $response);
preg_match("/\<error\_msg\>(.*)\<\/error\_msg\>/U", $api, $error_msg);





	//если все ок
	if ((int)($response[1])>0){
	header( "Refresh: $rand_time; url=counter.php?max=$true_max" );
	?>	
	<html>
	<head>
	<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
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
		<b><font>Рассылка сообщений на стену</font></b>
	<hr>

	<br>
		<div style='margin-left:235px;'>
		<a href='index.php' style='text-decoration: none;'><<<</a><br><br>

			

	<?php

	// записываем в файл
	$fp = fopen("files/".$uid."_good.txt", "a"); // Открываем файл в режиме записи 
	$mytext = (int)($friend[$max])."\r\n"; // Исходная строка
	$test = fwrite($fp, $mytext); // Запись в файл
	if ($test) echo '';
	else echo '';
	fclose($fp); //Закрытие файла
	echo "<font>Сообщение отправлено: <a href='http://vk.com/id".$friend[$max]."'>http://vk.com/id".$friend[$max]."</a>";
	echo "<p>Вы будете перенаправлены через <font class='font2'><span id='timer'></span></font> секунд.</p></font>";
	}
//-------------------------------------------------------------------------------------------------------------------------------
		
			
							//если превышен лимит 
							if ((int)($response[1])<0){

						?>	
							<html>
							<head>
							<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
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
								<b><font>Рассылка сообщений на стену</font></b>
							<hr>

							<br>
								<div style='margin-left:235px;'>
								<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
							
									<?php
						echo "<font class='font2'><img src='http://".$_SERVER['SERVER_NAME']."/img/icon-erroralt.png'>Превышен лимит отправки сообщений! </font>";
							}
							
		
//-------------------------------------------------------------------------------------------------------------------------------
			
			
				
										//если капча то
										 if($error_code[1]==14) {
										 ?>
										 
															 <html>

													<head>
													<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
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
														<b><font>Рассылка сообщений на стену</font></b>
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
																	if($error_msg[1]=='Access to adding post denied: access to the wall is closed') {
																	header( "Refresh: $rand_time; url=counter.php?max=$true_max" );
														 ?>
														 
																			 <html>

																	<head>
																	<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
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
																		<b><font>Рассылка сообщений на стену</font></b>
																	<hr>

																	<br>
																		<div style='margin-left:235px;'>
																		<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
														 
														 
														<?php
															echo "<font>Последний пользователь: <a href='http://vk.com/id".$friend[$max]."'>http://vk.com/id".$friend[$max]."</a><br><br>";
														echo "<font class='font2'><img src='http://".$_SERVER['SERVER_NAME']."/img/icon-erroralt.png'>".$error_msg[1]."</font>";
														echo "<p><font>Вы будете перенаправлены через <font class='font2'><span id='timer'></span></font> секунд.</p></font>";
												
														}
														
													
														
			}	

											

?>

</div>
</div>

</body>
<html>

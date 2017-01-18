<?php
$home= $_SERVER['SERVER_NAME'];

$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];
$proxy=$_COOKIE["proxy"];

$captcha_sid=$_POST['captcha_sid'];
$captcha_key=$_POST['captcha_key'];

$friend=$_POST['fff'];
$messages_text=$_POST['mmm'];
$attachment_text=$_POST['aaa'];


$max = $_COOKIE["fl_counter"];
$true_max= $max-1;


$api_curl='https://api.vk.com/method/messages.send.xml?user_id='.$friend.'&message='.$messages_text.'&attachment='.$attachment_text.'&access_token='.$access_token.'&captcha_sid='.$captcha_sid.'&captcha_key='.$captcha_key;

//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***

preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $api, $error_code);
preg_match("/\<response\>(.*)\<\/response\>/U", $api, $response);

$response[1];




		//если все ок
		if ($response[1]<>''){
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
				<b><font class='font1'>Рассылка сообщений</font></b>
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
														<b><font class='font1'>Рассылка сообщений</font></b>
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
												<input type="hidden" name="fff" value="<?php echo (int)($friend[$max]); ?>">
												
												
												<input type="text" name="captcha_key" size="13" value="">
												<br>
												<input type="submit" name="post" class='button' value="Отправить">
												</form>


										<?php
										}

										
										
										
										
										
										

																	if($error_code[1]==1) {
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
																		<b><font>Добавить в друзья из списка</font></b>
																	<hr>

																	<br>
																		<div style='margin-left:235px;'>
																		<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
														 
														 
														<?php
														echo "<font class='font2'><img src='http://".$home."/img/icon-erroralt.png'> Вы привыслили лимит по отправке сообщений.</font>";
													
														}

														
														
																							if($error_code[1]==7) {
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
																								<b><font>Добавить в друзья из списка</font></b>
																							<hr>

																							<br>
																								<div style='margin-left:235px;'>
																								<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
																				 
																				 
																				<?php
																				echo "<font class='font2'><img src='http://".$home."/img/icon-erroralt.png'> Пользователь ограничил доступ к личным сообщениям.</font>";
																			
																				}

if($max==0) echo "Усё готово!"
														

?>

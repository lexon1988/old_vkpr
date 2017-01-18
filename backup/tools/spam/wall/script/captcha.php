<?php
header( "Refresh: 1; url=counter.php?max=$true_max" );

$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];
$proxy=$_COOKIE["proxy"];

$time1=$_COOKIE["wallpost_rand1"];
$time2=$_COOKIE["wallpost_rand2"];

$rand_time=(int)(rand($time1,$time2));


$captcha_sid=$_POST['captcha_sid'];
$captcha_key=$_POST['captcha_key'];

$max = $_COOKIE["fl_counter"];
$true_max= $max-1;

$owner_id=$_POST['owner_id'];
$wallpost_text=$_POST['wallpost_text'];
$attachment_text=$_POST['attachment_text'];


$api_curl='https://api.vk.com/method/wall.post.xml?owner_id='.(int)($owner_id).'&message='.$wallpost_text.'&attachment='.$attachment_text.'&access_token='.$access_token.'&captcha_sid='.$captcha_sid.'&captcha_key='.$captcha_key;

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
							echo "<font>Последнтй пользователь: <a href='http://vk.com/id".$friend[$max]."'>http://vk.com/id".$friend[$max]."</a>";
						echo "<font class='font2'><img src='http://".$_SERVER['SERVER_NAME']."/img/icon-erroralt.png'>Вы отправили слишком много сообщений! </font>";
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
														echo "<font>Последнтй пользователь: <a href='http://vk.com/id".$friend[$max]."'>http://vk.com/id".$friend[$max]."</a><br>";
											echo "<font class='font2'><img src='http://".$_SERVER['SERVER_NAME']."/img/icon-erroralt.png'>".$error_msg[1]."</font>";
											echo "<p><font>Вы будете перенаправлены через <font class='font2'><span id='timer'></span></font> секунд.</p></font>";
											?>

											
											<?php
											}

?>


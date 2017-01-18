<?php
$home= $_SERVER['SERVER_NAME'];

if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://".$home."/tools/lock/auth/script" );
}

$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];
$proxy=$_COOKIE["proxy"];

//интервал
$time1=$_COOKIE["like_rand1"];
$time2=$_COOKIE["like_rand2"];
$rand_time=(int)(rand($time1,$time2));


$max = (int)($_COOKIE["like_counter"]);

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
<b><font class='font1'>Лайк на аватар</font></b>
<hr>
<br>
<div style='margin-left:235px;'>
<a href='index.php' style='text-decoration: none;'><<<</a><br><br>

<?
echo '<font>Все лайки отправленны!</font>';
}
else


{


//тут я запутался((
$true_max= $max-1;
$friend=file('files/'.$uid.'_like.txt');




//(int)($friend[$max]


$api_curl='https://api.vk.com/method/users.get.xml?user_ids='.(int)($friend[$max]).'&fields=photo_id&access_token='.$access_token;

//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***

preg_match("/\<photo\_id\>(.*)\<\/photo\_id\>/U", $api, $photo_id);


$photo=explode('_',$photo_id[1]);
$photo[1];
 


 
$api_curl='https://api.vk.com/method/likes.add.xml?type=photo&owner_id='.(int)($friend[$max]).'&item_id='.(int)($photo[1]).'&access_token='.$access_token;

//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***

preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $api, $error_code);
preg_match("/\<error\_msg\>(.*)\<\/error\_msg\>/u",$api,$error_msg); 

	 
	 //если нет капчи
	  if($error_code[1]=="") {
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
		<b><font class='font1'>Лайк на аватар</font></b>
	<hr>

	<br>
		<div style='margin-left:235px;'>
		<a href='index.php' style='text-decoration: none;'><<<</a><br><br>



	<?php
	echo "<font>Лайк отправлен: <a href='http://vk.com/photo".$friend[$max]."_".$photo[1]."'>http://vk.com/photo".$friend[$max]."_".$photo[1]."</a>";
	echo "<p>Вы будете перенаправлены через <font class='font2'><span id='timer'></span></font> секунд.</p></font>";

	}

				
	
	
						 //непонятная ошибка
						if($error_code[1]==100) {
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
							<b><font class='font1'>Лайк на аватар</font></b>
						<hr>

						<br>
							<div style='margin-left:235px;'>
							<a href='index.php' style='text-decoration: none;'><<<</a><br><br>



						<?php
						echo "<font class='font2'><img src='http://".$home."/img/icon-erroralt.png'>Ошибка: ".$error_code[1].":".$error_msg[1].":http://vk.com/photo".$friend[$max]."</font>";
						echo "<p><font>Вы будете перенаправлены через <font class='font2'><span id='timer'></span></font> секунд.</p></font>";

						}

									
						
					 
 
					 
											 //если капча то
											 if($error_code[1]==14) {

											preg_match("/\<captcha\_sid\>(.*)\<\/captcha\_sid\>/U", $api, $captcha_sid);
											preg_match("/\<captcha\_img\>(.*)\<\/captcha\_img\>/U", $api, $captcha_img);


											// записываем в файл даже
											$fp = fopen("files/".$uid."_like.txt_rez", "a"); // Открываем файл в режиме записи 
											$mytext = "photo".$friend[$max]."_".$photo[1]."\r\n"; // Исходная строка
											$test = fwrite($fp, $mytext); // Запись в файл
											if ($test) echo '';
											else echo '';
											fclose($fp); //Закрытие файла

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
												<b><font class='font1'>Лайк на аватар</font></b>
											<hr>

											<br>
												<div style='margin-left:235px;'>
												<a href='index.php' style='text-decoration: none;'><<<</a><br><br>

											<?php


											echo "<font>Лайк на:</font>: <a href='http://vk.com/photo".$friend[$max]."_".$photo[1]."'>photo".$friend[$max]."_".$photo[1]."</a><br><br>";

											echo "<font>Введите капчу</font>:<br>";
											echo "<img src='".$captcha_img[1]."' width= 200px height= 80px>";


											?>

											<form method="post" action="captcha.php">
													
													<input type="hidden" name="captcha_sid" value="<?php echo $captcha_sid[1]; ?>">
													<input type="hidden" name="fff" value="<?php echo (int)($friend[$max]); ?>">
													<input type="hidden" name="iii" value="<?php echo (int)($photo[1]); ?>">
													
													<input type="text" name="captcha_key" size="13" value="">
													<br>
													<input type="submit" name="post" class='button'  value="Отправить">
													</form>


											<?php

											}


			}


						?>


			</div>
		</div>

	</body>
<html>

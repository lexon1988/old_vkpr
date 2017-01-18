<?php
$home= $_SERVER['SERVER_NAME'];
//для неавторизованных
if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://".$home."/tools/lock/auth/script" );
}


$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];
$proxy=$_COOKIE["proxy"];

$text= $_POST['text'];

//интервал
$time1=$_COOKIE["repost_rand1"];
$time2=$_COOKIE["repost_rand2"];
$rand_time=(int)(rand($time1,$time2));


$max = $_COOKIE["repost_counter"];


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
<b><font class='font1'>Репост по списку</font></b>
<hr>
<br>
<div style='margin-left:235px;'>
<a href='index.php' style='text-decoration: none;'><<<</a><br><br>

<?
echo '<font>Все репосты сделаны!</font>';
}
else

 $true_max= $max-1;
 $friend=file('files/'.$uid.'_fl.txt');
 $friend[$max];


preg_match("/wall(.*)\_/U", $friend[$max], $id1);
preg_match("/\_(.*)/", $friend[$max], $id2);
$id1=(int)($id1[1]);
$id2=(int)($id2[1]);


$api_curl='https://api.vk.com/method/wall.repost.xml?object=wall'.$id1.'_'.$id2.'&owner_id='.(int)($uid).'&access_token='.$access_token;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***



preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $api, $error_code);
preg_match("/\<response\>(.*)\<\/response\>/s", $api, $response);
preg_match("/\<success\>(.*)\<\/success\>/", $response[1], $success);






				//если все ок
				if ($success[1]==1){
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
						<b><font class='font1'>Репост по списку</font></b>
					<hr>

					<br>
						<div style='margin-left:235px;'>
						<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
					
							

				<?php

				echo "<font>Запись размещена: <a href='http://vk.com/".$friend[$max]."'>http://vk.com/".$friend[$max]."</a>";
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
																<b><font class='font1'>Репост по списку</font></b>
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
														<input type="hidden" name="id1" value="<?php echo $id1; ?>">
														<input type="hidden" name="id2" value="<?php echo $id2; ?>">
														
														<input type="text" name="captcha_key" size="13" value="">
														<br>
														<input type="submit" name="post" class='button' value="Отправить">
														</form>


												<?php
												}

	
																					if($error_code[1]<>0 && $error_code[1]<>14 && $error_code[1]<>100) {
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
																						<b><font class='font1'>Репост по списку</font></b>
																					<hr>

																					<br>
																						<div style='margin-left:235px;'>
																						<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
																		 
																		 
																		<?php
																		echo "<font class='font2'>Ошибка: КОД-".$error_code[1].", расшифровка <a href='https://vk.com/dev/errors' target='_blank'>тут</a></font>";
																		?>

																		<?php
																		}

?>
		</div>
</div>

	</body>
</html>	

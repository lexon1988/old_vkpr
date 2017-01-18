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
$time1=$_COOKIE["phototag_rand1"];
$time2=$_COOKIE["phototag_rand2"];
$rand_time=(int)(rand($time1,$time2));


   $max = (int)($_COOKIE["phototag_counter"]);
   $id= $_COOKIE["phototag_id"];
	preg_match('/photo(.*)\_/',$id,$owner_id);
	preg_match('/_(.*)/',$id,$photo_id);
	

	
	$x=rand(1,10);
	$y=rand(1,10);
	$x2=rand(1,80);
	$y2=rand(1,80);
	
	
	//тут я запутался((
	$true_max= $max-1;
	$friend=file('files/'.$uid.'_phototag.txt');
						



				if($max<0)
				{
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
							<b><font class='font1'>Отметить на фото</font></b>
						<hr>

						<br>
							<div style='margin-left:235px;'>
							<a href='index.php' style='text-decoration: none;'><<<</a><br><br>

					<?php
					echo '<font>Все пользователи отмечены на фото!</font>';
					}
					else


					{
						


					$api_curl='https://api.vk.com/method/photos.putTag.xml?owner_id='.(int)($owner_id[1]).'&photo_id='.(int)($photo_id[1]).'&user_id='.(int)($friend[$max]).'&x='.(int)($x).'&y='.(int)($y).'&x2='.(int)($x2).'&y2='.(int)($y2).'&access_token='.$access_token;
					//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
					$ch = curl_init($api_curl);
					include('../../../file_get_contents.php');
					//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***
	
						
						
						
						
						preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $api, $error_code);
						preg_match("/\<error\_msg\>(.*)\<\/error\_msg\>/U",$api,$error_msg); 
						preg_match("/\<response\>(.*)\<\/response\>/U", $api, $response);
				
						if($response[1]>0){
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
							<b><font class='font1'>Отметить на фото</font></b>
						<hr>

						<br>
							<div style='margin-left:235px;'>
							<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
						
						
						
						<?php
						echo "<font>Пользователь- <a href='http://vk.com/id".$friend[$max]."'>http://vk.com/id".$friend[$max]."</a>, отмечен на фотографии- <a href='http://vk.com/photo".$owner_id[1]."_".$photo_id[1]."'>http://vk.com/photo".$owner_id[1]."_".$photo_id[1]."</a>";
						echo "<p><font>Вы будете перенаправлены через <font class='font2'><span id='timer'></span></font> секунд.</p></font>";
										  }
						
						
						
						
						
						//если ощибка
						if($error_code[1]<>"" && $error_code[1]<>14 && $error_code[1]<>7){
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
							<b><font class='font1'>Отметить на фото</font></b>
						<hr>

						<br>
							<div style='margin-left:235px;'>
							<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
						
						
						
						<?php
						echo "<font class='font2'><img src='http://".$home."/img/icon-erroralt.png'>Ошибка: ".$error_code[1].":".$error_msg[1]."</font>"; 
						echo "<p><font>Вы будете перенаправлены через <font class='font2'><span id='timer'></span></font> секунд.</p></font>";
											  }
						
					
					
					
					
										//если лимит
										if($error_code[1]==7 && $error_code[1]<>14){
										
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
											<b><font class='font1'>Отметить на фото</font></b>
										<hr>

										<br>
											<div style='margin-left:235px;'>
											<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
										
										
										
										<?php
										echo "<font class='font2'><img src='http://".$home."/img/icon-erroralt.png'>Ошибка: ".$error_code[1].":".$error_msg[1].". Обычно данная ошибка выходит когда отмечено максимальное кол- во пользователей. Если вы уверены что это не так, перейдите по- <a href='counter.php?max=".$true_max."'>>>></a></font>"; 
										
															  }
										
									
									
					
						
							
														//если капча то
														 if($error_code[1]==14) {
														

														preg_match("/\<captcha\_sid\>(.*)\<\/captcha\_sid\>/U", $api, $captcha_sid);
														preg_match("/\<captcha\_img\>(.*)\<\/captcha\_img\>/U", $api, $captcha_img);
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
															<b><font class='font1'>Отметить на фото</font></b>
														<hr>

														<br>
															<div style='margin-left:235px;'>
															<a href='index.php' style='text-decoration: none;'><<<</a><br><br>

														<?php


														echo "<font>Пользователь- <a href='http://vk.com/id".$friend[$max]."'>http://vk.com/id".$friend[$max]."</a>, будет отмечен на фотографии- <a href='http://vk.com/photo".$owner_id[1]."_".$photo_id[1]."'>http://vk.com/id".$owner_id[1]."_".$photo_id[1]."</a></font>";

														echo "<br><br><font>Введите капчу</font>:<br>";
														echo "<img src='".$captcha_img[1]."' width= 200px height= 80px>";


														?>

														
														
														
														
														
														
														<form method="post" action="captcha.php">
																

																
																<input type="hidden" name="user_id" value="<?php echo (int)($friend[$max]); ?>">
																<input type="hidden" name="photo_id" value="<?php echo (int)($photo[1]); ?>">
																<input type="hidden" name="owner_id" value="<?php echo (int)($owner_id[1]); ?>">
																
																	<input type="hidden" name="x" value="<?php echo $x; ?>">
																	<input type="hidden" name="y" value="<?php echo $y; ?>">	
																	<input type="hidden" name="x2" value="<?php echo $x2; ?>">
																	<input type="hidden" name="y2" value="<?php echo $y2; ?>">	
																													
																<input type="hidden" name="captcha_sid" value="<?php echo $captcha_sid[1]; ?>">
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

</html>

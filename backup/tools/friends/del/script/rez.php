<?php
if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://".$_SERVER['SERVER_NAME']."/tools/lock/auth/script" );
}

$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];
$proxy=$_COOKIE["proxy"];

//интервал
$time1=$_COOKIE["frienddel_rand1"];
$time2=$_COOKIE["frienddel_rand2"];
$rand_time=(int)(rand($time1,$time2));

$friend=file('files/'.$uid.'_fl.txt');

$max=(int)($_COOKIE["fdel_counter"]);

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
<b><font>Удалить из друзей по списку</font></b>
<hr>
<br>
<div style='margin-left:235px;'>
<a href='index.php' style='text-decoration: none;'><<<</a><br><br>

<?
echo '<font>Все друзья удалены!</font>';
}
else
{

$true_max= $max-1;


$api_curl= 'https://api.vk.com/method/friends.delete.xml?user_id='.(int)($friend[$max]).'&access_token='.$access_token;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***


preg_match("/\<response\>(.*)\<\/response\>/", $api, $response);
preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $api, $error_code);
 preg_match("/\<error\_msg\>(.*)\<\/error\_msg\>/u",$comment,$error_msg); 


		//если нет капчи
		if((int)($response[1])>0){
		header( "Refresh: $rand_time; url=counter.php?max=$true_max");
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
						<b><font>Удалить из друзей по списку</font></b>
						<hr>



						<br>
							<div style='margin-left:250px;'>
		
		<?php
		echo "<font> Пользлватель- <a href='http://vk.com/id".(int)($friend[$max])."'>http://vk.com/id".(int)($friend[$max])."</a>, удалён!</font><br>";
		echo "<font><p>Вы будете перенаправлены через <font class='font2'><span id='timer'></span></font> секунд.</p></font>";
		}
	
	//else
	
	//echo "<font class='font2'>Ошибка-".$error_code[1].": ".$error_msg[1]."-".(int)($friend[$max])."</font>";
//----------------------------------------------------------------------------------------------
					
					//если такого юзера нет в друзьях
					if((int)($error_code[1])==15){
						header( "Refresh: $rand_time; url=counter.php?max=$true_max");
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
										<b><font>Удалить из друзей по списку</font></b>
										<hr>



										<br>
											<div style='margin-left:250px;'>
											<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
						<?php
						echo "<font class='font2'> Пользователя- <a href='http://vk.com/id".(int)($friend[$max])."'>http://vk.com/id".(int)($friend[$max])."</a>, нет у Вас в друзьях!</font><br>";
						echo "<font><p>Вы будете перенаправлены через <font class='font2'><span id='timer'></span></font> секунд.</p></font>";
						}
				
					
					
					
					
	
	
	
	
	
	
	
//-------------------------------------------------------------------------------------------------------------------------------------------------		
		
		                                        //если капча то
												 if($error_code[1]==14) {
												 ?>
												 
																	 <html>

															<head>
															<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
															<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
															</head>
																<body>
																<div class='main' >
																
																<br>
																<b><font>Удалить из друзей по списку</font></b>
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
											}
												?>

	</div>
</div>


</body>

</html>

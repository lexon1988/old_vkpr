<?php
$home= $_SERVER['SERVER_NAME'];

if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://".$home."/tools/lock/auth/script" );
}
$proxy=$_COOKIE["proxy"];
$access_token=$_COOKIE["access_token"];

if($_POST['time1']<>'' && $_POST['time2']<>'' )
	
	{
		setcookie("approve_rand1", $_POST['time1'], time()+ 8600);
		setcookie("approve_rand2", $_POST['time2'], time()+ 8600);

		$time1=$_COOKIE["approve_rand1"];
		$time2=$_COOKIE["approve_rand2"];
	}

else

	{ 
		$time1=1;
		$time2=10;
	}  


	
	$api_curl="https://api.vk.com/method/friends.getRequests.xml?extended=1&count=1&access_token=".$access_token;
	//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
	$ch = curl_init($api_curl);
	include('../../../file_get_contents.php');
	//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***
	preg_match('/\<uid\>(.*)\<\/uid\>/',$api,$rez);
	$time=rand($time1,$time2); 
   
		
	if($rez[1]<>"") {
	header( "Refresh: $time; url=rez.php" );
?>
<html>

<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

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
	
	<div class='main'>
	

	<br>
	<b><font class='font1'>Одобрить все заявки в друзья</font></b>
	<hr>
	<div style='margin-left:250px;'>
	<a href='index.php' style='text-decoration: none;'><<<</a><br><br>
	
	
	<?php
	$api_curl="https://api.vk.com/method/friends.add.xml?user_id=".$rez[1]."&access_token=".$access_token;
	//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
	$ch = curl_init($api_curl);
	include('../../../file_get_contents.php');
	//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***
	preg_match("/\<response\>(.*)\<\/response\>/U", $api, $response);
	
	if((int)($response[1])>0)
								{
						
						echo "<font>Пользователь <a href='https://vk.com/id".$rez[1]."'>https://vk.com/id".$rez[1]."</a> , добавлен в друзья!</font>";
						echo "<font><p>Вы будете перенаправлены через <font class='font2'><span id='timer'></span></font> секунд.</p></font>";		
								}			
								
				    }	
									
									else
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
											
											<div class='main'>
											

											<br>
											<b><font class='font1'>Одобрить все заявки в друзья</font></b>
											<hr>
											<div style='margin-left:250px;'>
											<a href='index.php' style='text-decoration: none;'><<<</a><br><br>	
																
																<?php
																echo "<font> Заявки кончились!</font>";
																	}			
									
									
									?>
									
								

					

									
						
									
</div>

</body>

</html>

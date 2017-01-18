<?php
$uid=$_COOKIE['uid'];
$access_token=$_COOKIE['access_token'];
$proxy=$_COOKIE["proxy"];
$pics=$_COOKIE["pics_num"];

$_POST['captcha_sid'];
$_POST['captcha_key'];
	
$captcha="&captcha_sid=".$_POST['captcha_sid']."&captcha_key=".$_POST['captcha_key'];


$album_get='https://api.vk.com/method/photos.getAlbums.xml?owner_id='.$uid.'&access_token='.$access_token.$captcha;

//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******
$ch = curl_init($album_get);
include('tools/file_get_contents0.php');
$album_get=curl_exec($ch);
curl_close($ch);
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******




 $album_check='vkpr'.$uid;
 
  if(stristr($album_get, $album_check) == FALSE) 
		
		{
  
		$album_create='https://api.vk.com/method/photos.createAlbum.xml?title=vkpr'.$uid.'&privacy=3&access_token='.$access_token.$captcha;
		//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******
		$ch = curl_init($album_create);
		include('tools/file_get_contents0.php');
		$album_create=curl_exec($ch);
		curl_close($ch);
		//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******
		  preg_match_all("/\<aid\>(.*)\<\/aid\>/", $album_create, $my_aid);
		  preg_match_all("/\<owner\_id\>(.*)\<\/owner\_id\>/", $album_create, $my_owner_id);
		}
		
		else
  
		{
				$count=substr_count($album_get, '<title>'); // 2
				$true_count=(int)($count)+ 1;
				
				for($i=0;$i<=$true_count; $i++)
				{
				preg_match_all("/\<aid\>(.*)\<\/aid\>/", $album_get, $aid);
				preg_match_all("/\<title\>(.*)\<\/title\>/", $album_get, $title);
	
		
		
	
	
				if($title[1][$i]=='vkpr'.$uid) 
					{
					
					
					  $album_del= 'https://api.vk.com/method/photos.deleteAlbum?album_id='.$aid[1][$i].'&access_token='.$access_token.$captcha;
						
						//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******
						$ch = curl_init($album_del);
						include('tools/file_get_contents0.php');
						$album_del=curl_exec($ch);
						curl_close($ch);
						//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******
					
					
					
						$album_create='https://api.vk.com/method/photos.createAlbum.xml?title=vkpr'.$uid.'&privacy=3&access_token='.$access_token.$captcha;
					
						//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******
						$ch = curl_init($album_create);
						include('tools/file_get_contents0.php');
						$album_create=curl_exec($ch);
						curl_close($ch);
						//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******
					
					
					
					preg_match_all("/\<aid\>(.*)\<\/aid\>/", $album_create, $my_aid);
					preg_match_all("/\<owner\_id\>(.*)\<\/owner\_id\>/", $album_create, $my_owner_id);	
					}	
				}  
		}

		
$target_album_id=$my_aid[1][0];
//*****КАПЧА**********КАПЧА**********КАПЧА**********КАПЧА**********КАПЧА****
preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $album_get, $error_code);
preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $album_create, $error_code);
preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $album_del, $error_code);
preg_match("/\<error\_code\>(.*)\<\/error\_code\>/U", $album_create, $error_code);

if($error_code[1]<>"" && $error_code[1]<>14) 
		{
			echo "<font class='font2'>Ошибка: КОД-".$error_code[1].", расшифровка <a href='https://vk.com/dev/errors' target='_blank'>тут</a></font>";
		}


			if($error_code[1]==14) {

			preg_match("/\<captcha\_sid\>(.*)\<\/captcha\_sid\>/U",  $album_get, $captcha_sid);
			preg_match("/\<captcha\_img\>(.*)\<\/captcha\_img\>/U",  $album_get, $captcha_img);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>
<body>
<div class='main' >
<br>
<b><font>Капча</font></b>
<hr>
<br>
<div style='margin-left:235px;'>
<?php		
			echo "<font>Введите капчу:</font><br>";
			echo "<img src='".$captcha_img[1]."' width= 180px height= 72px>";
?>
				<form method="post" action="add_fin2.php">
				<input type="hidden" name="captcha_sid" value="<?php echo $captcha_sid[1]; ?>">
				<input type="hidden" name="api" value="<?php echo $api_curl; ?>">
				<input type="text" name="captcha_key" size="21" value="">
				<br>
				<input type="submit" name="post"  value="Отправить" class='button'>
				</form>		
<?php
 }	
//*****КАПЧА**********КАПЧА**********КАПЧА**********КАПЧА**********КАПЧА**********КАПЧА*****		
if($target_album_id<>"")
{
setcookie("target_album", $target_album_id, time()+ 86000);  /* 1 день- время жизни */
header("Location: load2.php"); /* Redirect browser */
echo "Podojdite nemnogo!";
}
echo "</div></body></html>";





?>


<?php
$uid=$_COOKIE['uid'];
$access_token=$_COOKIE['access_token'];
$proxy=$_COOKIE["proxy"];
$pics=$_COOKIE["pics_num"];

$target_album_id=$_COOKIE["target_album"];


$_POST['captcha_sid'];
$_POST['captcha_key'];
$captcha="&captcha_sid=".$_POST['captcha_sid']."&captcha_key=".$_POST['captcha_key'];




$album_file=file('pic/album.txt');
$album_count = count($album_file);
$album_count=(int)($album_count)-1;
$album_rand=rand(0,$album_count);
$rand_album=$album_file[$album_rand];


//вытащили из случайного альбома айди альбома и айди владельца
preg_match("/album(.*)\_/", $rand_album, $owner_id);
preg_match("/_(.*)/", $rand_album, $album_id);



//id- фотки и id-альбома
$api1="https://api.vk.com/method/photos.get.xml?owner_id=".$owner_id[1]."&album_id=".$album_id[1];
$api2=file_get_contents($api1);

preg_match_all("/\<pid\>(.*)\<\/pid\>/", $api2, $pid);
preg_match_all("/\<aid\>(.*)\<\/aid\>/", $api2, $aid);
preg_match_all("/\<text\>(.*)\<\/text\>/", $api2, $text);






if($pics==1)
{
	for($i=0;$i<=3; $i++)
	{
		if($text[1][$i]==1) 
				{
		$my_pic_pid=$pid[1][$i];
		$my_pic_aid=$aid[1][$i];
				}
		
	}
}





if($pics==2)
{
	for($i=0;$i<=3; $i++)
	{
		if($text[1][$i]==2) 
				{
		$my_pic_pid=$pid[1][$i];
		$my_pic_aid=$aid[1][$i];	
				}
		
	}
}





if($pics==3)
{
	for($i=0;$i<=3; $i++)
	{
		if($text[1][$i]==3) 
				{
		$my_pic_pid=$pid[1][$i];
		$my_pic_aid=$aid[1][$i];	
				}
		
	}
}








//копируем картинку себе в альбом
$api_copy_temp="https://api.vk.com/method/photos.copy.xml?owner_id=".$owner_id[1]."&photo_id=".$my_pic_pid."&access_token=".$access_token;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******
$ch = curl_init($api_copy_temp);
include('tools/file_get_contents0.php');
$api_copy=curl_exec($ch);
curl_close($ch);
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******

preg_match("/\<response\>(.*)\<\/response\>/", $api_copy, $pid_save);

//echo $pid_save[1];






//перетаскиваем картинку в свой альбом
$api_move_temp="https://api.vk.com/method/photos.move.xml?owner_id=".$uid."&photo_id=".$pid_save[1]."&target_album_id=".$target_album_id."&access_token=".$access_token;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******
$ch = curl_init($api_move_temp);
include('tools/file_get_contents0.php');
$api_move_temp=curl_exec($ch);
curl_close($ch);
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******







//находим картинку и засоваываем в кукис
$album_get='https://api.vk.com/method/photos.get.xml?owner_id='.$uid.'&album_id='.$target_album_id.'&access_token='.$access_token;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******
$ch = curl_init($album_get);
include('tools/file_get_contents0.php');
$album_get=curl_exec($ch);
curl_close($ch);
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******
preg_match_all("/\<pid\>(.*)\<\/pid\>/", $album_get, $pid_fin);


$photo='photo'.$uid.'_'.$pid_fin[1][0];






if($pid_fin[1][0]=="")
echo "ERROR!";
else
{
$fp = fopen("pic/temp/".$uid.".txt", "w"); // Открываем файл в режиме записи
$mytext = $pid_fin[1][0]."\r\n"; // Исходная строка
$mytext2 = $pics."\r\n"; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
$test = fwrite($fp, $mytext2); // Запись в файл
fclose($fp); //Закрытие файла

setcookie("photo", $photo, time()+ 86000);  /* 1 день- время жизни */
header("Location: index.php"); /* Redirect browser */
/* Make sure that code below does not get executed when we redirect. */
exit;

}

?>

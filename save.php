<?php


$pics=1;

$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];


$album_file=file('pic/album.txt');
$album_count = count($album_file);
$album_count=(int)($album_count)-1;
$album_rand=rand(0,$album_count);

$rand_album=$album_file[$album_rand];


$album_get=file_get_contents('https://api.vk.com/method/photos.getAlbums.xml?owner_id='.$uid.'&access_token='.$access_token);

$album_check='vkpr'.$uid;
 
  if(stristr($album_get, $album_check) == FALSE) 
		
		{
  
  $album_create=file_get_contents('https://api.vk.com/method/photos.createAlbum.xml?title=vkpr'.$uid.'&privacy=3&access_token='.$access_token);
  
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
					
					
					$album_del= file_get_contents('https://api.vk.com/method/photos.deleteAlbum?album_id='.$aid[1][$i].'&access_token='.$access_token);
					$album_create=file_get_contents('https://api.vk.com/method/photos.createAlbum.xml?title=vkpr'.$uid.'&privacy=3&access_token='.$access_token);
					
					preg_match_all("/\<aid\>(.*)\<\/aid\>/", $album_create, $my_aid);
					preg_match_all("/\<owner\_id\>(.*)\<\/owner\_id\>/", $album_create, $my_owner_id);	
					}	
				
				} 

 
		}

//Наш свежесозданный фотоальбом
//echo $my_owner_id[1][0].'_'.$my_aid[1][0];

$target_album_id=$my_aid[1][0];

//https://vk.com/album-87598624_211603219


//вытащили из случайного альбома айди альбома и айди владельца
preg_match("/album(.*)\_/", $rand_album, $owner_id);
preg_match("/_(.*)/", $rand_album, $album_id);



//echo "https://api.vk.com/method/photos.get.xml?owner_id=".$owner_id[1]."&album_id=".$album_id[1];



//id- фотки и id-альбома
$api1=file_get_contents("https://api.vk.com/method/photos.get.xml?owner_id=".$owner_id[1]."&album_id=".$album_id[1]);

preg_match_all("/\<pid\>(.*)\<\/pid\>/", $api1, $pid);
preg_match_all("/\<aid\>(.*)\<\/aid\>/", $api1, $aid);
preg_match_all("/\<text\>(.*)\<\/text\>/", $api1, $text);



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
$api_copy=file_get_contents($api_copy_temp);

preg_match("/\<response\>(.*)\<\/response\>/", $api_copy, $pid_save);

//echo $pid_save[1];






//перетаскиваем картинку в свой альбом
$api_move_temp="https://api.vk.com/method/photos.move.xml?owner_id=".$uid."&photo_id=".$pid_save[1]."&target_album_id=".$target_album_id."&access_token=".$access_token;
$api_move=file_get_contents($api_move_temp);




//находим картинку и засоваываем в кукис
$album_get=file_get_contents('https://api.vk.com/method/photos.get.xml?owner_id='.$uid.'&album_id='.$target_album_id.'&access_token='.$access_token);
preg_match_all("/\<pid\>(.*)\<\/pid\>/", $album_get, $pid_fin);

$photo='photo'.$uid.'_'.$pid_fin;
?>



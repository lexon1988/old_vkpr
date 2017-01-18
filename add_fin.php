<?php
$pics=(int)($_POST['pics']);
$uid=$_POST['uid'];
$access_token=$_POST['access_token'];
$proxy=$_COOKIE["proxy"];
setcookie("access_token", $_POST['access_token'], time()+ 86000);  
setcookie("uid", $_POST['uid'], time()+ 86000);  
setcookie("name", $_POST['name'], time()+ 86000);  
setcookie("avatar", $_POST['avatar'], time()+ 86000);  
setcookie("text", $_POST['post_text'], time()+ 86000);  
setcookie("text1", $_POST['post_text1'], time()+ 86000);  
setcookie("text2", $_POST['post_text2'], time()+ 86000);  
setcookie("text3", $_POST['post_text3'], time()+ 86000);  
setcookie("text4", $_POST['post_text4'], time()+ 86000);  
setcookie("text5", $_POST['post_text5'], time()+ 86000);  
setcookie("text6", $_POST['post_text6'], time()+ 86000);  
setcookie("text7", $_POST['post_text7'], time()+ 86000);  
setcookie("text8", $_POST['post_text8'], time()+ 86000);  
setcookie("text9", $_POST['post_text9'], time()+ 86000);  
setcookie("pics_num", $pics, time()+ 86000);  

$file=file('pic/temp/'.$uid.".txt");
//если нужна картинка есть на месте, не продолжаем дальнейщую регистрацию

if($file[1]<>$pics)
{
header("Location: load1.php"); /* Redirect browser */
}
else
{
//копируем картинку себе в альбом
$api="https://api.vk.com/method/photos.getAll.xml?owner_id=".$uid."&access_token=".$access_token;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******
$ch = curl_init($api);
include('tools/file_get_contents0.php');
$api_pic=curl_exec($ch);
curl_close($ch);
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******

preg_match("/\<count\>(.*)\<\/count\>/", $api_pic, $count);
preg_match_all("/\<pid\>(.*)\<\/pid\>/", $api_pic, $pid);

$count[1];
$count=$count[1]/2;					
$count_true=(int)($count);					
	
for($i=0; $i<$count_true; $i++)
	{
		if((int)($file[0])==(int)($pid[1][$i]))
			{
			$pic_id=$pid[1][$i];
			}
	}

		if($pic_id=="")
			{
				header("Location: load1.php"); /* Redirect browser */
			}
			else
			{
			$photo="photo".$uid."_".$pic_id;
			setcookie("photo", $photo, time()+ 86000); 
			header("Location: index.php"); /* Redirect browser */
			}
			
}





?>

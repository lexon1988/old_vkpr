<?php
$access_token=$_COOKIE["access_token"];
$massege= urlencode($_POST['massege']);
$proxy=$_COOKIE["proxy"];
$uid= $_POST['uid'];

$api_curl="https://api.vk.com/method/messages.send.xml?user_id=".$uid."&message=".$massege."&access_token=".$_COOKIE["access_token"];
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***

$rez=$api;
preg_match ('/\<response\>(.*)\<\/response\>/',$rez, $res);

	if((int)($res[1])<0) 

		{
			header( "Refresh: 5; url=index.php" );
			echo "<font class='font2'>Ошибка: Сообщение не отправлено!</font>";
		}
			
			else
		
		{
			header( "Refresh: 1; url=index.php" );
			echo "<font>Ok! </font>";
}
?>
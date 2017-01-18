<?php
$home= $_SERVER['SERVER_NAME'];
if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://".$home."/tools/lock/auth/script" );
}
$uid=$_COOKIE["uid"];
$name=urlencode($_POST["name"]);
$access_token=$_COOKIE["access_token"];
$proxy=$_COOKIE["proxy"];

$api_curl="https://api.vk.com/method/photos.createAlbum?title=".$name."&access_token=".$access_token;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');

header( "Refresh: 1; url=index.php" );

?>

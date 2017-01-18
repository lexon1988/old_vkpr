<?php
$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];
$proxy=$_COOKIE["proxy"];
$friend_uid=$_GET['uid'];

$api_curl="https://api.vk.com/method/messages.deleteDialog?user_id=".$friend_uid."&access_token=".$_COOKIE["access_token"];
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***


$rez=$api;
header( "Refresh: 1; url=index.php" );

?>
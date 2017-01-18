<?php
$uid=$_COOKIE["uid"];
$access_token=$_COOKIE["access_token"];

$captcha_sid=$_POST['captcha_sid'];
$captcha_key=$_POST['captcha_key'];

$max = $_COOKIE["fl_counter"];
$true_max= $max-1;

$fff=$_POST['fff'];

$api_curl='https://api.vk.com/method/friends.add.xml?user_id='.$fff.'&access_token='.$access_token.'&captcha_sid='.$captcha_sid.'&captcha_key='.$captcha_key;


//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***

preg_match('/ \<error\_code\>(.*)\<\/error\_code\>/',$api,$err);

if($err[0]<>"")

header( "Refresh: 1; url=counter.php?max=$true_max" );

else

header( "Refresh: 1; url=rez.php" );

?>


<?php
header( "Refresh: 1; url=counter.php?max=$true_max" );

$uid=$_COOKIE["uid"];
$gid=$_COOKIE["gid"];
$access_token=$_COOKIE["access_token"];
$proxy=$_COOKIE["proxy"];

$captcha_sid=$_POST['captcha_sid'];
$captcha_key=$_POST['captcha_key'];



$id=$_POST['user_id'];
$photo_id=$_POST['photo_id'];
$owner_id=$_POST['owner_id'];

$x=$_POST['x'];
$y=$_POST['y'];
$x2=$_POST['x2'];
$y2=$_POST['y2'];

$captcha_sid=$_POST['captcha_sid'];
$captcha_key=$_POST['captcha_key'];


$api_curl='https://api.vk.com/method/photos.putTag?owner_id='.(int)($owner_id[1]).'&photo_id='.(int)($photo_id[1]).'&user_id='.(int)($user_id).'&x='.(int)($x).'&y='.(int)($y).'&x2='.(int)($x2).'&y2='.(int)($y2).'&access_token='.$access_token.'&captcha_sid='.$captcha_sid.'&captcha_key='.$captcha_key;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***


preg_match('/ \<error\_code\>(.*)\<\/error\_code\>/',$api,$err);

if($err[0]<>"")

header( "Refresh: 1; url=rez.php" );

else

header( "Refresh: 1; url=rez.php" );

?>


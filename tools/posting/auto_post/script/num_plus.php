<?php
header( "Refresh: 1; url=start.php" );
$access_token=$_COOKIE["access_token"];

$friendautoadd=$_COOKIE["friendautoadd"];

$num=$_COOKIE['num'];
$num= $num+1;



$min= $_COOKIE['min'];
$max=$_COOKIE['max'];

if($num>$max) $num=$min;

setcookie("num", $num, time()+ 260000);



if($friendautoadd=="true") {
$getRequests=file_get_contents("https://api.vk.com/method/friends.getRequests.xml?extended=1&count=1&access_token=".$access_token);
preg_match('/\<uid\>(.*)\<\/uid\>/',$getRequests,$rez);


if($rez[1]<>"") {
$friendsadd=file_get_contents("https://api.vk.com/method/friends.add?user_id=".$rez[1]."&access_token=".$access_token);
			}


							}

include('temp.php');
include('../../../../header/loading.php');
?>



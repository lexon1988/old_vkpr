<?php
$access_token=$_COOKIE["access_token"];


if($_POST['count']=="") $count=50;
else
$count= $_POST['count'];


$api_curl="https://api.vk.com/method/friends.getRecent.xml?count=".$count."&access_token=".$access_token;
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents1.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***
preg_match_all("/\<uid\>(.*)\<\/uid\>/U", $api1, $uid);

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

	<body>
	
	<div class='main'>
	

	<br>
	<b><font>Принявшие заявку в друзья</font></b>
	<hr>
	<div style='margin-left:250px;'>
	
	<br>
		<font>По умолчанию выводится 50:</font>
		<form action="index.php" method="post">
		

		
<p><textarea name='text' cols='15' rows='15'><?php 
for($i=0;$i<$count;$i++){
echo $uid[1][$i];echo "
";}?></textarea></P>
		
		<p><font>Задать другое кол-во:<br><br><input type="input" value="50" size="1" name="count"></p>
			
		<p><input type="submit" value="Отправить" class="button" ></p>
			
		</form>
	</div>



</div>

</body>

</html>

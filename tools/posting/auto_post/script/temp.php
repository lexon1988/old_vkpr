<?php
$num=$_COOKIE['num'];

$club_file=file("../../../../list.txt");
$uid=(int)($club_file[$num]);
  

$club=file_get_contents("https://api.vk.com/method/wall.get.xml?owner_id=-".$uid."&offset=0&count=1");

//искомый текст
$my_str='is_pinned';
 
 //преверяем запись на то чтобы не была прилепленной к верху
$pos = strpos($club, $my_str);
if ($pos === false) {
	$api=$club;
}else{
	$api=file_get_contents("https://api.vk.com/method/wall.get.xml?owner_id=-".$uid."&offset=1&count=1");
}



// \<id\>(.*)\<\/id\>
// \<from\_id\>(.*)\<\/from\_id\>
// \<to\_id\>(.*)\<\/to\_id\>
// \<comments\>(.*)\<\/comments\>


 preg_match("/\<id\>(.*)\<\/id\>/U", $api, $id);
 preg_match("/\<from\_id\>(.*)\<\/from\_id\>/U", $api, $from_id);
 preg_match("/\<to\_id\>(.*)\<\/to\_id\>/U", $api, $to_id);
 preg_match("/\<comments\>(.*)\<\/comments\>/Uis", $api, $comments);
 preg_match("/\<count\>(.*)\<\/count\>/Uis", $comments[1], $comments2);
 

	$id_clean = str_replace("-", "", $id[1]);
	$from_id_clean = str_replace("-", "", $from_id[1]);
	$to_id_clean = str_replace("-", "", $to_id[1]);



/*
echo "<br><br>";
$comments[1];
echo "<br><br>";
echo $id[1];
echo "<br><br>";
echo $from_id[1];
echo "<br><br>";
echo $to_id[1];
*/

if($comments2[1]>20)

{
setcookie("wall", "close", time()+ 260000);

setcookie("post_id", $id_clean, time()+ 260000);
setcookie("from_id", $from_id_clean, time()+ 260000);
setcookie("to_id", $to_id_clean, time()+ 260000);


	}

else

{

setcookie("wall", "Стена открыта", time()+ 260000);

	}

//echo "wall-".$to_id_clean."_".$id_clean;
?>


<?php
$num=file('num.txt'); 
$club_file=file("../../list.txt");
$gid=(int)($club_file[(int)($num[0])]);
//$gid='59921851';

$api_curl="https://api.vk.com/method/wall.get.xml?owner_id=-".$gid."&offset=0&count=1";
//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
$ch = curl_init($api_curl);
include('../../../file_get_contents.php');
//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***



preg_match("/\<id\>(.*)\<\/id\>/", $api, $post_id);
preg_match("/\<is\_pinned\>(.*)\<\/is\_pinned\>/", $api, $is_pinned);
$is_pinned= (int)($is_pinned[1]);

if($post_id[1]=="" or $is_pinned==1) 
	
	{
		
		$api_curl="https://api.vk.com/method/wall.get.xml?owner_id=-".$gid."&offset=1&count=1";
		//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
		$ch = curl_init($api_curl);
		include('../../../file_get_contents.php');
		//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***
				
		
		preg_match("/\<id\>(.*)\<\/id\>/", $api, $post_id);
		preg_match("/\<comments\>(.*)\<\/comments\>/s", $api, $comments);
		preg_match("/\<count\>(.*)\<\/count\>/s", $comments[1], $comments_count);
		$comments_count= (int)($comments_count[1]);
	
	}
	
	
//=======================================================================
	
	//åñëè ñòåíà ÎÒÊÐÛÒÀ
	if($comments_count==0)
	{
	
		file_put_contents("wall.txt", "1");

	}
	
	else
	
	//åñëè ñòåíà ÇÀÊÐÛÒÀ
	{

			file_put_contents("wall.txt", "0");

	}


?>
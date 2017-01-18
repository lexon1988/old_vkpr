<?php
set_time_limit(60);


$num=file('num.txt'); 
$num=$num[0];
$club_file=file("../../list.txt");
$gid=(int)($club_file[$num]);




$api= file_get_contents("https://api.vk.com/method/wall.get?owner_id=-".$gid."&extended=1&count=100");

$json_data=$api;
$json= json_decode($json_data,true);


if($json['response']['wall'][1]['is_pinned']==1) $is_pinned=1;

//есть ли приклеенная запись, или нет
if($is_pinned=="")$comments= $json['response']['wall'][1]['comments']['count'];
if($is_pinned==1)$comments= $json['response']['wall'][2]['comments']['count'];


//Проверяем, какая запись спамится
if($comments>100 && $is_pinned=="")
{
$wall=1;	
$owner_id=$json['response']['wall'][1]['from_id'];
$post_id=$json['response']['wall'][1]['id'];
}
else
$wall=0;	

if($comments>100 && $is_pinned==1)
{
$wall=1;	
$owner_id=$json['response']['wall'][2]['from_id'];
$post_id=$json['response']['wall'][2]['id'];
}
else
$wall=0;



if($wall=1)
{	//ЕСЛИ СТЕНА ЗАКРЫТА
	
	$api2=file_get_contents("https://api.vk.com/method/wall.getComments?owner_id=".$owner_id."&post_id=".$post_id."&count=100&sort=desc");
	$json2= json_decode($api2,true);


			for($i=0;$i<100;$i++){
			$uid2=$json2['response'][$i]['uid'];
			$file = file_get_contents("../bank_id.txt");	
			$str_text = $file;
			$str_find = (string)($uid2);
			if (strripos($str_text, $str_find) === false)
			{
				echo "1";
				if($uid2<>""){file_put_contents("../bank_id.txt","<u>".$uid2."</u><g>".$gid."</g>\n",FILE_APPEND); }
			} else {
				echo "2";
				   }
								
						
								
								}
								

}
else
	
	{
		
				
		//ЕСЛИ СТЕНА ОТКРЫТА

		for($i=0;$i<100;$i++){
								$file = file_get_contents("../bank_id.txt");

								$uid=$json['response']['wall'][$i]['from_id'];


										$str_text = $file;
										$str_find = (string)($uid);
										if (strripos($str_text, $str_find) === false)
										{
											echo "1";
											if($uid<>""){file_put_contents("../bank_id.txt","<u>".$uid."</u><g>".$gid."</g>\n",FILE_APPEND); }
										} else {
											echo "2";
											   }

							 }
			
	
	}




 
 

 
?>

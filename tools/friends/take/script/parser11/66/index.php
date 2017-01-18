<?php
$num=file('num.txt'); 
$club_file=file("../../list.txt");
$gid=(int)($club_file[(int)($num[0])]);

	
	$wall=file_get_contents('wall.txt');
	
	//если стена ОТКРЫТА
	if((int)($wall)==1)
	{
		echo "Wall open...";
		$api_curl='https://api.vk.com/method/wall.get.xml?owner_id=-'.$gid.'&offset=1&count=60';
		//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
		$ch = curl_init($api_curl);
		include('../../../file_get_contents.php');
		//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***



	}
	
	else
	
	//если стена ЗАКРЫТА
	{
		echo "Wall closed...";
		$api_curl="https://api.vk.com/method/wall.getComments.xml?owner_id=-".$gid."&post_id=".$post_id[1]."&sort=desc&count=1";
		//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
		$ch = curl_init($api_curl);
		include('../../../file_get_contents.php');
		//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***

	}
	


	
preg_match_all("/\<from\_id\>(.*)\<\/from\_id\>/", $api, $uid);
	
echo "NEW UZVER= ";	
	
echo $user=$uid[1][0];
echo "<br><br>";

if($user<>""){


		$id_file = file_get_contents('../id_file.txt');
		$id_check   = $user;
		$pos = strpos($id_file, $id_check);

		// Заметьте, что используется ===.  Использование == не даст верного 
		// результата, так как 'a' в нулевой позиции.
		if ($pos === false) {
			echo "***add_user***";

			
							//Апи пользлвателя
							$api_curl="http://api.vk.com/method/getProfiles?uids=".$user."&fields=city,sex,country,photo_medium";
							//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
							$ch = curl_init($api_curl);
							include('../../../file_get_contents.php');
							//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***

							preg_match("/\"sex\"\:(.*)\,\"city\"/", $api, $sex);

							//-------------------ID-----------------
							preg_match("/\"uid\"\:(.*)\,\"first_name/", $api, $uid);

							//---------------------------------------


							//Апи фоловеров и друзей
							$api_curl="http://api.vk.com/method/users.getFollowers?user_id=".$uid[1]."";
							//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
							$ch = curl_init($api_curl);
							include('../../../file_get_contents2.php');
							//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***


							$api_curl="http://api.vk.com/method/friends.get?user_id=".$uid[1]."";
							//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
							$ch = curl_init($api_curl);
							include('../../../file_get_contents3.php');
							//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***


							//-------------------first_name----------
							preg_match("/\"first_name\"\:\"(.*)\",\"last_name/", $api, $first_name);
							//echo "<b><font size='2'>Имя:</b></font> ".$first_name[1];
							//echo "<br>";
							//---------------------------------------


							//-------------------last_name----------
							preg_match("/\"last_name\"\:\"(.*)\"\,\"sex\"/", $api, $last_name);
							//echo "<b><font size='2'>Фамилия: </b></font>".$last_name[1];
							//echo "<br>";
							//---------------------------------------



							//-------------------sex----------------
							//preg_match("/\"sex\"\:(.*)\,\"city\"/", $api, $sex);
							//echo "sex=".$sex[1];
							if($sex[1]==1) $sex="Женский";
							if($sex[1]==2) $sex="Мужской";

							//echo "<b><font size='2'>Пол: </b></font>".$sex;
							//echo "<br>";
							//---------------------------------------


							//-------------------country_id----------------
							preg_match("/\"country\"\:(.*)\,\"photo_medium/", $api, $country_id);
							//---------------------------------------

							//-------------------city_id----------------
							preg_match("/\"city\"\:(.*)\,\"country\"/", $api, $city_id);
							//---------------------------------------

							//Апи страна- город
							$api_curl="http://api.vk.com/method/places.getCountryById?country_ids=".$country_id[1]."";
							//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
							$ch = curl_init($api_curl);
							include('../../../file_get_contents4.php');
							//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***


							$api_curl="http://api.vk.com/method/places.getCityById?city_ids=".$city_id[1]."";
							//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
							$ch = curl_init($api_curl);
							include('../../../file_get_contents5.php');
							//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***


							//-------------------country----------------
							preg_match("/\"name\"\:\"(.*)\"\}\]\}/", $api4, $country);
							//echo "<b><font size='2'>Страна: </b></font>".$country[1];
							//echo "<br>";
							//---------------------------------------

							//-------------------city----------------
							preg_match("/\"name\"\:\"(.*)\"\}\]\}/", $api5, $city);
							//echo "<b><font size='2'>Город: </b></font>".$city[1];
							//echo "<br>";
							//echo "<br>";
							//---------------------------------------


							//-------------------avatar----------------
							preg_match("/\"photo\_medium\"\:\"(.*)\.jpg/", $api, $avatar);

							//echo "<br>";
							//echo $avatar[1];

							if($avatar[1]=="") $avatar[1]="net_avi";

							//echo "<img src='";
							$ava= $avatar=str_replace( array('\\'), '', $avatar[1].".jpg");
							//echo "'>";
							//echo "<br>";echo "<br>";
							//---------------------------------------

							//-------------------friends----------

							$friends= substr_count($api3, ','); 
							//echo "<br>";
							//---------------------------------------

							//-------------------followers----------
							preg_match("/\"count\"\:(.*)\,\"/", $api2, $followers);
							//echo "<b><font size='2'>Подписчики: </b></font>".$followers[1];
							//echo "<br>";
							//echo "<br>";
							//---------------------------------------

							$data = date("d.m.y");
							$time=date("H:i");
							$uid=$user;
							$first_name=$first_name[1];
							$second_name=$last_name[1];
							$sex=$sex;
							$country=$country[1];
							$city=$city[1];
							$friends=(int)($friends);
							$followers=(int)($followers[1]);
							$avatar= $ava;
							echo "<br><br>".$club=$gid;

							include("../../config.php");

							mysql_query("DELETE FROM tabla WHERE uid = '$uid'");

							mysql_query("INSERT INTO tabla (uid, data, time, club, first_name, second_name, sex, country, city, country_id, city_id, friends, followers, avatar  ) 
							values ('$uid','$data', '$time', '$club', '$first_name',  '$second_name', '$sex', '$country' , '$city', '$country_id[1]' , '$city_id[1]', '$friends', '$followers', '$avatar')" );


							$fp = fopen("../id_file.txt", "a"); // Открываем файл в режиме записи 
							$mytext = $uid."\r\n"; // Исходная строка
							$test = fwrite($fp, $mytext); // Запись в файл
							if ($test) echo '';
							else echo '';
							fclose($fp); //Закрытие файла



} 


else 

{
    
	echo "USER in list";
   
}




}	
	
	else echo "USER EMPTY!!!!!!!";
	
	
?>

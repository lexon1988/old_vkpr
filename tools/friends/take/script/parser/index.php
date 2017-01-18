<?php
set_time_limit(60);


for($i=0;$i<30;$i++){

$count=file_get_contents('count.txt');
$uid_file=file('bank_id.txt');


preg_match('/\<u\>(.*)\<\/u\>/',$uid_file[$count], $user);
preg_match('/\<g\>(.*)\<\/g\>/',$uid_file[$count], $gid);

$user= (int)($user[1]);
$gid=(int)($gid[1]);


			
							//Апи пользлвателя
							$api_curl="http://api.vk.com/method/getProfiles?uids=".$user."&fields=city,sex,country,photo_medium";
							//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
							$ch = curl_init($api_curl);
							include('../../file_get_contents.php');
							//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***

							preg_match("/\"sex\"\:(.*)\,\"city\"/", $api, $sex);

							//-------------------ID-----------------
							preg_match("/\"uid\"\:(.*)\,\"first_name/", $api, $uid);

							//---------------------------------------


							//Апи фоловеров и друзей
							$api_curl="http://api.vk.com/method/users.getFollowers?user_id=".$user."";
							//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
							$ch = curl_init($api_curl);
							include('../../file_get_contents2.php');
							//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***


							$api_curl="http://api.vk.com/method/friends.get?user_id=".$user."";
							//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
							$ch = curl_init($api_curl);
							include('../../file_get_contents3.php');
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
							include('../../file_get_contents4.php');
							//***CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END******CURL-END***


							$api_curl="http://api.vk.com/method/places.getCityById?city_ids=".$city_id[1]."";
							//***CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL******CURL****
							$ch = curl_init($api_curl);
							include('../../file_get_contents5.php');
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
							$club=$gid;

							include("../config.php");

							mysql_query("DELETE FROM tabla WHERE uid = '$uid'");

							mysql_query("INSERT INTO tabla (uid, data, time, club, first_name, second_name, sex, country, city, country_id, city_id, friends, followers, avatar  ) 
							values ('$uid','$data', '$time', '$club', '$first_name',  '$second_name', '$sex', '$country' , '$city', '$country_id[1]' , '$city_id[1]', '$friends', '$followers', '$avatar')" );


							
							
								$count2=$count+1;
								if($uid_file[$count2]<>""){
								file_put_contents('count.txt',$count2);
								}
								else
								{
									sleep(40);		
								}
								
							
							sleep(1);
							}	
?>

<?php
$num=file('num.txt'); 
$club_file=file("../list.txt");



echo $uid=(int)($club_file[(int)($num[0])]);
  


 $api=file_get_contents("http://api.vk.com/method/groups.getById.xml?gid=".$uid."&fields=members_count");

 preg_match("/\<name\>(.*)\<\/name\>/U", $api, $name);
 preg_match("/\<photo\_big\>(.*)\<\/photo\_big\>/U", $api, $photo);
 preg_match("/\<members\_count\>(.*)\<\/members\_count\>/U", $api, $members);
 

 

$fp = fopen("temp0.txt", "w"); // Открываем файл в режиме записи
$mytext = $name[1]."\n".$members[1]."\n".$photo[1]; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo '';
else echo '';
fclose($fp); //Закрытие файла



?>

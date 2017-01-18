<?php
$home= $_SERVER['SERVER_NAME'];

if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://".$home."/tools/lock/auth/script" );
}
$uid=$_COOKIE["uid"];
$text= $_POST['text'];

$time1=$_POST['time1'];
$time2=$_POST['time2'];


$count=$_POST['count'];
$count2=$_POST['count2'];


setcookie("countlikeava_count", $count, time()+ 8600);
setcookie("countlikeava_count2", $count2, time()+ 8600);

setcookie("countlikeava_rand1", $time1, time()+ 8600);
setcookie("countlikeava_rand2", $time2, time()+ 8600);

$lines = preg_split('/\r?\n/', $text);

$max=count($lines);

//ограничения на 100 
if($max<100) $max=$max;
else
$max=100;

//не учитывает 0, поэтому приходится удалять 1
$true_max= $max-1;
setcookie("countlikeava_counter", $true_max, time()+ 86000);


// очищаем фал если есть(файл для бужущего результата)
$fp = fopen("files/".$uid."_countlikeava_rez.txt", "w"); // Открываем файл в режиме записи 
$mytext = ""; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo '';
else echo '';
fclose($fp); //Закрытие файла


// очищаем фал если есть(файл для бужущего результата)
$fp = fopen("files/".$uid."_countlikeava_antirez.txt", "w"); // Открываем файл в режиме записи 
$mytext = ""; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo '';
else echo '';
fclose($fp); //Закрытие файла


// очищаем фал если есть(файл гле храниться список который нужно пролайкать)
$fp = fopen("files/".$uid."_like.txt", "w"); // Открываем файл в режиме записи 
$mytext = ""; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo '';
else echo '';
fclose($fp); //Закрытие файла




//записываем список в файл
for($i=0;$i<$max;$i++)
		{

			if($lines[$i]<>"")

				{
				// записываем в файл
				$fp = fopen("files/".$uid."_like.txt", "a"); // Открываем файл в режиме записи 
				$mytext = $lines[$i]."\r\n"; // Исходная строка
				$test = fwrite($fp, $mytext); // Запись в файл
				if ($test) echo '';
				else echo '';
				fclose($fp); //Закрытие файла
				}

		}


header( "Refresh: 1; url=rez.php" );
include('../../../../header/loading.php');
?>



<?php
if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://".$home."/tools/lock/auth/script" );
}
$uid=$_COOKIE["uid"];
$text= $_POST['text'];

$time1=$_POST['time1'];
$time2=$_POST['time2'];

$messages_text=$_POST['messages_text'];
$attachment_text=$_POST['attachment_text'];


setcookie("messages_rand1", $time1, time()+ 86000);
setcookie("messages_rand2", $time2, time()+ 86000);

setcookie("messages_text", $messages_text, time()+ 86000);
setcookie("attachment_text", $attachment_text, time()+ 86000);

$lines = preg_split('/\r?\n/', $text);

$max=count($lines);

//ограничения на 100 
if($max<100) $max=$max;
else
$max=100;

//не учитывает 0, поэтому приходится удалять 1
$true_max= $max-1;
setcookie("messages_counter", $true_max, time()+ 860000);




// очищаем фал если есть(файл гле храниться список который нужно пролайкать)
$fp = fopen("files/".$uid."_messages.txt", "w"); // Открываем файл в режиме записи 
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
				$fp = fopen("files/".$uid."_messages.txt", "a"); // Открываем файл в режиме записи 
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



<?php
include('header/header2.php');
?>

<div class='main_tools' style=' margin-top: 20px;'>

		<div style="margin-left:15px; margin-top:15px; border: 20px solid white; "
		
		<font>
		
		<font><b>Регистрация</b></font>:
		<hr>

<?php



//-------------------access_tokens----------

$aatt=$_POST['access_token'];

preg_match("/\#access\_token\=(.*)\&/U", $aatt, $access_token);
$access_token= $access_token[1];

if($access_token=="") echo "<font>Ошибка 1: Сервис не смог получить данные для доступа к вашей странице, возможные причины:<br>
- вы не авторизованы в ВКонтакте<br>
- некорректно скопировали или вставили содержимоей адресной строки приложения</font><br><br>";

//========================================================================


//-------------------UID----------


preg_match("/\&user\_id\=(.*)/", $aatt, $uid);
$uid= $uid[1];
if($uid=="") echo "<fontОшибка 2.Сервис не смог получить инфорацию о вашей странице.</font>";

//========================================================================




//setcookie("access_tokens", $value, time()+ 260000);  /* 3 дня- время жизни */

if($uid<>"" && $access_token<>""){

$api= file_get_contents("https://api.vk.com/method/getProfiles?uids=".$uid."&fields=photo_medium");


//-------------------Name----------
preg_match("/\"first_name\"\:\"(.*)\",\"last_name/", $api, $first_name);





preg_match("/\"last\_name\"\:\"(.*)\"\,\"photo\_medium\"/", $api, $last_name);

$name=$first_name[1]." ".$last_name[1];

echo "<font>Здравствуйте ".$first_name[1]."!</font>";
echo "<br><br>";



//-------------------avatar----------------
preg_match("/\"photo\_medium\"\:\"(.*)\.jpg/", $api, $avatar);

//echo "<br>";
//echo $avatar[1];

if($uid<>""){

if($avatar[1]=="") $avatar[1]="img/net_avi";
echo "<img src='";
echo $ava= $avatar=str_replace( array('\\'), '', $avatar[1].".jpg");
echo "'>";



}



echo "<form method='post' action='add_fin.php'>";
echo "<input type='hidden' value='".$name."' name='name'>";
echo "<input type='hidden' value='".$ava."' name='avatar'>";
echo "<input type='hidden' value='".$access_token."' name='access_token'>";
echo "<input type='hidden' value='".$uid."' name='uid'>";
echo "<br>";
?>
<font>
1) Введите текст сообщений для постинга по группам "Добавь| Лайк", если постинг по группам вас не интересует, оставьте эти поля пустыми:
<br><br>
<font size='2' class='font2'>Рекомендуется заполнить все поля разным текстом!</font>
<br>
</font>

<font size='2' class='font2'>

не более 150 символов, ссылки не работают
</font><br>
<input type='text' class='textbox' class='textbox' name='post_text' size='110'' value="<?php echo $_COOKIE["text"]; ?>"><br>
<input type='text' class='textbox' name='post_text1' size='110'' value="<?php echo $_COOKIE["text1"]; ?>"><br>
<input type='text' class='textbox' name='post_text2' size='110'' value="<?php echo $_COOKIE["text2"]; ?>"><br>
<input type='text' class='textbox' name='post_text3' size='110'' value="<?php echo $_COOKIE["text3"]; ?>"><br>
<input type='text' class='textbox' name='post_text4' size='110'' value="<?php echo $_COOKIE["text4"]; ?>"><br>
<input type='text' class='textbox' name='post_text5' size='110'' value="<?php echo $_COOKIE["text5"]; ?>"><br>
<input type='text' class='textbox' name='post_text6' size='110'' value="<?php echo $_COOKIE["text6"]; ?>"><br>
<input type='text' class='textbox' name='post_text7' size='110'' value="<?php echo $_COOKIE["text7"]; ?>"><br>
<input type='text' class='textbox' name='post_text8' size='110'' value="<?php echo $_COOKIE["text8"]; ?>"><br>
<input type='text' class='textbox' name='post_text9' size='110'' value="<?php echo $_COOKIE["text9"]; ?>"><br>


<br><br>
<font>
2)Что именно вы хотите накрутить:
</font>
<br><br>







<table>
<tr>
	<td><input name="pics" type="radio" value="1"> <font>Друзья</font></td>
	<td><input name="pics" type="radio" value="2"> <font>Лайки</font></td>
	<td><input name="pics" type="radio" value="3" checked> <font>Друзья и Лайки</font></td>
</tr>
</table>



<?php
echo "<font><br><br>Cпасибо что пользуетесь нашим сервисом!<br> Осталось только кликнуть по кнопке \"Завершить авторизацию\"<br><br></font>";
echo "<input type='submit' class='button' value='Завершить авторизацию'></form>";




//------------------------------------
}

?>



	</font>
   </div>
</div>


<?php
$file=file("pic/temp/".$uid.".txt");

if($file[0]=="" && $file[1]=="")
{
$fp = fopen("pic/temp/".$uid.".txt", "w"); // Открываем файл в режиме записи
$mytext = "new\r\n"; // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
fclose($fp); //Закрытие файла
}

?>





				
<br>
</body>
<html>



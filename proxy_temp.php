<?php
$ch = curl_init("https://api.vk.com/method/users.get.xml?user_ids=1");

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $_POST['proxy']);

$var=curl_exec($ch);
curl_close($ch);


preg_match('/\<uid\>(.*)\<\/uid\>/',$var,$rez);
//echo $rez[1];

if($rez[1]==1)
{
setcookie("proxy", $_POST['proxy'], time()+ 86000); 
include('header/header2.php');
?>

<br>
	<div class='main_tools' style='margin-top:10%'>
		<div style="margin-left:15px; margin-top:15px; border: 5px solid white; "
	
	
	<br>
	<b><font>Подключить прокси</font></b>
	<hr>
	<div style='margin-left:250px;'>
	
	<a href='proxy.php' style='text-decoration: none;'><<<</a><br><br>
	<font><img src='../img/icon-shades-sunglasses2.png'> Прокся работает!</font>
		<br><br>
	<font><a href='index.php' style='text-decoration: none;'>на главную >>></a></font>
	<br>
	
	</div>
</div>
</div>


<?php
}
else
{
include('header/header2.php');
?>
<br>
	<div class='main_tools' style='margin-top:10%'>
		<div style="margin-left:15px; margin-top:15px; border: 5px solid white; "
	<br>
	<b><font>Подключить прокси</font></b>
	<hr>
	<div style='margin-left:250px;'>
	<a href='proxy.php' style='text-decoration: none;'><<<</a><br><br>
	<font class='font2'>Прокся не работает!</font>
	<br>
	<br>
	</div>
</div>
</div>
</body>
</html>
<?php
}
?>

<?php
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy);

$api2=curl_exec($ch);
curl_close($ch);

$go_back=$_SERVER['REQUEST_URI'];

$home= $_SERVER['SERVER_NAME'];

if($api2=="")
		{
//header( "Refresh: 5; url=$go_back");
echo "
<html>
<head>
<link rel='stylesheet' type='text/css' href='http://".$home."/style2.css'>
<meta http-equiv='content-type' content='text/html; charset=UTF-8' />
</head>
<div class='main'><br>
<b><font>Ошибка</font></b><hr>

<font>Прокси не работает, или работает очень медленно. 
Если данная ошибка повторяется часто, небходимо поменять или отключить прокси. А также в случае если слишком часто выходит капча, лучше поменять прокси! 
Попробовать ещё раз?<br><br>
<a href='".$go_back."'>Да</a> || <a href='http://".$home."/'>Нет</a></font>

</div>
</div>
</body>
</html>	

";
}
?>
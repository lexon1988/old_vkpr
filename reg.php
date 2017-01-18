
<?php
include('header/header2.php');
?>
<br>

<?php/*
if($_COOKIE["proxy"]==""){
echo "<div class='main_tools'><div style='margin-left: 20px; margin-top:20px; margin-bottom:20px;'><font class='font4'><b>Внимание!</b><br><br> Перед тем как авторизоваться, настоятельно рекомендуем подключить прокси к данному сервису! Отсутствие прокси увеличивает вероятность блокировки вашего аккаунта. Найти и подключить прокси можно <a href='http://vkpost/proxy.php'>здесь</a>!</font></div></div><br>";
}
*/?>


<div class='main_tools'  >




		<div style="margin-left:15px; margin-top:15px; border: 5px solid white; "
		
		<font>
		
		<font><b>Авторизация</b></font>:
		<hr>

		<font>1. Установите одно из официальных приложений:
		
		<a href="https://oauth.vk.com/authorize?client_id=3087106&v=5.0&scope=wall,offline, photos, groups, friends, messages, status, offline&redirect_uri=http://oauth.vk.com/blank.html&display=page&response_type=token" target="_blank">iPhone</a>,
		<a href="https://oauth.vk.com/authorize?client_id=3682744&v=5.28&scope=wall,offline, photos, groups, friends, messages, status, offline&redirect_uri=http://oauth.vk.com/blank.html&display=page&response_type=token" target="_blank">iPad</a>,		
		<a href="https://oauth.vk.com/authorize?client_id=3502561&v=5.28&scope=wall,offline, photos, groups, friends, messages, status, offline&redirect_uri=http://oauth.vk.com/blank.html&display=page&response_type=token" target="_blank">Windows Phone</a>,
		<a href="https://oauth.vk.com/authorize?client_id=2685278&v=5.28&scope=wall,offline, photos, groups, friends, messages, status, offline&redirect_uri=http://oauth.vk.com/blank.html&display=page&response_type=token" target="_blank">Kate Mobile</a>   
		, затем скопируйте содержимое адресной строки.</font>
		<br>
	
	
		

	
	
		<font size="2" class="font2">( ВКонтакте попросит не копировать данные из адресной строки для сторонних сайтов, однако для того чтобы постить по группам, сервис должен получить доступ к вашей странце, иначе никак.)</font>
		<br>
		<br>
		<font>2. Введите содержимое адресной строки в эту форму:</font>
		
		<form method="post" action="add.php">
		
		<input type="text" name="access_token" size="50" value="">
		<br><br>
		<input type="submit" name="post" value="Отправить" class='button'>
		
		</form>

	</font>


  </div>
</div>




				
	</body>
</html>




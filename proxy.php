<?php
include('header/header2.php');
?>
<br>
	<div class='main_tools' '>
		<div style="margin-left:15px; margin-top:15px; border: 5px solid white; "
	

	<br>
	<b><font>Подключить прокси</font></b>
	<hr>
	<div style='margin-left:250px;'>
	<a href='index.php' style='text-decoration: none;'><<<</a><br><br>

		<font>Введите адрес прокси:
		<br><br><img src='http://vkpost/img/icon-warning-sign.png' width= 13px; height= 13px;>  
         Прокси нужны для анонимной и безопасной работы с данным сервисом, в поле необходимо ввести https прокси в формате: 107.182.17.149:7808 
		 
		 <br><br><img src='http://vkpost/img/icon-warning-sign.png' width= 13px; height= 13px;>  Вы можете подключить свою прокси, либо выбрать одну из предложенных. 
		</font>
		
		<form action="proxy_temp.php" method="post">
		<p><input type="text" value="" name="proxy" size="25" ></font></p>
		<p><input type="submit" value="Отправить" class="button" ></p>
			
		</form>
	
					<?php include('proxy/index.php'); ?>

	</div>
</div>
</div>



<br>

</body>

</html>

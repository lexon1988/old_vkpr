<?php
include('header/header2.php');
?>
<br>
	<div class='main_tools' style='margin-top:10%'>
		<div style="margin-left:15px; margin-top:15px; border: 5px solid white; "
	

	<br>
	<b><font>Отключить прокси</font></b>
	<hr>

	
	<br>
		
		
        <font> Вы уверены что хотите отключить прокси - <?php echo $_COOKIE['proxy']; ?>?</font>
		 

	<br><br>

	
<table>
<tr>
	<td>
		<form action="proxydel_temp.php" method="post">
		<p><input type="submit" value="ДА" class="button" style='widht=10px'></p>
		</form>
	
	</td>
	<td>
	
		<form action="index.php" method="post">
		<p><input type="submit" value="НЕТ" class="button2" ></p>
		</form>
	
	</td>
</tr>
</table>
	
	

</div>
</div>





</body>

</html>

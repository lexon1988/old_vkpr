<?php
if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://".$_SERVER['SERVER_NAME']."/tools/lock/auth/script" );
}
header( "Refresh: 2; url=index.php" );
include('../../../../header/header2.php');
?>
<br>

	<div class='main_tools'>
		<div style='margin-left:15px; margin-top:20px;'>
	
	<b><font>Удалить себя из списока</font></b>
	<hr>
	<div style='margin-left:250px;'>






<?php



$user=$_COOKIE["uid"];




include("config.php");


mysql_select_db('vk');
mysql_query("

DELETE FROM tabla2
        WHERE uid = '$user'
        
");

echo "<br><font>Пользлователь- <a href='https://vk.com/id".$_COOKIE["uid"]."'>vk.com/id".$_COOKIE["uid"]."</a>, удалён из базы!</font>";
?>


			</div>
	
		</div>
</div>



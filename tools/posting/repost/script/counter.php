<?php
header( "Refresh: 1; url=rez.php" );
setcookie("repost_counter", $_GET['max'], time()+ 260000);
include('../../../../header/loading.php');
?>



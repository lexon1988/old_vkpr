<?php
header( "Refresh: 3; url=rez.php" );
setcookie("like_counter", $_GET['max'], time()+ 260000);
include('../../../../header/loading.php');
?>


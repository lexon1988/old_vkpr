<?php
header( "Refresh: 1; url=rez.php" );
setcookie("countlikeava_counter", $_GET['max'], time()+ 260000);
include('../../../../header/loading.php');
?>


<?php
header( "Refresh: 1; url=rez.php" );
setcookie("likewall1_counter", $_GET['max'], time()+ 260000);
include('../../../../header/loading.php');
?>


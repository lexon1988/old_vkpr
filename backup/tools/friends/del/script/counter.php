<?php
header( "Refresh: 1; url=rez.php" );
setcookie("fdel_counter", (int)($_GET['max']), time()+ 260000);
include('../../../../header/loading.php');
?>



<?php
header( "Refresh: 0; url=start.php" );
$min=$_POST['min'];
$max=$_POST['max'];
$time=$_POST['time'];
$time1=$_POST['time1'];

$friendautoadd=$_POST['radio'];

setcookie("num", $min, time()+ 260000);
setcookie("min", $min, time()+ 260000);
setcookie("max", $max, time()+ 260000);
setcookie("time", $time, time()+ 260000);
setcookie("time", $time1, time()+ 260000);

setcookie("friendautoadd", $friendautoadd, time()+ 260000);


?>


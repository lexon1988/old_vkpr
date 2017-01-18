<?php
setcookie("proxyfail", "", time()- 86000);  /* 1 день- время жизни */
header( "Refresh: 0; url=http://".$_SERVER['SERVER_NAME']."/index.php" );
?>


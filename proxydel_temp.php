<?php
setcookie("proxy",'', time()- 86000); 
setcookie("proxyfail", '', time()- 86000);
header( "Refresh: 0; url=tools/proxyfaildel.php" );
?>



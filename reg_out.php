<?php
setcookie("uid","", time()+ 260000);  /* 3 дня- время жизни */
setcookie("access_token","", time()+ 260000);  /* 3 дня- время жизни */
setcookie("name","", time()+ 260000);  /* 3 дня- время жизни */
setcookie("avatar","", time()+ 260000);  /* 3 дня- время жизни */





header("Location: index.php"); /* Redirect browser */

/* Make sure that code below does not get executed when we redirect. */
exit;
?>



<?php
if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/lock/auth/script" );
}
?>

<?php
$gogogo=$_SERVER['REQUEST_URI'];
header( "Refresh: 3; url=$gogogo");
echo "Перенаправим ща!";

?>
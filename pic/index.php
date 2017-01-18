<?php

//--------------------
$a1=file_get_contents('https://api.vk.com/method/photos.get.xml?owner_id=-85531082&album_id=210054376');
file_put_contents('pics1.txt',$a1);
//---------------------

?>

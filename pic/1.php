
<table><tr>
<?php

$pic=file_get_contents('pics1.txt');

preg_match_all("/\<pid\>(.*)\<\/pid\>/",$pic,$pid);
preg_match_all("/\<owner_id\>(.*)\<\/owner_id\>/",$pic,$owner_id);
preg_match_all("/\<src\>(.*)\<\/src\>/",$pic,$src);
preg_match_all("/\<src_big\>(.*)\<\/src_big\>/",$pic,$src_big);

$i=0;

//максимальное число

while($src[1][$i]<>"") {

$i++;

$max=$i-1;
}



for ($i = 0; $i <= $max; $i++) {



echo "<td>";

echo "<img src='".$src_big[1][$i]."' width= 200px height= 150px>";

echo "<input name='owner_id".$i."' type='hidden' value='".$owner_id[1][$i]."'>";
echo "<input name='pid".$i."' type='hidden' value='".$pid[1][$i]."'>";
echo "<input name='src_big".$i."' type='hidden' value='".$src_big[1][$i]."'>";


echo "<br>";

echo   "<label>Картинка ".$i."<input name='radio' type='radio' value='radio".$i."'";

if($i==0) echo " checked";

echo "/></label>";

echo "</td>";

if($i==2) echo "</tr><tr>";

}


?>

</tr></table>



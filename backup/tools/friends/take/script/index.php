
<?php
include('../../../../header/header_takefriends.php');

$date = date("d.m.y");
//echo "Сегодня: ".$date."<br>";

$yesterday = date("d.m.y",mktime(0, 0, 0, date("m")  , date("d")-1, date("y")));
//echo "Вчера: ".$yesterday."<br>";

$yesterday2 = date("d.m.y",mktime(0, 0, 0, date("m")  , date("d")-2, date("y")));
//echo "Позовчера: ".$yesterday2;


$result = mysql_query("select * from tabla WHERE `uid`>0 AND `followers` < `friends` AND (data='$date' OR data='$yesterday' OR data='$yesterday2') ORDER BY id DESC limit $start_pos, $perpage ");

while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {


?>



<p style='text-indent: 1px;'><div class='div0'> <table bgcolor='' border=0px bordercolor='white' width='580px' ><tr>

<td  valign='center' width="210px"  alink-color: blue; style='border:1px solid #DEE0EB; text-align: center; border-right :0px; border-top :0px; '>  <font size=2><?php echo $row["data"];?>| <?php echo $row["time"];?>|

<?php

if($row["club"]<>"") echo "<a href='http://vk.com/club".$row["club"]."' target='_blank' rel='nofollow'>club".$row["club"]."</a>";

else

echo $_SERVER['SERVER_NAME'];

?>
</td>

<td  width="70px"  height= "5px"  style='border:1px solid #DEE0EB; text-align: center; border-right :0px; border-top :0px;' ><font size=2>Пол:</font></td>
	
<td width="170px" height= "10px"  style='border:1px solid #DEE0EB; text-align: center;border-right :0px; border-top :0px;'><font size=2>Регион: </font> </td>

<td width="50px"  style='border:1px solid #DEE0EB; text-align: center; border-top :0px;' ><font size=2>Д/П: </font></td>

<td  valign='center' width="60px" rowspan='2'style='border:1px solid #DEE0EB; border-left :0px;  border-top:0px;text-align: center;' ><div class="div1" ><font color="white" class="ws48"><B><a href='http://vk.com/id<?php echo $row["uid"];?>' class='plus' target='_blank' rel='nofollow'>+</a></B></font></div></td>

</tr>



<tr>

<td style='border:1px solid #DEE0EB; text-align: center; border-right :0px; border-left :0px; border-top:0px;'><div class='anoncetxt'> <?php echo "<img src='".$row["avatar"]."'  width= 50px height= 50px>"; ?></div><font size=2 color=black> <?php echo $row["first_name"]." ".$row["second_name"] ; ?></font></td>


<?//sex

if($row["sex"]=='Мужской') $sex="Мужской";

else

$sex="Женский";

?>



		<td height= "0px"   style='border:1px solid  #DEE0EB; text-align: center; border-top:0px;  border-right :0px;  '><font size=2><font size=1 color=black>  <?php echo $sex;?> </font><font size=1 color=black> </font> </td>

		<td style='border:1px solid #DEE0EB;  text-align: center; border-top:0px; border-right :0px; '><font size=2><?php echo $row["country"] ?></font><br><font size=2><?php echo $row["city"];?></font></td>
	
		<td style='border:1px solid #DEE0EB; text-align: center; border-top:0px; border-right: 0px; width:40px; '><font size=2><?php echo $row["friends"];  ?></font><br><font size=2 > <?php echo $row["followers"];?><?php if($row["friends"]< $row["followers"]) echo "<hr color=red>" ; ?></font</td>
		
</tr>

</table>    

 </div> </p>


<?php

//echo $row["uid"].'<br>';
	}

    mysql_free_result($result);

	?>


</div>
<br>
<?php

// Вызов функции, для вывода ссылок на экран


echo "<div class='linker'><font size=2>";

yandex_link_bar($page, $count, $pages_count, 20)
?>

	<a href="#" class="scrollup"></a>
</font>
<br>

</div>
<br>	
	

		
	</body>
</html>





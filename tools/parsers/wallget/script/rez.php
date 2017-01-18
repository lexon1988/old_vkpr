<?php
$home= $_SERVER['SERVER_NAME'];
if($_COOKIE["uid"]=="" or $access_token=$_COOKIE["access_token"]=="" or $_COOKIE["photo"]=="")
{
header( "Refresh: 1; url=http://".$home."/tools/lock/auth/script" );
}
$owner_id=$_POST['owner_id'];
$count=$_POST['count'];;
$offset=$_POST['offset'];

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

<body>
<div class='main' >
<br>
<b><font class='font1'>Постинг на стену</font></b>
<hr>
<br>
<div style='margin-left:235px;'>
<a href='index.php' style='text-decoration: none;'><<<</a><br><br>

<?php
$api_curl='https://api.vk.com/method/wall.get?owner_id='.$owner_id.'&count='.$count.'&offset='.$offset;
$api=file_get_contents($api_curl);
//максимальное кол- во выводимой информации
$max=substr_count($api,'from_id') + 1;
//--------

$json_data=$api;
$json= json_decode($json_data,true);
?>
<textarea cols='25' rows='30'>
<?php
for($i=1;$i<$max; $i++){
echo "wall".$json['response'][$i]['from_id']."_".$json['response'][$i]['id'];
echo "
";
}

//echo "wall".$json['response'][11]['from_id']."_".$json['response'][11]['id'];
?>
</textarea>
</div>

</body>
</html>




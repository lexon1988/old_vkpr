<?php
$home= $_SERVER['SERVER_NAME'];
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style2.css"> 
</head>

	<body>

<div style="margin-left:10px;margin-top:10px">

<a href="index.php">
<?php

$temp0=file('temp0.txt');
echo "<img src='".$temp0[2]."'><br><br>";
?>

<div style="margin-left:20px;">

<?php
echo $temp0[0]."<br>";
echo $temp0[1]." подписчиков<br>";


?>
</a>
	</div>

		</div>
		
</body>
</html>
